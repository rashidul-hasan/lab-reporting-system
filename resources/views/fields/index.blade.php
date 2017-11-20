@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')
<section class="content-header">
      <h1>
        Test Fields
        <small>View All</small>
      </h1>
      <a href="{{ route('fields.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Add New Test Field</a>
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
                    <div class="panel-heading">Fields</div>
                    <div class="panel-body">

                        <!-- <a href="{{ url('/fields/create') }}" class="btn btn-primary btn-xs" title="Add New Field"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a> -->
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Normal</th>
                                        <th>Reference Range</th>
                                        <th>Test Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fields as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->normal }}</td>
                                        <td>{{ $item->ref_range }}</td>
                                        <td>{{ $item->test->name }}</td>
                                        <td>
                                            <a href="{{ url('/fields/' . $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" title="View Field"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/fields/' . $item->id . '/edit') }}" data-toggle="tooltip" class="btn btn-primary btn-xs" title="Edit Field"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/fields', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Field" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Field',
                                                        'data-toggle' => 'tooltip',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $fields->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection