@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Staffs
        <small>Details</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">                



                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">

                        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['users', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                                    <tr><th>First Name </th><td> {{ $user->first_name }} </td></tr>
                                    <tr><th> Last Name </th><td> {{ $user->last_name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                    @php
                                    $role = \Sentinel::findById($user->id)->roles()->first();
                                    @endphp
                                    <tr><th> Role </th><td> {{ $role->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection