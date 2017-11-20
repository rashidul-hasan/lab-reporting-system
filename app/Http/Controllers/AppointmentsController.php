<?php

namespace App\Http\Controllers;

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

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $appointments = Appointment::paginate(25);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tests = Test::all();
        $patients = Patient::all();
        
        $patient_data = [];
        $test_data = [];
        
        foreach ($patients as $patient) {
            $patient_data[$patient->id] = $patient->fullname;
        }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }
        //dd($patient_data);
        //dd($test_data);
        return view('appointments.create', ['tests' => $test_data, 'patients' => $patient_data]);

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
        $requestData['status'] = 'pending';

        //dd($requestData);

        $appointment = Appointment::create($requestData);

        // create invoice for this appointment
        $id = $this->createInvoice($appointment);

        //dd($id);

        // send it to patient's mail

        Session::flash('flash_message', 'Appointment added!');

        return redirect('appointments');
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

        return view('appointments.show', ['appointment' => $appointment, 'slot' => $slot->time]);
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
        $tests = Test::all();
        $patients = Patient::all();
        //dd($patients);
        foreach ($patients as $patient) {
            $patient_data[$patient->id] = $patient->name;
        }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        $appointment = Appointment::findOrFail($id);
        $slot = Slot::findOrFail($appointment->slot_id);

        return view('appointments.edit', ['appointment' => $appointment, 
                'patients' => $patient_data,
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
        
        $appointment = Appointment::findOrFail($id);
        $appointment->update($requestData);

        Session::flash('flash_message', 'Appointment updated!');

        return redirect('appointments');
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

        return redirect('appointments');
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



}
