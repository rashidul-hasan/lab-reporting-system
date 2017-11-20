@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Slots
        <small>View All</small>
      </h1>
      <a href="{{ route('slots.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Add New Slot</a>
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
                    <div class="panel-heading">Slots</div>
                    <div class="panel-body">

                        <!-- <a href="{{ url('/slots/create') }}" class="btn btn-primary btn-xs" title="Add New Slot"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Time </th><th> Notes </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($slots as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->time }}</td><td>{{ $item->notes }}</td>
                                        <td>
                                            <a href="{{ url('/slots/' . $item->id) }}" class="btn btn-success btn-xs" title="View Slot" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/slots/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Edit Slot"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/slots', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Slot" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Slot',
                                                        'data-toggle' => 'tooltip',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $slots->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection