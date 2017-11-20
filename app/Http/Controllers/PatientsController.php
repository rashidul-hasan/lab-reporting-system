<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Patient;
use Illuminate\Http\Request;
use Session;
use Sentinel;
use Mail;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $patients = Patient::paginate(25);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $gender = Patient::getPossibleEnumValues('gender');
        return view('patients.create', ['gender' => $gender]);
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
        
        // create corresponding user for this patient
        $id = $this->createPatientUserAccount($requestData);

        $requestData['user_id'] = $id;

        // create patient
        Patient::create($requestData);

        Session::flash('flash_message', 'Patient added! A password has been sent to your mail.Please use it to login');

        return redirect('patients');
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
        $patient = Patient::findOrFail($id);

        return view('patients.show', compact('patient'));
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
        $gender = Patient::getPossibleEnumValues('gender');
        $patient = Patient::findOrFail($id);

        return view('patients.edit', ['patient' => $patient, 'gender' => $gender]);
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

        //dd($requestData);
        
        $patient = Patient::findOrFail($id);
        $patient->update($requestData);

        Session::flash('flash_message', 'Patient updated!');

        return redirect('patients');
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
        Patient::destroy($id);

        Session::flash('flash_message', 'Patient deleted!');

        return redirect('patients');
    }


    private function createPatientUserAccount($data){

        $role = Sentinel::findRoleBySlug('patient');

        $pass = substr(md5(rand()), 0, 8);

        $userData['email'] = $data['email'];
        $userData['first_name'] = $data['first_name'];
        $userData['last_name'] = $data['last_name'];
        $userData['password'] = $pass;

        $user = Sentinel::registerAndActivate($userData);

        $role->users()->attach($user);

        $this->sendMail($user, $pass);

        return $user->id;
        
    }

    private function sendMail($user, $pass){

        Mail::send('emails.password', ['pass' => $pass, 'user' => $user], function($message) use ($user) {

            $message->to($user->email);
            $message->from('info@olrs.com', 'Healthy Heart Laboratory');
            $message->subject('Welcome to Healthy Heart Laboratory');
        });
    }

}
