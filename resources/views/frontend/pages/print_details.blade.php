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
          .printbox table.table tr td{padding:6px 8px; font-size:14px;}
          .printbox h4{text-transform: uppercase;
                      margin-bottom: 15px;
                      font-size: 20px;}
          .printbox h4 span{float:right; cursor:pointer;}
          .printboximg{width:100%; margin:0px; padding:30vh 0px;}
          .printboximg span{max-width:100px; display:block; margin:auto;}
          .printboximg span img{max-width:100%;}

        </style>
       
    </head>
<body>
    
<div class="container"> <!---start-container-->
<div class="row">

  <div class="col-sm-5"><!--start-Data-details-->
  <div class="printbox">
  <?php //echo '<pre>'; print_r($products->toArray()); ?>
  <h4>Summary <span id="printdetail" onclick="window.print();"><i class="fa fa-print" aria-hidden="true"></i></span></h4>
  <table class="table table-border" id="printArea">
  <tbody class="diamondDetailTableBody">
  <tr>
    <td>Stock Number</td> 
    <td>{{$products->stock_id}}</td>
  </tr>

  <tr>
  <td>Certificate</td>
  <td>{{$products->lab}}</td>
  </tr>
                                
  <tr>
     <td>Certificate Number </td>
      <td>{{$products->ReportNo}}</td>
  </tr>
                                
   <tr>
       <td>Carat Weight</td>
        <td> {{$products->carats}} </td>
   </tr>

<tr>
<td>Colour</td>
<td>{{$products->col}}</td>
</tr>

<tr>
<td>Clarity</td>
<td>{{$products->clar}}</td>
</tr>

<tr>
<td>Polish</td>
<td>{{$products->pol}}</td>
</tr>

<tr>
<td>Symmetry</td>
<td>{{$products->symm}}</td>
</tr>

<tr>
<td>Fluo.</td>
<td>{{$products->flo}}</td>
</tr>

<tr>
<td>Depth %</td>
<td>{{$products->depth}}</td>
</tr>

<tr>
<td>Table %</td>
<td>{{$products->table}}</td>
</tr>

<tr>
<td>Measurements  (mm)</td>
<td>{{$products->length}} X {{$products->width}} X {{$products->height}} </td>
</tr>

<tr>
<td><b>Sell price ex vat</b></td>
<td><b>
@if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($products->price * $products->multiplier_id))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($products->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
</b></td>
</tr>

<!-- <tr>
<td>
<b>Sell price including vat</b></td>
<td><b>
@if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * (($setting->VAT / 100 ) * $products->price + $products->price))*100)/100,2, '.', '')}}
    @else
    $ {{number_format(floor((($setting->VAT / 100 ) * $products->price + $products->price)*100)/100,2, '.', '')}}
    @endif
    (inc. VAT)
</b></td>
</tr> -->

<tr>
<td>
<b>Sell price including vat</b></td>
<td><b> <!----mulipliercost---->
    @if($current_currency !== '')
   <?php 
   $finalprice = ($products->price * $products->multiplier_id)+($products->price * $products->multiplier_id)*$setting->VAT/100; 
   ?>
    {{$symbol}} {{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($products->price * $products->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Inc. VAT)
    </b></td>
</tr>

</tbody>
</table>

</div>
</div><!---End-Data-Details------>

<div class="col-sm-7 noPrint"><!--start-image-details-->
  <div class="printboximg">
  @if($products->image == '' || $products->image == 'true' )
  <span><img src="{{url('/')}}/public/assets/img/product/No_image.jpg" alt="product" class="sec-img"></span>
@else
 <span><img src="{{$products->image}}" alt="product" class="sec-img"></span>
@endif

</div>
</div><!---End-Image-Details------>

</div>
</div> <!---End-container-->

 <!--------=====script======--------> 
<script>

</script>
</body>
</html>


        