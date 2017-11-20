<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Invoice for Invoice ID {{ $invoice['id'] }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ public_path() . '/bootstrap/css/bootstrap.min.css'}}">

</head>
<body class="hold-transition login-page">

<section class="invoice">
      
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            Invoice <span class="pull-right">Healthy Heart Laboratory</span>
            <!-- <small class="pull-right">Date: {{ \Carbon\Carbon::now()->format('d/m/Y')}}</small> -->
          </h2>
        </div>
      </div>

      <div class="row">

        <div class="col-xs-8">
          <img src="{{ public_path() . '/img/logov2.png'}}" alt="">
        </div>

        <div class="col-xs-4 text-right">
          <address>
            <p>Invoice Number: {{ $invoice['id'] }}</p>
            <p>Issue Date: {{ $invoice['created_at'] }}</p>
            <p>Due Date: {{ $invoice['due_date'] }}</p>
            <p>Status: {{ ucwords($invoice['status']) }}</p>
          </address>
        </div>

      </div>

      <hr />

      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-6">
          <address>
            <p><strong>Payment To</strong></p>
            <p>Healthy Heart Laboratory</p>
            <p>204, Love Road, Tejgaon</p>
            <p>Dhaka 1212.</p>
            <p>Phone: 0171123456</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-lg-6 col-xs-6 text-right">
          <address>
            <p><strong>Bill To</strong></p>
            <p>{{ $patient['first_name'] }} {{ $patient['last_name'] }}</p>
            <p>{{ $patient['address'] }}</p>
            <p>{{ $patient['phone_number'] }}</p>
          </address>
        </div>

      </div>

      <hr />

      <p class="lead pull-left">Invoice Entries</p>

      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>Test Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>

                        <tr>
                          <td>{{ $test['name'] }}</td>
                          <td>1</td>
                          <td>{{ $test['cost'] }}</td>

                        </tr>

            </tbody>
          </table>
        </div>
      </div>

      <hr />

      <div class="row">
        <div class="col-xs-4 col-xs-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8 text-right">
          <p><strong>Total: {{ $invoice['amount'] }}</strong></p>
        </div>
      </div>




    </section>

</body>
</html>
