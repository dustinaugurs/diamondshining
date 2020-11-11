
                                <!-- product single item start -->

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
<!-- @if(!($order->order_status==2 || $order->order_status==3))
<span class="changests changestsOrder_{{$order->id}} upstatusOrder_{{$order->id}}"><a class="getstatusvalueOrder" href="javascript:void(0);" idsOrder="{{$order->id}}">Change</a></span>
@endif -->
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

<td class="trackingid">{{$order->orderTrackingId}}</td>

<td class="invoicenumber">
@if($order->checkStatus == '2' || $order->checkStatus == '3')
<a target="_blank" href="{{url('public/invoicepdf')}}/{{$order->invoice_file}}">{{$order->invoice_number}}</a>@endif
</td>

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
</td>

<td>
    {{$order->c_symbol}} {{$order->p_price_without_vat}}
    (Ex. VAT)
    </td>

    <td><!---ordered-price----->
    {{$order->c_symbol}} {{$order->p_finalprice}}
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

<!-- <span class="changests paymentOrder_{{$order->id}} paystatusOrder_{{$order->id}}"><a class="getpaystatusOrder" href="javascript:void(0);" payOrder="{{$order->id}}">Change</a></span> -->
</td>

<td>{{$order->ETA}}</td>
</tr>
@endforeach
@else
<tr><td colspan="15">No Data Found</td></tr>
@endif


							 
							 	 
							 
							 
							 