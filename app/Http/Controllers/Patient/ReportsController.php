<?php

namespace App\Http\Controllers\Patient;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Report;
use App\Field;
use Sentinel;
use App\Sample;
use App\Patient;

use Illuminate\Http\Request;
use Session;

class ReportsController extends Controller
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
        $samples = Sample::where('patient_id', $patient->id)->pluck('id')->toArray();

        //dd($samples);

        $reports = Report::whereIn('sample_id', $samples)->paginate(10);

        return view('home.reports.index', compact('reports'));
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

                array_push($results, $result);

                // remove from actual array
                unset($requestData[$key]);
            }
        }

        $requestData['results'] = json_encode($results);
        
        $id = Report::create($requestData)->id;

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

        //dd($report);

        //dd(json_decode($report->results));

        return view('home.reports.show', ['report' => $report, 'results' => json_decode($report->results)]);
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

        return view('reports.edit', compact('report'));
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

}
