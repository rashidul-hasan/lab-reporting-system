<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ public_path() . '/bootstrap/css/bootstrap.min.css'}}">
  <!-- Font Awesome -->
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
<!--   <link rel="stylesheet" href="{{ public_path() . '/dist/css/AdminLTE.min.css'}}"> -->
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="{{ public_path() . '/plugins/iCheck/square/blue.css'}}"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

</head>
<body class="hold-transition login-page">

<section class="invoice">
      <!-- title row -->

      <div class="row">
        <div class="col-xs-12">
          <img src="{{ public_path() . '/img/logov2.png'}}" alt="">
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Test Report
            <small class="pull-right">Date: {{ \Carbon\Carbon::now()->format('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-6">
          <address>
            <p><strong>Patient Details</strong></p>
            <p>Patient Name: {{ $patient['first_name'] }} {{ $patient['last_name'] }}</p>
            <p>Gender: {{ ucwords($patient['gender']) }}</p>
            <p>Age: {{ $patient['age'] }}</p>
            <p>Patient ID: {{ $patient['id'] }}</p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-6 col-lg-6 col-xs-6 text-right">
          <address>
            <p><strong>Test Details</strong></p>
            <p>Test Name: {{ $test['name'] }}</p>
            <p>Test Code: {{ $test['code'] }}</p>
            <p>Sample ID: {{ $sample['id'] }}</p>
            <p>Report ID: {{ $report['id'] }}</p>
          </address>
        </div>

      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Normal</th>
            </tr>
            </thead>
            <tbody>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->


     <div class="row">
        <div class="col-xs-12">
          <h4>Remarks:</h4>
          <p>{{ $report['remarks'] }}</p>
        </div>
        <!-- /.col -->
      </div>


    </section>

</body>
</html>
