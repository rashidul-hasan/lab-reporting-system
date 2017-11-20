@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Test Fields
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
                    <div class="panel-heading">Field {{ $field->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('fields/' . $field->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Field"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['fields', $field->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Field',
                                    'data-toggle' => 'tooltip',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $field->id }}</td></tr>
                                    <tr><th> Name </th><td> {{ $field->name }} </td></tr>
                                    <tr><th> Unit </th><td> {{ $field->unit }} </td></tr>
                                    <tr><th> Normal </th><td> {{ $field->normal }} </td></tr>
                                    <tr><th> Abnormal </th><td> {{ $field->abnormal }} </td></tr>
                                    <tr><th> Reference range </th><td> {{ $field->ref_range }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection