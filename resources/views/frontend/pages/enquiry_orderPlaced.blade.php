@extends('frontend.layouts.app')

@section('title') Order Placed @endsection
  
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
  <button class="tablinks"><a href="{{url('enquiry-order')}}">Enquiries</a></button>
  <button class="tablinks active"><a href="{{url('enquiry-order/ordersPlaced')}}">Orders Placed</a></button>
  <button class="tablinks"><a href="{{url('enquiry-order/ordersCompleted')}}">Orders Completed</a></button>
</div>

<!-- Tab content -->
<div class="tabcontent" style="display:block;">
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
        <select id="changedatetime">
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
    <th>Tracking ID</th>
    <th>Status</th>
    <th>Price (Ex VAT)</th>
    <!-- <th>Price (Inc VAT)</th> -->
    <th>Final Price (Inc VAT)</th>
    <th>Payment Status
    <div class="changedataboxpayment">
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
 <tbody id="dataafterfilter">
@include('frontend.pages.component.order_component')
</tbody>

<!--------->
<tr class="paginationblock">
<td colspan="14">
{!! $orders->appends(\Request::except('page'))->render() !!}
</td>
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
 //Enquiry=1, Completed=2, Cancelled=3, Order Request=4, Order Placed=5
  $('body').on('change', '#changedatetime', function(){
      var date='', orderstatus='' ;
          date = $(this).val();
          orderstatus = '5';
			var data = 'date='+date+'&orderstatus='+orderstatus+'&_token={{ csrf_token() }}';
      console.log(data);
            $.ajax({
                type:"POST",
                url:"{{ url('orderchangedate') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#dataafterfilter").html('<tr><td colspan="12"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON);
          //console.log('option_'+outputdata);
					$('#dataafterfilter').html(resultJSON);	
                }
               
            });
		});
//=========================================
});
</script>
</body>

@endsection
        