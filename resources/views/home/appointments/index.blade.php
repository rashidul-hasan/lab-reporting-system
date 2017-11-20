@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Appointments
        <small>View All</small>
      </h1>
      <a href="{{ route('home.appointments.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Make Appointment</a>
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
                @if(Session::has('flash_message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i>Success!</h4>
                        {!! session('flash_message') !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Appointments</div>
                    <div class="panel-body">

                        <!-- <a href="{{ url('/appointments/create') }}" class="btn btn-primary btn-xs" title="Add New Appointment"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
                        <br/>
                        <br/>

                        @if(isset($appointments))
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Test Name </th>
                                        <th> Status </th>
                                        <th> Date </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->test->name }}</td>
                                        @php
                                            $color;
                                            if($item->status == 'pending'){
                                                $color = 'bg-yellow';
                                            } elseif ($item->status == 'done') {
                                                $color = 'bg-green';
                                            } elseif ($item->status == 'processing') {
                                                $color = 'bg-blue';
                                            } else {
                                                $color = 'bg-red';
                                            }
                                        @endphp
                                        <td><small class="label {{ $color }}">{{ $item->status }}</small></td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <a href="{{ url('/home/appointments/' . $item->id) }}" class="btn btn-success btn-xs" title="View Appointment" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                                            @if($item->status == 'pending')

                                            <a href="{{ url('/home/appointments/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Appointment" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/home/appointments', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Appointment" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Appointment',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            
                                            @endif
             
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $appointments->render() !!} </div>
                        </div>
                        @else
                        <h3>No appointments</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection