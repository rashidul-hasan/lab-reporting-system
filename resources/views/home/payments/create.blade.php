@extends('layouts.master')

@section('title')Online Lab Reporting System | Home @endsection

@section('content_header')

<section class="content-header">
      <h1>
        Payments
        <!-- <small>Add New</small> -->
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
                    <div class="panel-heading">Make payment for Invoice ID: {{ $invoice_id }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/home/payments', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('home.payments.form')

                        {!! Form::close() !!}

                    </div>
                </div>
                
            </div>
        </div>
    </section>    

@endsection


@section('footer_content')

<script>
    $('select').on('change', function (e) {
        
        var valueSelected = this.value;
        console.log('selected: ' + valueSelected);
        if (valueSelected == 'bkash') {

            $('.payment-bkash').fadeIn(300);
        } else {
            $('.payment-bkash').fadeOut(300);
        }

    });

</script>
@endsection