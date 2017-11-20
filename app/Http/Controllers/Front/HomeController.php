<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Test;
use App\Slot;
use Sentinel;
use Mail;
use App\Patient;

class HomeController extends Controller
{
    public function index()
    {
    	$data = [];

    	$tests = Test::all()->toArray();

    	foreach ($tests as $test) {
    		$item = [];
    		$item['test_name'] = $test['name'];
    		$item['test_id'] = $test['id'];
    		$slots = unserialize($test['slot']);
    		$test_slots = Slot::whereIn('id', $slots)->get()->toArray();
    		$item['slots'] = $test_slots;
    		array_push($data, $item);
    	}

    	//dd($data);
    	return view('front.index', ['data' => $data]);
    }

    public function register()
    {
    	if ($user = Sentinel::check()){

            if ($user->inRole('patient')) {
                return redirect('/home/appointments/create ');
            } else {
                Session::flash('error', 'You cannot access this page.');
                return view('errors.default');
            }
        	
        } else {
        	return view('front.register');
        }
    	//return view('front.register');
    }

    public function postRegister(Request $request)
    {
    	$data = $request->all();
    	//dd($data);

    	$id = $this->createPatientUserAccount($data);

    	//dd($id);

        $data['user_id'] = $id;

        // create patient
        Patient::create($data);
        
    	return redirect('/home/appointments/create ');
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

        // login the patient
        $login_data['email'] = $userData['email'];
        $login_data['password'] = $pass;
        Sentinel::authenticate($login_data);

        // send password via mail
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
