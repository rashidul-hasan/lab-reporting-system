@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Patient
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
            <div class="col-lg-12 col-xs-6">         

            {{dd($patient->toArray())}}       



                <div class="panel panel-default">
                    <div class="panel-heading">Details of Patient: {{ $patient->name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('patients/' . $patient->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Patient"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['patients', $patient->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Patient',
                                    'data-toggle' => 'tooltip',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $patient->id }}</td></tr>
                                    <tr><th> First Name </th><td> {{ $patient->first_name }} </td></tr>
                                    <tr><th> Last Name </th><td> {{ $patient->last_name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $patient->email }} </td></tr>
                                    <tr><th> Age </th><td> {{ $patient->age }} </td></tr>
                                    <tr><th> Gender </th><td> {{ ucwords($patient->gender) }} </td></tr>
                                    <tr><th> Address </th><td> {{ $patient->address }} </td></tr>
                                    <tr><th> Notes </th><td> {{ $patient->notes }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection