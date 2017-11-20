@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Reports
        <small>Add New</small>
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

                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Generate Report for Sample ID: {{ $data['sample_id'] }}</h3>
                    </div>

                    {!! Form::open(['url' => '/reports', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <!-- @include ('reports.form') -->

                    <div class="box-body">

                    <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                        {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
                  </div>

                    {{ Form::hidden('sample_id', $data['sample_id']) }}

                    {!! Form::close() !!}

<!--                 <div class="panel panel-default">
                    <div class="panel-heading">Generate Report for Sample ID: {{ $data['sample_id'] }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/reports', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('reports.form')

                        {{ Form::hidden('sample_id', $data['sample_id']) }}

                        {!! Form::close() !!}

                    </div>
                </div> -->
                </div>
                
            </div>
        </div>
    </section>    

@endsection