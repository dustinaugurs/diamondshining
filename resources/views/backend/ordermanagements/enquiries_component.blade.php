

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

<span class="changests changestsOrder_{{$order->id}} upstatusOrder_{{$order->id}}"><a class="getstatusvalueOrder" href="javascript:void(0);" idsOrder="{{$order->id}}">Change</a></span>

</td>

<td><a class="view_diamond" target="_blank" href="{{url('admin/adprintDetails')}}/{{$order->diamondfeed->id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

<td><a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}</a>
</td>

<td>{{$order->diamondfeed->shape}}</td>

<!-- <td class="trackingid">{{$order->orderTrackingId}}</td> -->

<!-- <td class="status">
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
<span class="changests  checkStatus_{{$order->id}} checkstatusOrder_{{$order->id}}"><a class="getcheckstatusOrder" href="javascript:void(0);" checkOrder="{{$order->id}}" chStatus="{{$order->checkStatus}}">Change</a></span>
</td> -->

<td><!--Cost price-->
    {{$order->c_symbol}} {{$order->p_costprice}} 
    (Ex. VAT)
    </td>

<td>{{$order->multiplier_id}} X</td> <!--Multiplier-->

<td><!--Sell price ex vat-->
    {{$order->c_symbol}} {{$order->p_price_without_vat}} 
    (Ex. VAT)
    </td>

<td> <!---Sell price including vat---->
    {{$order->c_symbol}} {{$order->p_finalprice}} 
    (Inc. VAT)
    </td>


<td>{{$order->ETA}}</td>
</tr>
@endforeach
@else
<tr><td colspan="16">No Data Found</td></tr>
@endif