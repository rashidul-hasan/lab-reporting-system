@extends('layouts.master')

@section('title')Online Lab Reporting System | Patients @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Patients
        <small>Add New</small>
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

                <div class="panel panel-default">
                    <div class="panel-heading">Create New Patient</div>
                    <div class="panel-body">



                        @if ($errors->any())
                        {{dd($errors)}}
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/patients', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('patients.form')

                        {!! Form::close() !!}

                    </div>
                </div>
                
            </div>
        </div>
    </section>    

@endsection