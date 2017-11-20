<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;

use Sentinel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $all_roles = DB::table('roles')->pluck('slug', 'name');
        unset($all_roles['Patient']);
        $roles_array = [];
        foreach ($all_roles as $name => $slug) {
            $roles_array[$slug] = $name;
        }

        //dd($roles_array);
        return view('users.create', ['roles' => $roles_array]);
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
        
        $requestData = $request->except('role');
        $role = Sentinel::findRoleBySlug($request->role);

        $pass = substr(md5(rand()), 0, 8);

        

        $requestData['password'] = $pass;

        //dd($requestData);

        
        $user = Sentinel::registerAndActivate($requestData);

        $this->sendMail($user, $pass);

        $role->users()->attach($user);

        //dd($user);
        //User::create($requestData);

        Session::flash('flash_message', 'User added!');

        return redirect('');
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
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
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
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect('/');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('/');
    }

    private function sendMail($user, $pass){

        Mail::send('emails.password', ['pass' => $pass, 'user' => $user], function($message) use ($user) {

            $message->to($user->email);
            $message->from('info@olrs.com', 'Healthy Heart');
            $message->subject('[Healthy Heart] Welcome');
        });
    }

}
