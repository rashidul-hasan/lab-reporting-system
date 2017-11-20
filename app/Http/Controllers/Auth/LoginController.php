<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Sentinel;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

    	Sentinel::authenticate($request->all());

    	//dd($request->all());

        if ($user = Sentinel::check()){
        	return redirect('/');
        } else {
        	return redirect()->back()->withErrors(['login_failed' => 'Incorrect credentials!']);
        }

    }

    public function postLogout(Request $request){
    	Sentinel::logout();

    	return redirect('/login');
    }


}
