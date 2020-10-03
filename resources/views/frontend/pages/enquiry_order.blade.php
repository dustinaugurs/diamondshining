@php
$pageName = 'enquiryorder';
@endphp
@extends('frontend.layouts.app')

@section('title') Enquiry @endsection
  
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
  <button class="tablinks active"><a href="{{url('enquiry-order')}}">Enquiries</a></button>
  <button class="tablinks"><a href="{{url('enquiry-order/ordersPlaced')}}">Orders Placed</a></button>
  <button class="tablinks"><a href="{{url('enquiry-order/ordersCompleted')}}">Orders Completed</a></button>
  <button class="tablinks"><a href="{{url('enquiry-order/SearchInvoice')}}">Search Invoice</a></button>
</div>

<!-- Tab content -->
<div id="enquiries" class="tabcontent" style="display:block;">
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
            <select name="changedate" id="changedatetime">
            <option value="00_00">All</option>    
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
    <th>Order Status</th>
    <th>Stock No.</th>
    <th>Certificate</th>
    <th>Shape</th>
    <th>Status</th>
    <th>Price (Ex VAT)</th>
    <!-- <th>Price (Inc VAT)</th> -->
    <th>Final Price (Inc VAT)</th>
    <th>ETA</th>
</tr>
 </thead>
 <tbody id="dataafterfilter">
@include('frontend.pages.component.enquiries_component')
</tbody>

<!--------->
<tr class="paginationblock">
<td colspan="11">{!! $orders->appends(\Request::except('page'))->render() !!}</td>
</tr>
<!--------->
</table> 

</div>
</div>

</div>
</div>
</div>
</div> <!---End-container-->

 <!--------=====script======--------> 
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

//===========---Start-filterDate-Section---===============
  $('body').on('change', '#changedatetime', function(){
      var date='', orderstatus='' ;
          date = $(this).val();
          orderstatus = '1';
			var data = 'date='+date+'&orderstatus='+orderstatus+'&_token={{ csrf_token() }}';
      console.log(data);
            $.ajax({
                type:"POST",
                url:"{{ url('changedate') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilter").html('<tr><td colspan="12"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
          //console.log('option_'+outputdata);
					$('#dataafterfilter').html(resultJSON);	
                }
               
            });
		});
//=========================================

$('body').on('click', '.getstatusvalue', function(){
    var pid = $(this).attr('ids')
  console.log('pidids +'+$(this).attr('ids'));
  var options = '<span><select id="orderstatupt" class="orderstatupt" prid="'+pid+'">'+
                '<option value="NULL">--Select--</option>'+
                '<option value="4">Order Request</option>'+
                //'<option value="5">Order Placed</option>'+
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
     
//---------------------------------

$('body').on('change', '.orderstatupt', function(){
      var  payment_status='',  order_status='', date='', check_status='', prid=''  ;
         prid = $(this).attr('prID');
         c_symbol = $(".c_symbol_"+prid).val();
         p_finalprice = $(".p_finalprice_"+prid).val();
         order_status = $(this).find("option:selected").val();

      var data = 'pid='+prid+'&order_status='+order_status+'&c_symbol='+c_symbol+'&p_finalprice='+p_finalprice+'&_token={{ csrf_token() }}';
     // console.log('Enquiry to Order : '+data); return false;
            $.ajax({
                type:"POST",
                url:"{{ url('EnquiryToOrderSend') }}",
                data:data,
                cache:false,
				        //dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilter").html('<tr><td colspan="16"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
              toastr.success('Your Order Successfully');
					$('#dataafterfilter').html(result);	
                } 
            });
		});
     
//==========================================
});
</script>
</body>

@endsection
        