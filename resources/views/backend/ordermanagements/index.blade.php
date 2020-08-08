@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.orders.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.orders.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.orders.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.orders.partials.orders-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
            <select name="changedatetimeOrder" class="changedatetimeOrder">
            <option value="0">All</option>    
            <?php
            $dateTime = new DateTime('first day of this month');
            for ($i = 1; $i <= 56; $i++) {
            echo '<option value="'.$dateTime->format('m_Y').'">'.$dateTime->format('M-y').'</option>';
            $dateTime->modify('-1 month');
            }
            ?>
            </select>
        </div>
    </th>
    <th>Client</th>
    <th>Reference</th>
    <th>Order Status  
    <div class="changedata">
            <select name="checkOrderStatus" class="checkOrderStatus">
                <option value="0">All</option>
                <option value="1">Enquiry</option>
                <option value="2">Completed</option>
                <option value="3">Cancelled</option>
                <option value="4">Order Request</option>
                <option value="5">Order Placed</option>
            </select>
        </div>
    </th>
    <th>Stock No.</th>
    <th>Certificate</th>
    <th>Shape</th>
    <th>Tracking ID</th>
    <th>Status  
    <div class="changedata">
            <select name="checkStatus" class="checkStatus">
                <option value="0">All</option>
                <option value="1">Checking availability</option>
                <option value="2">Order confirmed</option>
                <option value="3">Order sent with tracking</option>
            </select>
        </div>
    </th>
    <th>Muliplier</th>
    <th>Delivery Cost</th>
    <th>SalePrice (Ex VAT)</th>
    <th>SalePrice (Inc VAT)</th>
    <th>Payment Status
    <div class="changedata">
            <select name="paymentStatusOrder" class="paymentStatusOrder">
                <option value="0">All</option>
                <option value="1">Pending</option>
                <option value="2">Deposite Paid</option>
                <option value="3">Fully Paid</option>
            </select>
        </div>
    </th>
    <th>ETA</th>
</tr>
 </thead>
 <tbody class="dataafterfilterOrder">
     @if(!$orders->isEmpty())
 @foreach($orders as $order)
<tr id="rowupdateOrder_{{$order->id}}">
<td>{{ $loop->iteration }}</td>
<td>{{$order->order_date}}</td>
<td>{{$order->client}}</td>
<td class="reftd_{{$order->id}}">
{{$order->ref_name_contact}}
</td>
<td>
@switch($order->order_status)
    @case(1)
        Enquiry
        @break
    @case(2)
        Completed
        @break
    @case(3)
        Cancelled
        @break
    @case(4)
        Order Request
        @break
    @case(5)
        Order Placed
        @break
    @default
        Enquiry
@endswitch
@if(!($order->order_status==2 || $order->order_status==3))
<span class="changests changestsOrder_{{$order->id}} upstatusOrder_{{$order->id}}"><a class="getstatusvalueOrder" href="javascript:void(0);" idsOrder="{{$order->id}}">Change</a></span>
@endif
</td>

<td><a class="view_diamond" target="_blank" href="{{url('admin/adprintDetails')}}/{{$order->diamondfeed->id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

<td><a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}</a>
</td>

<td>{{$order->diamondfeed->shape}}</td>

<td class="trackingid">{{$order->orderTrackingId}}</td>
<td class="status">
@switch($order->checkStatus)
    @case(1)
        Checking availability
        @break
    @case(2)
        Order confirmed
        @break
    @case(3)
        Order sent with tracking
        @break
    @default
       Checking availability
@endswitch
<span class="changests  checkStatus_{{$order->id}} checkstatusOrder_{{$order->id}}"><a class="getcheckstatusOrder" href="javascript:void(0);" checkOrder="{{$order->id}}">Change</a></span>
</td>

<td>{{$order->user->template->multiplier_usd}}</td>

<td>
    @if($order->user->currency_code !== '')
    {{$order->user->currency_symbol}} {{number_format(floor(($current_currency[$order->user->currency_code] * ($order->deliverycost_from_admin * $order->multiplierprice->multiplier_usd))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->deliverycost_from_admin)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>


<td>
    @if($order->user->currency_code !== '')
    {{$order->user->currency_symbol}} {{number_format(floor(($current_currency[$order->user->currency_code] * ($order->diamondfeed->price * 1))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

    <td>
    @if($order->user->currency_code !== '')
    {{$order->user->currency_symbol}}{{number_format(floor(($current_currency[$order->user->currency_code] * ((20 / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price))*100)/100,2, '.', '')}}
    @else
    $ {{number_format(floor(((20 / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (inc. VAT)
    </td>

<td>
@switch($order->payment_status)
    @case(1)
        Pending
        @break
    @case(2)
        Deposit Paid
        @break
    @case(3)
       Fully Paid
        @break
    @default
       Pending
@endswitch

<span class="changests paymentOrder_{{$order->id}} paystatusOrder_{{$order->id}}"><a class="getpaystatusOrder" href="javascript:void(0);" payOrder="{{$order->id}}">Change</a></span>
</td>

<td>{{$order->ETA}}</td>
</tr>
@endforeach
@else
<tr><td colspan="16">No Data Found</td></tr>
@endif

                                  

</tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var dataTable = $('#orders-table').dataTable({
                // processing: true,
                // serverSide: true,
                // ajax: {
                //     url: '{{ route("admin.cusorders") }}',
                //     type: 'post',
                //     //dataType: 'json'
                // },
                // columns: [
                //     {data: 'id', name: order.id},
                //     {data: 'stock_id', name: ''},
                //     // {data: 'created_at', name: '{{config('module.orders.table')}}.created_at'},
                //     // {data: 'actions', name: 'actions', searchable: false, sortable: false}
                // ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>

<script>
//=================
$(document).ready(function(){



//===========---Start-Order-Section---===============

    //--------------------------------
    $('body').on('click', '.getstatusvalueOrder', function(){
      var pid='', getorder_status=''; options='';
        pid = $(this).attr('idsOrder')
  console.log('Order Status_ '+$(this).attr('idsOrder'));
        getorder_status = $('#getOrderStatus').val();
        
   options = '<span><select class="orderstatuptOrder" prID="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                //'<option value="1">Enquiry</option>'+
                '<option value="2">Completed</option>'+
                '<option value="3">Cancelled</option>'+
                //'<option value="4">Order Request</option>'+
                '<option value="5">Order Placed</option>'+
                '</select></span>'+'<span><a class="clrred closestssOrder" idsOrder="'+pid+'" href="javascript:void(0)">X</a></span>';
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
  console.log('payment_ '+$(this).attr('payOrder'));
  var options = '<span><select class="paystatupdateOrder" prID="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="1">Pending</option>'+
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
$('body').on('click', '.getcheckstatusOrder', function(){
    var pid = $(this).attr('checkOrder')
  console.log('check Status_ '+$(this).attr('checkOrder'));
  var options = '<span><select class="checkstatupdateOrder" prID="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="1">Checking availability</option>'+
                '<option value="2">Order confirmed</option>'+
                '<option value="3">Order sent with tracking</option>'+
                '</select></span>'+'<span><a class="clrred closecheckOrder" checkOrder="'+pid+'" href="javascript:void(0)">X</a></span>';
       $('span.checkStatus_'+pid).css('display', 'block');
       $('.checkstatusOrder_'+pid).html(options);
     });

  $('body').on('click', '.closecheckOrder', function(){
    var pid = $(this).attr('checkOrder')
  var options = '<span><a class="getcheckstatusOrder" checkOrder="'+pid+'" href="javascript:void(0)">Change</a></span>';
      $('span.checkStatus_'+pid).css('display', 'inline');
       $('.checkstatusOrder_'+pid).html(options);
     });      

//--------------------------------------
    //----------------filter-DATE-AND-Payment--status-----------------
    $('body').on('change', '.changedatetimeOrder, .paymentStatusOrder, .checkStatus, .checkOrderStatus', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', paymentStatus='' , payment_status='', date='', get_order_status='', checkStatus='', check_status='' ;
          //console.log('date value_'+$(this).val());
           date = $(".changedatetimeOrder").find("option:selected").val();
           payment_status = $(".paymentStatusOrder").find("option:selected").val();
           check_status = $(".checkStatus").find("option:selected").val();
           get_order_status = $(".checkOrderStatus").find("option:selected").val();
			var data = 'date='+date+'&payment_status='+payment_status+'&get_order_status='+get_order_status+'&check_status='+check_status+'&_token={{ csrf_token() }}';
            console.log('mydatat_'+data); //return false;
            $.ajax({
                type:"GET",
                url:"{{ url('admin/addateAndPaymentFilter') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
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
                          '<td>'+checkStatus+' <span class="changests checkStatus_'+jsondata[i].id+' checkstatusOrder_'+jsondata[i].id+'">'+'<a class="getcheckstatusOrder" checkOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+''+'</td>'+
                          '<td>'+''+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='16'>No Data Found</td></tr>";}
          //console.log('option_'+outputdata);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});

    //------------------------

    //--------------Start--Update-Payment-AND-ORDER-Status--------------------



    $('body').on('change', '.orderstatuptOrder, .paystatupdateOrder, .checkstatupdateOrder', function(){
      var jsondata='', symbol='', currency='', i, outputdata='', orderStatus='', cost_ex_VAT='', salePrice_ex_VAT='', salePrice_inc_VAT='', id = '', successMsg = '', paymentStatus='', payment_status='', get_order_status='', order_status='', checkStatus='', date='', check_status=''  ;
         
         prid = $(this).attr('prID');
         date = $(".changedatetimeOrder").find("option:selected").val();
         payment_status = $(".paystatupdateOrder").find("option:selected").val();
         check_status = $(".checkstatupdateOrder").find("option:selected").val();
         order_status = $(".orderstatuptOrder").find("option:selected").val();

           console.log('productID_for_update_'+prid); 
          // console.log('odate_'+date);
          // console.log('oorderStatus_'+payment_status);
           //return false;
			var data = 'date='+date+'&pid='+prid+'&payment_status='+payment_status+'&order_status='+order_status+'&check_status='+check_status+'&_token={{ csrf_token() }}';
             console.log('updatedata_'+data); return false;
            $.ajax({
                type:"POST",
                url:"{{ url('admin/adOrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				        dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
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
                          '<td>'+''+'</td>'+
                          '<td>'+''+'</td>'+
                          '<td>'+salePrice_ex_VAT+' (Ex. VAT)'+'</td>'+
                          '<td>'+salePrice_inc_VAT+' (Inc. VAT)'+'</td>'+
                          '<td>'+paymentStatus+''+' <span class="changests paymentOrder_'+jsondata[i].id+' paystatusOrder_'+jsondata[i].id+'">'+'<a class="getpaystatusOrder" payOrder="'+jsondata[i].id+'" href="javascript:void(0);">Change</a>'+'</span>'+'</td>'+
                          '<td>'+jsondata[i].ETA+'</td>'+
                           '</tr>';
              }}else{ outputdata = "<tr><td colspan='16'>No Data Found</td></tr>";}
              toastr.success(successMsg);
          //console.log('success : '+successMsg);
					$('.dataafterfilterOrder').html(outputdata);	
                }
               
            });
		});
//===========---End-Order-Section---===============

});
</script>
@endsection
