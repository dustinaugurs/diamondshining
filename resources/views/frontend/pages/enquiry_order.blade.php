@extends('frontend.layouts.app')

@section('title') Enquiry & Order @endsection
  
@section('meta_description')Our product @endsection

@section('meta_keywords') Our Product  @endsection

@section('content')

<body>
    
<div class="container-fluid"> <!---start-container-->
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="pagebox">
        <input type="hidden" class="getOrderStatus" id="getOrderStatus" value="1">
<!-- Tab links -->
<!-------Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5--------->
<div class="tab">   
  <button class="tablinks active" onclick="openCity(event, 'enquiries', '{{ url('enquiries') }}', 1)">Enquiries</button>
  <button class="tablinks" onclick="openCity(event, 'orders', '{{ url('orders') }}', 4)">Orders Request</button>
  <button class="tablinks" onclick="openCity(event, 'orders_placed', '{{ url('orders') }}', 5)">Orders Placed</button>
  <button class="tablinks" onclick="openCity(event, 'orders_completed', '{{ url('orders') }}', 2)">Orders Completed</button>
  <button class="tablinks" onclick="openCity(event, 'orders_cancelled', '{{ url('orders') }}', 3)">Orders Cancelled</button>
</div>

<!-- Tab content -->
<div id="enquiries" class="tabcontent" style="display:block;">
@include('frontend.pages.component.enquiries_component')
</div>

<div id="orders" class="tabcontent">
 <p>Order Content</p>
</div>

<div id="orders_placed" class="tabcontent">
 <p>Order Placed Content</p>
</div>

<div id="orders_completed" class="tabcontent">
  <p>Order completed Content</p>   
</div>

<div id="orders_cancelled" class="tabcontent">
   <p>Order Cancelled Content</p>
</div>

</div>
</div>
</div>
</div> <!---End-container-->

 <!--------=====script======--------> 
<script>
function openCity(evt, divId, url, orderStatus) {
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
  var data = 'order_status='+orderStatus+'&_token={{ csrf_token() }}';
  console.log('Orderstatus _ '+orderStatus);
  $('.getOrderStatus').val(orderStatus);
  $.ajax({
                type:"GET",
                url:url,
                data:data,
                cache:false,
                beforeSend: function(){
                    $("#"+divId).html('<div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div>');	
                },
                success: function(result) {
					$("#"+divId).html(result);
				}
            });
} 

//================
function updateReferrence(value){
$('.textarea_'+value).css('display', 'block');
}


//=================
$(document).ready(function(){

//===========---Start-Enquiries-Section---===============
  $('body').on('change', '#changedatetime', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', checkStatus='';  ;
          //console.log('date value_'+$(this).val());
			var data = 'date='+$(this).val()+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"GET",
                url:"{{ url('enqchangedate') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilter").html('<tr><td colspan="12"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {

                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*1)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };
  
                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

                outputdata += '<tr id="rowupdate_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changests_'+jsondata[i].id+'" id="upstatus_'+jsondata[i].id+'">'+'<a class="getstatusvalue" ids="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='12'>No Data Found</td></tr>";}
          //console.log('option_'+outputdata);
					$('#dataafterfilter').html(outputdata);	
                }
               
            });
		});

    //--------------------------------
    $('body').on('click', '.getstatusvalue', function(){
    var pid = $(this).attr('ids')
  console.log('pidids +'+$(this).attr('ids'));
  var options = '<span><select id="orderstatupt" prid="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="4">Order Request</option>'+
                '<option value="3">Order Cancelled</option>'+
                '</select></span>'+'<span><a class="clrred closestss" ids="'+pid+'" href="javascript:void(0)">X</a></span>';
       $('span.changests_'+pid).css('display', 'block');
       $('#upstatus_'+pid).html(options);
     });

  $('body').on('click', '.closestss', function(){
    var pid = $(this).attr('ids')
  var options = '<span><a class="getstatusvalue" ids="'+pid+'" href="javascript:void(0)">Change</a></span>';
      $('span.changests_'+pid).css('display', 'inline');
       $('#upstatus_'+pid).html(options);
     });     
//--------------------------------------

$('body').on('change', '#orderstatupt', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', id = '', successMsg = '', checkStatus=''  ;
      var prid = $(this).attr('prid');
      var date = $("#changedatetime").find("option:selected").val();
      var order_status = $(this).val();
          if(order_status=='NULL'){
            alert('Please Select Order Status');
            return false;
          }
          // console.log('prrid_'+prid);
          // console.log('date_'+date);
          // console.log('orderStatus_'+order_status);
          //return false;
			var data = 'date='+date+'&pid='+prid+'&order_status='+order_status+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"POST",
                url:"{{ url('orderstatuschange') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilter").html('<tr><td colspan="12"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  successMsg = resultJSON.successMsg; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {
                  id = jsondata[i].id;
                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*1)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };

                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

              outputdata += '<tr id="rowupdate_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changests_'+jsondata[i].id+'" id="upstatus_'+jsondata[i].id+'">'+'<a class="getstatusvalue" ids="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='12'>No Data Found</td></tr>";}
              toastr.success(successMsg);
          //console.log('success : '+successMsg);
					$('#dataafterfilter').html(outputdata);	
                }
               
            });
		});
//===========---End-Enquiries-Section---===============



//===========---Start-Order-Section---===============

    //--------------------------------
    $('body').on('click', '.getstatusvalueOrder', function(){
      var pid='', getorder_status=''; options='';
        pid = $(this).attr('idsOrder')
  console.log('pidids +'+$(this).attr('idsOrder'));
        getorder_status = $('#getOrderStatus').val();
        if(getorder_status==4){
   options = '<span><select class="orderstatuptOrder" pridOrder="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="5">Order Placed</option>'+
                '</select></span>'+'<span><a class="clrred closestssOrder" idsOrder="'+pid+'" href="javascript:void(0)">X</a></span>';
              }else if(getorder_status==5){
   options = '<span><select class="orderstatuptOrder" pridOrder="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="4">Order Request</option>'+
                '</select></span>'+'<span><a class="clrred closestssOrder" idsOrder="'+pid+'" href="javascript:void(0)">X</a></span>';  
              }
       $('span.changestsOrder_'+pid).css('display', 'block');
       $('.upstatusOrder_'+pid).html(options);
     });

  $('body').on('click', '.closestssOrder', function(){
    var pid = $(this).attr('idsOrder')
  var options = '<span><a class="getstatusvalueOrder" idsOrder="'+pid+'" href="javascript:void(0)">Change</a></span>';
      $('span.changestsOrder_'+pid).css('display', 'inline');
       $('.upstatusOrder_'+pid).html(options);
     });
//-------------------------------------
$('body').on('click', '.getpaystatusOrder', function(){
    var pid = $(this).attr('payOrder')
  console.log('pidids +'+$(this).attr('payOrder'));
  var options = '<span><select class="paystatupdateOrder" pridOrder="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="2">Deposit Paid</option>'+
                '<option value="3">Fully Paid</option>'+
                '</select></span>'+'<span><a class="clrred closepayOrder" payOrder="'+pid+'" href="javascript:void(0)">X</a></span>';
       $('span.paymentOrder_'+pid).css('display', 'block');
       $('.paystatusOrder_'+pid).html(options);
     });

  $('body').on('click', '.closepayOrder', function(){
    var pid = $(this).attr('payOrder')
  var options = '<span><a class="getpaystatusOrder" payOrder="'+pid+'" href="javascript:void(0)">Change</a></span>';
      $('span.paymentOrder_'+pid).css('display', 'inline');
       $('.paystatusOrder_'+pid).html(options);
     });      

//--------------------------------------
    //----------------filter-DATE-AND-Payment--status-----------------

    $('body').on('change', '.changedatetimeOrder', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', paymentStatus='' , payment_status='', date='', get_order_status='', checkStatus='' ;
          //console.log('date value_'+$(this).val());
          get_order_status = $('#getOrderStatus').val();
           date = $(this).val();
           payment_status = $(".paymentStatusOrder").find("option:selected").val();
           //console.log(get_order_status); return false;
			var data = 'date='+date+'&payment_status='+payment_status+'&get_order_status='+get_order_status+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"GET",
                url:"{{ url('dateAndPaymentFilter') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="14"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {

                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*jsondata[i].multiplierprice.multiplier_usd)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };

                            switch (jsondata[i].payment_status) {
                            case 1:
                            paymentStatus = "Pending";
                            break;
                            case 2:
                            paymentStatus = "Deposit Paid";
                            break;
                            case 3:
                            paymentStatus = "Fully Paid";
                            break;
                            default:
                            paymentStatus = "Pending";
                            };

                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

                outputdata += '<tr class="rowupdateOrder_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changestsOrder_'+jsondata[i].id+' upstatusOrder_'+jsondata[i].id+'">'+'<a class="getstatusvalueOrder" idsOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+jsondata[i].orderTrackingId+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='14'>No Data Found</td></tr>";}
          //console.log('option_'+outputdata);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});

    //------------------------

    $('body').on('change', '.paymentStatusOrder', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', paymentStatus='', payment_status='', date='', get_order_status='', checkStatus=''  ;
          get_order_status = $('#getOrderStatus').val();
          payment_status = $(this).val();
          date = $(".changedatetimeOrder").find("option:selected").val();
           console.log('date value_'+date+' Payment_status_'+payment_status);
          // return false;
			var data = 'date='+date+'&payment_status='+payment_status+'&get_order_status='+get_order_status+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"GET",
                url:"{{ url('dateAndPaymentFilter') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="14"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {

                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*jsondata[i].multiplierprice.multiplier_usd)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };

                            switch (jsondata[i].payment_status) {
                            case 1:
                            paymentStatus = "Pending";
                            break;
                            case 2:
                            paymentStatus = "Deposit Paid";
                            break;
                            case 3:
                            paymentStatus = "Fully Paid";
                            break;
                            default:
                            paymentStatus = "Pending";
                            };

                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

                outputdata += '<tr class="rowupdateOrder_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changestsOrder_'+jsondata[i].id+' upstatusOrder_'+jsondata[i].id+'">'+'<a class="getstatusvalueOrder" idsOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+jsondata[i].orderTrackingId+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='14'>No Data Found</td></tr>";}
          //console.log('option_'+outputdata);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});


    //--------------Start--Update-Payment-AND-ORDER-Status--------------------

$('body').on('change', '.orderstatuptOrder', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', id = '', successMsg = '', paymentStatus='',  get_order_status='', payment_status='', checkStatus=''  ;
          get_order_status = $('#getOrderStatus').val();
      var prid = $(this).attr('pridOrder');
      var date = $(".changedatetimeOrder").find("option:selected").val();
      var order_status = $(this).val();
          if(order_status=='NULL'){
            alert('Please Select Order Status');
            return false;
          }
          // console.log('prrid_'+prid);
          // console.log('date_'+date);
          // console.log('orderStatus_'+order_status);
          //return false;
			var data = 'date='+date+'&pid='+prid+'&order_status='+order_status+'&payment_status='+payment_status+'&get_order_status='+get_order_status+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"POST",
                url:"{{ url('OrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="14"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  successMsg = resultJSON.successMsg; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {
                  id = jsondata[i].id;
                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*jsondata[i].multiplierprice.multiplier_usd)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };

                            switch (jsondata[i].payment_status) {
                            case 1:
                            paymentStatus = "Pending";
                            break;
                            case 2:
                            paymentStatus = "Deposit Paid";
                            break;
                            case 3:
                            paymentStatus = "Fully Paid";
                            break;
                            default:
                            paymentStatus = "Pending";
                            };

                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

              outputdata += '<tr class="rowupdateOrder_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changestsOrder_'+jsondata[i].id+' upstatusOrder_'+jsondata[i].id+'">'+'<a class="getstatusvalueOrder" idsOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+jsondata[i].orderTrackingId+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='14'>No Data Found</td></tr>";}
              toastr.success(successMsg);
          //console.log('success : '+successMsg);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});


    $('body').on('change', '.paystatupdateOrder', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', id = '', successMsg = '', paymentStatus='', payment_status='', get_order_status='', order_status='', checkStatus=''  ;
          get_order_status = $('#getOrderStatus').val();
      var prid = $(this).attr('pridOrder');
      var date = $(".changedatetimeOrder").find("option:selected").val();
      var payment_status = $(this).val();
          if(payment_status=='NULL'){
            alert('Please Select Payment Status');
            return false;
          }
          // console.log('oprrid_'+prid);
          // console.log('odate_'+date);
          // console.log('oorderStatus_'+payment_status);
          // return false;
			var data = 'date='+date+'&pid='+prid+'&payment_status='+payment_status+'&order_status='+order_status+'&get_order_status='+get_order_status+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"POST",
                url:"{{ url('OrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="14"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
                  jsondata = resultJSON.data;
                  currency = resultJSON.current_currency;
                  symbol = resultJSON.symbol; 
                  successMsg = resultJSON.successMsg; 
                  if(jsondata.length > 0){ 
              for(i = 0; i < jsondata.length; i++) {
                  id = jsondata[i].id;
                cost_ex_VAT = symbol+''+(currency*jsondata[i].diamondfeed.price).toFixed(2);
                salePrice_ex_VAT = symbol+''+(currency*(jsondata[i].diamondfeed.price*jsondata[i].multiplierprice.multiplier_usd)).toFixed(2);
salePrice_inc_VAT = symbol+''+(currency*((20 / 100 )*jsondata[i].diamondfeed.price+jsondata[i].diamondfeed.price)).toFixed(2);

                          switch (jsondata[i].order_status) {
                            case 1:
                            orderStatus = "Enquiry";
                            break;
                            case 2:
                            orderStatus = "Completed";
                            break;
                            case 3:
                            orderStatus = "Cancelled";
                            break;
                            case 4:
                            orderStatus = "Order Request";
                            break;
                            case 5:
                            orderStatus = "Order Placed";
                            break;
                            default:
                            orderStatus = "Enquiry";
                            };

                            switch (jsondata[i].payment_status) {
                            case 1:
                            paymentStatus = "Pending";
                            break;
                            case 2:
                            paymentStatus = "Deposit Paid";
                            break;
                            case 3:
                            paymentStatus = "Fully Paid";
                            break;
                            default:
                            paymentStatus = "Pending";
                            };

                            switch (jsondata[i].checkStatus) {
                            case 1:
                              checkStatus = "Checking availability";
                            break;
                            case 2:
                              checkStatus = "Order confirmed";
                            break;
                            case 3:
                              checkStatus = "Order sent with tracking";
                            break;
                            default:
                             checkStatus = "Checking availability";
                            };

              outputdata += '<tr class="rowupdateOrder_'+jsondata[i].id+'">'+
                          '<td>'+(i+1)+'</td>'+
                          '<td>'+jsondata[i].order_date+'</td>'+
                          '<td>'+jsondata[i].client+'</td>'+
                          '<td>'+jsondata[i].ref_name_contact+'</td>'+
                          '<td>'+orderStatus+''+' <span class="changests changestsOrder_'+jsondata[i].id+' upstatusOrder_'+jsondata[i].id+'">'+'<a class="getstatusvalueOrder" idsOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="{{url('printDetails')}}/'+jsondata[i].diamondfeed.stock_id+'">'+jsondata[i].diamondfeed.stock_id+'</a>'+'</td>'+
                          '<td>'+'<a class="view_diamond" target="_blank" href="'+jsondata[i].diamondfeed.pdf+'">'+jsondata[i].diamondfeed.lab+'</a>'+'</td>'+
                          '<td>'+jsondata[i].diamondfeed.shape+'</td>'+
                          '<td>'+jsondata[i].orderTrackingId+'</td>'+
                          '<td>'+checkStatus+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='14'>No Data Found</td></tr>";}
              toastr.success(successMsg);
          //console.log('success : '+successMsg);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});
//===========---End-Order-Section---===============

});
</script>
</body>

@endsection
        