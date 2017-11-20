@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Samples
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
@endsection

@section('main_content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">                



                <div class="panel panel-default">
                    <div class="panel-heading">Details for Sample ID: {{ $sample->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('samples/' . $sample->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Sample"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['samples', $sample->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Sample',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $sample->id }}</td></tr>
                                    <tr><th> Sample Type </th><td> {{ $sample->sample_type }} </td></tr>
                                    <tr><th> Patient Name</th><td> {{ $sample->patient->full_name }} </td></tr>
                                    <tr><th> Test Name</th><td> {{ $sample->test->name }} </td></tr>
                                    <tr><th> Appointment ID</th><td> {{ $sample->appointment->id }} </td></tr>
                                    <tr><th> Collect Date </th><td> {{ $sample->collect_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection