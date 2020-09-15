@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.orders.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.orders.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.orders.management') }}</h3>

            
        </div><!--box-header with-border-->

        <!--------status-popup----------->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content enquiryboxmodel">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fill Up Details</h4>
        </div>
        <div class="modal-body">

        <!----->
        <div class="row">

             <div class="col-md-12 col-sm-12 col-xs-12">
             <input type="hidden" value="" id="checkid23" class="checkid23" placeholder="xyz" >
          <div class="input-group">
          <span class="input-group-addon">Delivery Cost : </span>
          <input type="text" value="0.00" id="deliverycost23" class="deliverycost23 form-control" placeholder="Delivery Cost" required>
          </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Estimated Time of Arrival (ETA) : </span>
                <?php
                $date = date('Y-m-d');
                $eta = date('Y-m-d', strtotime($date. ' + 3 days'));
                ?>
          <input type="date" value="{{$eta}}" id="etadate" class="etadate form-control" placeholder="YYYY-MM-DD" required>
          </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Tracking ID : </span>
          <input type="text" value="" id="trackingid" class="trackingid form-control" placeholder="Enter Tracking ID" required>
          </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Select Status : </span>
          <select name="checkstatustt" class="checkstatustt form-control">
                <!-- <option value="1">Checking availability</option> -->
                <option value="2">Order confirmed</option>
                <option value="3">Order sent with tracking</option>
            </select>
          </div>
          </div>

             </div>
        <!------>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary checkstatupdatetwothree">Update</button>
        </div>
        </div>
       </div>
       </div>
        <!-------------------->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Date
        <div class="changedatabox">
            <select name="changedatetimeOrder" class="changedatetimeOrder">
            <option value="all">All</option>    
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
                <option value="all">All</option>
                <!-- <option value="1">Enquiry</option> -->
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
                <option value="all">All</option>
                <option value="1">Checking availability</option>
                <option value="2">Order confirmed</option>
                <option value="3">Order sent with tracking</option>
            </select>
        </div>
    </th>
    <th>Muliplier</th>
    <th>Final Price(Inc VAT)</th>
    <th>Delivery Cost</th>
    <th>Price (Ex VAT)</th>
    <th>Actual Price (Ex VAT)</th>
    <th>Payment Status
    <div class="changedata">
            <select name="paymentStatusOrder" class="paymentStatusOrder">
                <option value="all">All</option>
                <option value="1">Pending</option>
                <option value="2">Deposite Paid</option>
                <option value="3">Fully Paid</option>
            </select>
        </div>
    </th>
    <th>ETA</th>
    <th>Invoice</th>
</tr>
 </thead>
 <tbody id="dataafterfilterOrder">
    

 @include('backend.ordermanagements.order_component')  
                          
</tbody>
<!--------->
<tr class="paginationblock">
<td colspan="17">
{!! $orders->appends(\Request::except('page'))->render() !!}
</td>
</tr>
<!--------->
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


			// Pagination data Tag //
			$(document).find('.pagination a').each(function(){
					var href = $(this).attr('href');
					$(this).removeAttr('href');
					$(this).attr('data-target', href);
			})

			// Pagination click //
			$(document).find('.pagination a').on('click', function(){
						var target = $(this).attr('data-target');
						location.href = target;
			})

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
    console.log('check Status_ '+$(this).attr('checkOrder'));
    var pid = $(this).attr('checkOrder')
    var chstatus = $(this).attr('chStatus')  
  var options = '<span><select class="checkstatupdateOrder" prID="'+pid+'" chhstatus="'+chstatus+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="1">Checking availability</option>'+
                '<option value="2">Order confirmed</option>'+
                '<option value="3">Order sent with tracking</option>'+
                '</select></span>'+'<span><a class="clrred closecheckOrder" checkOrder="'+pid+'" href="javascript:void(0)">X</a></span>';
       $('span.checkStatus_'+pid).css('display', 'block');
       $('.checkstatusOrder_'+pid).html(options);
    }
     
     );

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

           var allordstatus = [2,3,4,5];
			var data = 'date='+date+'&payment_status='+payment_status+'&get_order_status='+get_order_status+'&check_status='+check_status+'&allordstatus='+allordstatus+'&_token={{ csrf_token() }}';
            //console.log('mydatat_'+data); return false;
            $.ajax({
                type:"GET",
                url:"{{ url('admin/addateAndPaymentFilter') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                  //console.log('htmdata _'+resultJSON)
				      	$('#dataafterfilterOrder').html(result);	
                }
               
            });
		});

    //--------------Start--Update-Payment-AND-ORDER-Status--------------------
    $('body').on('change', '.orderstatuptOrder, .paystatupdateOrder', function(){
      var  payment_status='',  order_status='', date='', check_status='', prid=''  ;
         prid = $(this).attr('prID');
         date = $(".changedatetimeOrder").find("option:selected").val();
         payment_status = $(".paystatupdateOrder").find("option:selected").val();
         check_status = $(".checkstatupdateOrder").find("option:selected").val();
         order_status = $(".orderstatuptOrder").find("option:selected").val();
         var allordstatus = [2,3,4,5];
			var data = 'date='+date+'&pid='+prid+'&payment_status='+payment_status+'&order_status='+order_status+'&check_status='+check_status+'&allordstatus='+allordstatus+'&_token={{ csrf_token() }}';
            $.ajax({
                type:"POST",
                url:"{{ url('admin/adOrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				        //dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
              toastr.success('Your Data Successfully Updated');
					$('#dataafterfilterOrder').html(result);	
                } 
            });
		});
//--------------Start--Update-CheckStatus-1-------------------
        $('body').on('change', '.checkstatupdateOrder', function(){
      var  payment_status='', order_status='', date='', check_status='', prid=''  ;
         prid = $(this).attr('prID');
         date = $(".changedatetimeOrder").find("option:selected").val();
         payment_status = $(".paystatupdateOrder").find("option:selected").val();
         check_status = $(".checkstatupdateOrder").find("option:selected").val();
         order_status = $(".orderstatuptOrder").find("option:selected").val();
         if($('.checkstatupdateOrder').click()){
        if(check_status != 1){
            $('#checkid23').val(prid);
            $('#myModal').modal({
           show: 'show'
            });
            return false;
        }}
        var allordstatus = [2,3,4,5];
			var data = 'date='+date+'&pid='+prid+'&payment_status='+payment_status+'&order_status='+order_status+'&check_status='+check_status+'&allordstatus='+allordstatus+'&_token={{ csrf_token() }}';
             //console.log('updatedata_'+data); //return false;
            $.ajax({
                type:"POST",
                url:"{{ url('admin/adOrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				        //dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                toastr.success('Your Data Successfully Updated');
          //console.log('success : '+successMsg);
					$('#dataafterfilterOrder').html(result);	
                }
               
            });
		});
//--------------Start--Update-CheckStatus-2AND3-------------------
$('body').on('click', '.checkstatupdatetwothree', function(){
      var payment_status='', order_status='', date='', check_status='', deliveryCost='', prid='', etadate='', trackingid='';

      $('#myModal').modal('hide');
      
         prid = $('.checkid23').val();
         date = $(".changedatetimeOrder").find("option:selected").val();
         payment_status = $(".paystatupdateOrder").find("option:selected").val();
         order_status = $(".orderstatuptOrder").find("option:selected").val();
         
         check_status = $(".checkstatustt").find("option:selected").val();
         deliveryCost = $('#deliverycost23').val();
         trackingid = $('#trackingid').val();
         etadate = $('#etadate').val();

         var allordstatus = [2,3,4,5];
      
			var data = 'date='+date+'&pid='+prid+'&payment_status='+payment_status+'&order_status='+order_status+'&check_status='+check_status+'&deliveryCost='+deliveryCost+'&etadate='+etadate+'&allordstatus='+allordstatus+'&trackingid='+trackingid+'&_token={{ csrf_token() }}';
             //console.log('clickupdatedata_'+data); return false;
            $.ajax({
                type:"POST",
                url:"{{ url('admin/adOrderStatusAndPaymentUpdate') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $(".dataafterfilterOrder").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
              toastr.success('Your Data Successfully Updated');
					$('#dataafterfilterOrder').html(result);	
                }
               
            });
		});
//===========---End-Order-Section---===============

});
</script>
@endsection
