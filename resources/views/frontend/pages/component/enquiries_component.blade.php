

 @if(!$orders->isEmpty())
 @foreach($orders as $order)
<tr id="rowupdate_{{$order->id}}">
<td>{{ $loop->iteration }}</td>
<td>{{$order->order_date}}</td>
<td>{{$order->client}}</td>
<td class="reftd">{{$order->ref_name_contact}}</td>
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
<span class="changests changests_{{$order->id}}" id="upstatus_{{$order->id}}"><a class="getstatusvalue" href="javascript:void(0);" ids="{{$order->id}}">Change</a></span>
<?php 
   $finalprice = ($order->diamondfeed->price * $order->multiplier_id)+($order->diamondfeed->price * $order->multiplier_id)*$setting->VAT/100; 
   ?>
   <input type="hidden" class="c_symbol_{{$order->id}}" value="{{$symbol}}"> 
  <input type="hidden" class="p_finalprice_{{$order->id}}" value="{{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}}"> 
</td>

<td><a class="view_diamond" target="_blank" href="{{url('printDetails')}}/{{$order->diamondfeed->stock_id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

<td>
    @if(!empty($order->diamondfeed->pdf_url))
    <a class="view_diamond" target="_blank" href="{{url('public/webscrap/pdf')}}/{{$order->diamondfeed->pdf_url}}">{{$order->diamondfeed->lab}}</a>
        @else
    <a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}
    </a>
   @endif
</td>

<td>{{$order->diamondfeed->shape}}</td>

<!---<td class="status">
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
</td>--->

<td>
    {{$order->c_symbol}} {{$order->p_price_without_vat}} 
    (Ex. VAT)
    </td>

    <!---<td> 
    {{$order->c_symbol}} {{$order->p_finalprice}} 
    (Inc. VAT)
    </td>--->

<!---<td>@if($order->ETA !== '0000-00-00'){{date_format(date_create($order->ETA),"d/m/Y")}}@endif</td>--->
</tr>
@endforeach
@else
<tr><td colspan="12">No Data Found</td></tr>
@endif


							 
							 	 
							 
							 
							 