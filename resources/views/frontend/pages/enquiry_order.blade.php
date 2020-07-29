@extends('frontend.layouts.app')

@section('title') Our Product @endsection
  
@section('meta_description')Our product @endsection

@section('meta_keywords') Our Product  @endsection

@section('content')

<body>
    
<div class="container-fluid"> <!---start-container-->
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="pagebox">
<!-- Tab links -->
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'orders', '{{url('orders')}}')">Orders</button>
  <button class="tablinks" onclick="openCity(event, 'enquiries', '{{url('enquiries')}}')">Enquiries</button>
  <button class="tablinks" onclick="openCity(event, 'orders_completed', '{{url('ordersCompleted')}}')">Orders Completed</button>
  <button class="tablinks" onclick="openCity(event, 'orders_cancelled', '{{url('ordersCancelled')}}')">Orders Cancelled</button>
</div>

<!-- Tab content -->
<div id="orders" class="tabcontent" style="display:block;">
@include('frontend.pages.component.order_component')
</div>

<div id="enquiries" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="orders_completed" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="orders_cancelled" class="tabcontent">
  <h3>orders_cancelled</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

</div>
</div>
</div>
</div> <!---End-container-->

 <!--------=====script======--------> 
<script>
function openCity(evt, divId, url) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(divId).style.display = "block";
  evt.currentTarget.className += " active";
  //$("#"+divId).load(url);
  $.ajax({
                type:"GET",
                url:url,
                cache:false,
                beforeSend: function(){
                    $("#"+divId).html('<div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div>');	
                },
                success: function(result) {
					$("#"+divId).html(result);
				}
            });
}
</script>
</body>

@endsection
        