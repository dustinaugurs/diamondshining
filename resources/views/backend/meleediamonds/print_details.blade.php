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
    <td>{{$products->diamondfeed->stock_id}}</td>
  </tr>

  <tr>
  <td>Certificate</td>
  <td>{{$products->diamondfeed->lab}}</td>
  </tr>
                                
  <tr>
     <td>Certificate Number </td>
      <td>{{$products->diamondfeed->ReportNo}}</td>
  </tr>
                                
   <tr>
       <td>Carat Weight</td>
        <td> {{$products->diamondfeed->carats}} </td>
   </tr>

<tr>
<td>Colour</td>
<td>{{$products->diamondfeed->col}}</td>
</tr>

<tr>
<td>Clarity</td>
<td>{{$products->diamondfeed->clar}}</td>
</tr>

<tr>
<td>Polish</td>
<td>{{$products->diamondfeed->pol}}</td>
</tr>

<tr>
<td>Symmetry</td>
<td>{{$products->diamondfeed->symm}}</td>
</tr>

<tr>
<td>Fluo.</td>
<td>{{$products->diamondfeed->flo}}</td>
</tr>

<tr>
<td>Depth %</td>
<td>{{$products->diamondfeed->depth}}</td>
</tr>

<tr>
<td>Table %</td>
<td>{{$products->diamondfeed->table}}</td>
</tr>

<tr>
<td>Measurements  (mm)</td>
<td>{{$products->diamondfeed->length}} X {{$products->diamondfeed->width}} X {{$products->diamondfeed->height}} </td>
</tr>

<tr>
<td><b>Actual Price (Excluding VAT)</b></td>
<td><b>
@if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($products->diamondfeed->price))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($products->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
</b></td>
</tr>

<tr>
<td>
<b>Price (Including VAT)</b></td>
<td><b>
@if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($products->diamondfeed->price * $products->multiplier_id))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($products->diamondfeed->price * $products->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
</b></td>
</tr>

<tr>
<td>
<b>Final Price (Including VAT)</b></td>
<td><b>
 <!----mulipliercost---->
    @if($current_currency !== '')
   <?php 
   $finalprice = ($products->diamondfeed->price * $products->multiplier_id)+($products->diamondfeed->price * $products->multiplier_id)*$setting->VAT/100; 
   
   ?>
    {{$symbol}}{{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($finalprice)*100)/100,2, '.', '')}}
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
    <span><img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="product" class="sec-img"></span>
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


        