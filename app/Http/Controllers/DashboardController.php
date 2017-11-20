<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	if ( $user = Sentinel::getUser() ) {
    		if ($user->inRole('patient')) {
    			return view('dashboard.patient.dashboard');
    		} else {
    			return view('dashboard');
    		}
    	}
        
    }
}
