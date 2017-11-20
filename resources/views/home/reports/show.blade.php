@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Report
        <small>Details</small>
      </h1>
      <a href="{{ route('reports.print', $report->id) }}" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
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
                    <div class="panel-heading">Report {{ $report->id }}</div>
                    <div class="panel-body">

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>ID</th><td>{{ $report->id }}</td></tr>
                                    <tr><th>Sample Id </th><td> {{ $report->sample_id }} </td></tr>
                                    <tr><th>Remarks </th><td> {{ $report->remarks }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Result Summary</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>

                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Normal</th>
                        </tr>
                        
                        @if(isset($results))

                        @foreach($results as $result)
                        <tr>
                          <td>{{$result->name}}</td>
                          <td>{{$result->quantity}}</td>
                          <td>{{$result->unit}}</td>
                          <td>{{$result->normal}}</td>
                        </tr>
                        @endforeach

                        @endif

                    </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                  </div>


             </div>
        </div>
    </section>

@endsection