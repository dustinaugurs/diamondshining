@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
        <title>@yield('title', app_name())</title>
		<meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Meta -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <!-- Bootstrap-->
        {!! Html::style('css/bootstrap2.min.css') !!}
         <!-- Font-awesome CSS -->
  {!! Html::style('assets/css/vendor/font-awesome.min.css') !!}
  <link rel="stylesheet" href="http://dragon.diacert.com/css/print.css" type="text/css" media="print" />
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
        </script>

        <style>
          .printbox{ width:100%; margin:0px; padding:50px 0px;}
          .printbox table.table tr td{padding:6px 8px; font-size:14px; border:1px solid #ccc;}
          .printbox table.table tr td:first-child{width:20%}
          .printbox h4{text-transform: uppercase;
                      margin-bottom: 15px;
                      font-size: 20px;}
          .printbox h4 span{float:right; cursor:pointer; display:inline-block; margin:0 10px; width:30px;}
         

        </style>
       
    </head>
<body>
    
<div class="container"> <!---start-container-->
<div class="row">

  <div class="col-sm-8 offset-sm-2"><!--start-Data-details-->
  <div class="printbox">
  <h4>Customer Contact Details <span id="printdetail" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i></span> <span onclick="window.history.back();"><i class="fa fa-arrow-circle-left"></i></span></h4>
  <table class="table table-border" id="printArea">
  <tbody class="diamondDetailTableBody">
  <tr>
    <td><strong>Name </strong></td> 
    <td>{{$customers->name}}</td>
  </tr>
  <tr>
    <td><strong>Email </strong></td> 
    <td>{{$customers->email}}</td>
  </tr>
  <tr>
    <td><strong>Contact No. </strong></td> 
    <td>{{$customers->contact_no}}</td>
  </tr>
  <tr>
    <td><strong>IP Address</strong></td> 
    <td>{{$customers->ip_address}}</td>
  </tr>

  <tr>
    <td><strong>Browser</strong></td> 
    <td>{{$customers->browser}}</td>
  </tr>

  <tr>
    <td><strong>User Agent</strong></td> 
    <td>{{$customers->user_agent}}</td>
  </tr>

  <tr>
    <td><strong>Plateform</strong></td> 
    <td>{{$customers->plateform}}</td>
  </tr>

  <tr>
    <td><strong>Date & Time </strong></td> 
    <td>{{$customers->datetime}}</td>
  </tr>

  <tr>
    <td><strong>Subject</strong></td> 
    <td>{{$customers->subject}}</td>
  </tr>

  <tr>
    <td colspan="2"><strong>Customer Message : </strong></td>
    </tr>
    <tr> 
    <td colspan="2">
      {{$customers->message}}
    </td>
  </tr>

 
  

  
</tbody>
</table>

</div>
</div><!---End-Data-Details------>

</div>
</div> <!---End-container-->

 <!--------=====script======--------> 
<script>

</script>
</body>
</html>


        