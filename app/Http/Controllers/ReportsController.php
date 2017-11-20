<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Field;
use App\Appointment;
use App\Sample;

use Illuminate\Http\Request;
use Session;
use Mail;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::paginate(25);

        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $requestData = $request->all();

        $test_fields = Field::where('test_id', $requestData['test_id'])->get()->toArray();

        //dd($test_fields);

        return view('reports.create', ['data' => $requestData, 'test_fields' => $test_fields]);
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

        $results = [];

        foreach ($requestData as $key => $value) {
            if (is_int($key)) {

                //dd($key);
                // get the field setails
                $field = Field::where('id', $key)->first()->toArray();

                $result = [];

                $result['name'] = $field['name'];
                $result['quantity'] = $value;
                $result['unit'] = $field['unit'];
                $result['normal'] = $field['normal'];
                $result['field_id'] = $field['id'];

                array_push($results, $result);

                // remove from actual array
                unset($requestData[$key]);
            }
        }

        $requestData['results'] = json_encode($results);

        //dd($requestData);
        
        $report = Report::create($requestData);
        $sample = Sample::findOrFail($report->sample_id);
        $appointment = Appointment::where('id', $sample->appointment_id)->first();
        //dd($appointment);
        $appointment->status = 'done';
        $appointment->save();

        // send tp patient via mail
        $this->sendReport($report->id);

        //dd($id);
        //$appointment = $report->appointment;

        //dd($appointment);
        //$appointment->status = 'done';
        //$appointment->save();

        //$report = Report::find($id);

        //$report->results = json_encode($results);

        //$report->save();

        Session::flash('flash_message', 'Report added!');

        return redirect('reports');
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
        $report = Report::findOrFail($id);

        //dd(json_decode($report->results));

        return view('reports.show', ['report' => $report, 'results' => json_decode($report->results)]);
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
        $report = Report::findOrFail($id);
        $results = json_decode($report->results);

        //dd($results);

        return view('reports.edit', ['report' => $report, 'results' => $results]);
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

        $results = [];

        foreach ($requestData as $key => $value) {
            if (is_int($key)) {

                //dd($key);
                // get the field setails
                $field = Field::where('id', $key)->first()->toArray();

                $result = [];

                $result['name'] = $field['name'];
                $result['quantity'] = $value;
                $result['unit'] = $field['unit'];
                $result['normal'] = $field['normal'];
                $result['field_id'] = $field['id'];

                array_push($results, $result);

                // remove from actual array
                unset($requestData[$key]);
            }
        }

        $requestData['results'] = json_encode($results);
        
        $report = Report::findOrFail($id);
        $report->update($requestData);

        Session::flash('flash_message', 'Report updated!');

        return redirect('reports');
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
        Report::destroy($id);

        Session::flash('flash_message', 'Report deleted!');

        return redirect('reports');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function printReport($id)
    {
        //return view('pdf.reportv3');

        $report = Report::findOrFail($id)->first();

        $data['results'] = json_decode($report->results);

        //dd($data);

        $sample = $report->sample;

        $patient = $sample->patient;

        $test = $sample->test;

        //dd($sample->toArray());
        $data['report'] = $report->toArray();
        $data['sample'] = $sample->toArray();
        $data['patient'] = $patient->toArray();
        $data['test'] = $test->toArray();



        $pdf = \PDF::loadView('pdf.report', $data);
        //dd($pdf);
        return $pdf->inline();

        

        //dd($report);

        //return view('reports.edit', compact('report'));
    }

    private function sendReport($id)
    {

        $report = Report::findOrFail($id)->first();

        $data['results'] = json_decode($report->results);

        //dd($data);

        $sample = $report->sample;

        $patient = $sample->patient;

        $test = $sample->test;

        //dd($sample->toArray());
        $data['report'] = $report->toArray();
        $data['sample'] = $sample->toArray();
        $data['patient'] = $patient->toArray();
        $data['test'] = $test->toArray();
        
        //$pdf = \PDF::loadView('pdf.invoice', $data)->save( 'files/' . $filename );
        $pdf = \PDF::loadView('pdf.report', $data)->output();

        //dd($pdf->output());

        Mail::send('emails.report', ['patient' => $patient], function($message) use ($patient, $pdf) {

            $message->to($patient->email);
            $message->from('info@olrs.com', 'Healthy Heart');
            $message->subject('[Healthy Heart] Test Report');
            $message->attachData($pdf, 'report.pdf');
        });
    }


}
