<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sample;
use Illuminate\Http\Request;
use Session;
use DB;

use App\Patient;
use App\Appointment;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $samples = Sample::paginate(25);

        //dd($samples);

        return view('samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $requestData = $request->all();

        //dd($requestData);

        //$patients = Patient::all();
        $sample_types = Sample::getPossibleEnumValues('sample_type');
        //dd($sample_types);
        
        // foreach ($patients as $patient) {
        //     $patient_data[$patient->id] = $patient->name;
        // }

        //return view('samples.create', ['patients' => $patient_data, 'sample_types' => $sample_types]);
        return view('samples.create', ['data' => $requestData, 'sample_types' => $sample_types]);
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
        
        Sample::create($requestData);

        $appointment = Appointment::findOrFail($requestData['appointment_id']);
        $appointment->status = 'processing';
        $appointment->save();

        Session::flash('flash_message', 'Sample added!');

        return redirect('samples');
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
        $sample = Sample::findOrFail($id);

        return view('samples.show', compact('sample'));
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
        $sample = Sample::findOrFail($id);
        $sample_types = Sample::getPossibleEnumValues('sample_type');

        return view('samples.edit', ['sample' => $sample, 'sample_types' => $sample_types]);
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
        
        $sample = Sample::findOrFail($id);
        $sample->update($requestData);

        Session::flash('flash_message', 'Sample updated!');

        return redirect('samples');
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
        Sample::destroy($id);

        Session::flash('flash_message', 'Sample deleted!');

        return redirect('samples');
    }
}
