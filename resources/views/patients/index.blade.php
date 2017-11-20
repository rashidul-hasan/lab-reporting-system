@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Patients
        <small>View All</small>
      </h1>
      <a href="{{ url('/patients/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Add New Patient</a>
      <!-- <ol class="breadcrumb">
        <li><a href="{{ url('/patients/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Add New Patient</a></li>
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
            <div class="col-lg-12 col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Patients</div>
                    <div class="panel-body">

                        <!-- <a href="{{ url('/patients/create') }}" class="btn btn-primary btn-xs" title="Add New Patient"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> First Name </th><th> Last Name </th><th> Age </th><th> Gender </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->age }}</td><td>{{ ucwords($item->gender) }}</td>
                                        <td>

                                            
                                                @if($user = Sentinel::getUser())
                                                    @if($user->inRole('admin'))
                                                        <a href="{{ url('/patients/' . $item->id) }}" data-toggle="tooltip" class="btn btn-success btn-xs" title="View Patient"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                    @else
                                                        <a href="{{ url('/patients/' . $item->id) }}" data-toggle="tooltip" class="btn btn-success btn-xs" title="View Patient"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                                        <a href="{{ url('/patients/' . $item->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Patient"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                                        {!! Form::open([
                                                            'method'=>'DELETE',
                                                            'url' => ['/patients', $item->id],
                                                            'style' => 'display:inline'
                                                        ]) !!}
                                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Patient" />', array(
                                                                    'type' => 'submit',
                                                                    'class' => 'btn btn-danger btn-xs',
                                                                    'title' => 'Delete Patient',
                                                                    'data-toggle' => 'tooltip',
                                                                    'onclick'=>'return confirm("Confirm delete?")'
                                                            )) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                @endif
                                           
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $patients->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection