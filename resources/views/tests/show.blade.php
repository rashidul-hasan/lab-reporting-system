@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Tests
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



                <div class="panel panel-default">
                    <div class="panel-heading">Test ID: {{ $test->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('tests/' . $test->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Test" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tests', $test->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Test',
                                    'data-toggle' => 'tooltip',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $test->id }}</td></tr>
                                    <tr><th> Name </th><td> {{ $test->name }} </td></tr>
                                    <tr><th> Code </th><td> {{ $test->code }} </td></tr>
                                    <tr><th> Description </th><td> {{ $test->description }} </td></tr>
                                    <tr>
                                        <th> Slots </th>
                                        <td>
                                            @if(isset($test_slots))
                                                @foreach($test_slots as $test_slot)
                                                    <small class="label bg-blue">{{ $test_slot['time'] }}</small>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

             </div>
        </div>
    </section>

@endsection