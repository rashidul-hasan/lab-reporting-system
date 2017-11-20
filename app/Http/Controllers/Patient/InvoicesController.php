<?php

namespace App\Http\Controllers\Patient;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Invoice;
use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
use Session;
use Sentinel;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id = Sentinel::getUser()->id;
        $patient = Patient::where('user_id', $id)->first();

        $appointments = Appointment::where('patient_id', $patient->id)->pluck('id')->toArray();

        //dd($appointments);
        $invoices = Invoice::whereIn('appointment_id', $appointments)->paginate(10);

        //dd($invoices);

        return view('home.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('invoices.create');
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
        
        Invoice::create($requestData);

        Session::flash('flash_message', 'Invoice added!');

        return redirect('invoices');
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
        $invoice = Invoice::findOrFail($id);

        return view('home.invoices.show', compact('invoice'));
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
        $invoice = Invoice::findOrFail($id);

        return view('invoices.edit', compact('invoice'));
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
        
        $invoice = Invoice::findOrFail($id);
        $invoice->update($requestData);

        Session::flash('flash_message', 'Invoice updated!');

        return redirect('invoices');
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
        Invoice::destroy($id);

        Session::flash('flash_message', 'Invoice deleted!');

        return redirect('invoices');
    }

    public function printInvoice($id){
        $invoice = Invoice::findOrFail($id);
        $patient = $invoice->appointment->patient;
        $test = $invoice->appointment->test;

        $data = [];
        
        $data['invoice'] = $invoice->toArray();
        $data['patient'] = $patient->toArray();
        $data['test'] = $test->toArray();

        $pdf = \PDF::loadView('pdf.invoice', $data);
        //dd($pdf);
        return $pdf->inline();
    }

}
