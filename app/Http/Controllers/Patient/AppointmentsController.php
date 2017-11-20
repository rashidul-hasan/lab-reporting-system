<?php

namespace App\Http\Controllers\Patient;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

use App\Appointment;
use App\Test;
use App\Patient;
use App\Invoice;
use App\Slot;

use Sentinel;
use Mail;

class AppointmentsController extends Controller
{
    // private $patient_id;

    // public function __construct()
    // {
    //    if ( Sentinel::check()) {
    //        $user = Sentinel::getUser();
    //        if ($user->inRole('patient')) {
    //            $this->patient_id = $user->id;
    //        }
    //    }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = Sentinel::getUser()->id;
        $patient = Patient::where('user_id', $id)->first();
        //dd($patient);
        $appointments = Appointment::where('patient_id', $patient->id)->paginate(10);

        if ($appointments->isEmpty()) {
            return view('home.appointments.index');
        } else {
            return view('home.appointments.index', ['appointments' => $appointments]);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tests = Test::all();
        $id = Sentinel::getUser()->id;
        $patient = Patient::where('user_id', $id)->first();
        //$patients = Patient::all();
        
        //$patient_data = [];
        $test_data = [];
        
        // foreach ($patients as $patient) {
        //     $patient_data[$patient->id] = $patient->fullname;
        // }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }
        //dd($patient_data);
        //dd($test_data);
        return view('home.appointments.create', ['tests' => $test_data, 'patient' => $patient]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        //dd($requestData);
        $requestData['status'] = 'pending';

        //dd($requestData);

        $appointment = Appointment::create($requestData);

        // create invoice for this appointment
        $id = $this->createInvoice($appointment);

        //dd($id);

        // send it to patient's mail

        $this->sendInvoice($id);

        Session::flash('flash_message', 'Appointment added! Please check the invoice in your email inbox to make payment');

        return redirect('home/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $slot = Slot::findOrFail($appointment->slot_id);
        //dd($appointment->slot->time);

        return view('home.appointments.show', ['appointment' => $appointment, 'slot' => $slot->time]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        //dd($id);
        $tests = Test::all();
        //$patients = Patient::all();
        //dd($patients);
        // foreach ($patients as $patient) {
        //     $patient_data[$patient->id] = $patient->name;
        // }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        $user_id = Sentinel::getUser()->id;
        $patient = Patient::where('user_id', $user_id)->first();

        $appointment = Appointment::findOrFail($id);

        //dd($appointment);
        $slot = Slot::findOrFail($appointment->slot_id);

        return view('home.appointments.edit', ['appointment' => $appointment, 
                'patient' => $patient,
                'slot' => $slot->time,
                'tests' => $test_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();

        //dd($id);
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        Session::flash('flash_message', 'Appointment updated!');

        return redirect('home/appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Appointment::destroy($id);

        Session::flash('flash_message', 'Appointment deleted!');

        return redirect('home/appointments');
    }


    private function createInvoice($appointment){

        $invoice = new Invoice();

        $invoice->appointment_id = $appointment->id;
        $invoice->amount = $appointment->test->cost;
        $invoice->due_date = Carbon::today()->addDays(3);
        $invoice->status = 'unpaid';

        $invoice->save();

        return $invoice->id;
    }

    public function checkAvailableSlots(Request $request){

        $data = $request->all();
        //return response()->json($data);
        
        $appointments = Appointment::where('test_id', $data['test_id'])
                                    ->where('status', 'pending')
                                    ->where('date', $data['date'])
                                    ->get();

        $test = Test::where('id', $data['test_id'])->first();;
        $slots = unserialize($test->slot);

        //return response()->json($appointment->toArray());

        if ( $appointments->isEmpty() ) {

            // all slots are available
            // return all slots for this test
            $slots = Slot::find($slots);
            return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);
        } else {

            foreach ($appointments as $appointment) {
                
                if(($key = array_search($appointment->slot_id, $slots)) !== false) {
                    unset($slots[$key]);
                }

            }

            if ( empty($slots) ) {

                // all slots are occupied
                return response()->json(['status' => 'all_busy']);
            } else {

                // some slots are still available, return them
                $slots = Slot::find($slots);
                return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);


            }



        }                       

        return response()->json(['status' => 'error']);
        //return response()->json(['slots' => $slots]);

    }

    private function sendInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $patient = $invoice->appointment->patient;
        $test = $invoice->appointment->test;

        $data = [];
        
        $data['invoice'] = $invoice->toArray();
        $data['patient'] = $patient->toArray();
        $data['test'] = $test->toArray();

        $filename = 'invoice-' . str_random(6) . '.pdf';

        //$pdf = \PDF::loadView('pdf.invoice', $data)->save( 'files/' . $filename );
        $pdf = \PDF::loadView('pdf.invoice', $data)->output();

        //dd($pdf->output());

        Mail::send('emails.invoice', ['patient' => $patient], function($message) use ($patient, $pdf) {

            $message->to($patient->email);
            $message->from('info@olrs.com', 'Healthy Heart');
            $message->subject('[Healthy Heart] Invoice');
            $message->attachData($pdf, 'invoice.pdf');
        });
    }



}
