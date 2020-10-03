@php
$pageName = 'searchinvoice';
@endphp
@extends('frontend.layouts.app')

@section('title') Search Invoice @endsection
  
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
  <button class="tablinks"><a href="{{url('enquiry-order/ordersPlaced')}}">Orders Placed</a></button>
  <button class="tablinks"><a href="{{url('enquiry-order/ordersCompleted')}}">Orders Completed</a></button>
  <button class="tablinks active"><a href="{{url('enquiry-order/SearchInvoice')}}">Search Invoice</a></button>
</div>

<!-- Tab content -->
<div id="enquiries" class="tabcontent" style="display:block;">
<div class="row invoiceboxsearch"><!---start-search------>
        <div class="col-sm-3">&nbsp;</div>
        <div class="col-sm-6">
            <div class="invoicesearcbox">
         <input type="text" id="invoicesearch" class="form-control" placeholder="Enter Invoice Number">
         </div>
        </div>
        <div class="col-sm-3">&nbsp;</div>
    </div><!----end-search----->
<div id="invoicesearchdata" class="table-responsive">
    
 
 

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

  $('body').on('keyup', '#invoicesearch', function(){
      var data = '' , invoice_number=[];
			
          invoice_number = $(this).val();
          //console.log(arrvalue.push(invoice_number));
			data = 'invoice_number='+invoice_number+'&_token={{ csrf_token() }}';
            console.log(data); //return false;
            $.ajax({
                type:"POST",
                url:"{{ url('getInvoice') }}",
                data:data,
                cache:false,
				// dataType:'json',
                beforeSend: function(){
                    $("#invoicesearchdata").html('<div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div>');	
                },
                success: function(resultJSON) {
                  //console.log(resultJSON.symbol);
          //console.log('option_'+outputdata);
					$('#invoicesearchdata').html(resultJSON);	
                }
               
            });
		});
//==========================================
});
</script>
</body>

@endsection
        