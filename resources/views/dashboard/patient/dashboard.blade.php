@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Welcome 
        <small>
          @if(Sentinel::check())
            {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}
          @endif
        </small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
@endsection

@section('main_content')

    <section class="content">

    </section>

@endsection
