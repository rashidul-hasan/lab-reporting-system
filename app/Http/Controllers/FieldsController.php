<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Field;
use App\Test;
use Illuminate\Http\Request;
use Session;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fields = Field::paginate(25);

        return view('fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tests = Test::all();
        
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        return view('fields.create', ['tests' => $test_data]);
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
        
        Field::create($requestData);

        Session::flash('flash_message', 'Field added!');

        return redirect('fields');
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
        $field = Field::findOrFail($id);

        //dd($field);

        return view('fields.show', compact('field'));
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
        $field = Field::findOrFail($id);

        $tests = Test::all();
        
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        return view('fields.edit', compact('field'));
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
        
        $field = Field::findOrFail($id);
        $field->update($requestData);

        Session::flash('flash_message', 'Field updated!');

        return redirect('fields');
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
        Field::destroy($id);

        Session::flash('flash_message', 'Field deleted!');

        return redirect('fields');
    }
}
