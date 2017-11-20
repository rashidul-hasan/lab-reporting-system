<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Test;
use Illuminate\Http\Request;
use Session;
//use Debugbar;

use App\Slot;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tests = Test::paginate(25);

        \Debugbar::info($tests);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $slots = Slot::getSlotsArray();

        return view('tests.create', ['slots' => $slots]);
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

        //$requestData = $request->except('slot');

        $requestData['slot'] = serialize($requestData['slot']);

        //dd($requestData);
        
        $id = Test::create($requestData)->id;

        Session::flash('flash_message', 'Test added!');

        return redirect('tests');
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
        $test = Test::findOrFail($id);
        $test_slots = Slot::find(unserialize($test->slot))->toArray();

        return view('tests.show', ['test' => $test, 'test_slots' => $test_slots]);
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
        $test = Test::findOrFail($id);
        $slots = Slot::getSlotsArray();

        $test_slots = Slot::find(unserialize($test->slot))->toArray();

        //dd($test_slots);

        return view('tests.edit', ['test' => $test, 
                    'slots' => $slots, 'test_slots' => $test_slots]);
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
        $requestData['slot'] = serialize($requestData['slot']);
        
        $test = Test::findOrFail($id);
        $test->update($requestData);

        Session::flash('flash_message', 'Test updated!');

        return redirect('tests');
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
        Test::destroy($id);

        Session::flash('flash_message', 'Test deleted!');

        return redirect('tests');
    }
}
