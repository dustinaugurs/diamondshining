
@if(!$orders->isEmpty())
 @foreach($orders as $order)
<tr id="rowupdateOrder_{{$order->id}}">
<td>{{ $loop->iteration }}</td>
<td><input type="checkbox" value="{{$order->id}}" name="multipleinvoice[]" /></td>
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

<<<<<<< HEAD
@if($order->order_status !== 2)
=======
@if($order->payment_status !== 3)
>>>>>>> ae3b59b112dba3aec89c8b5004770b3d0aa3321f
<span class="changests changestsOrder_{{$order->id}} upstatusOrder_{{$order->id}}"><a class="getstatusvalueOrder" href="javascript:void(0);" idsOrder="{{$order->id}}">Change</a></span>
@endif
</td>

<td><a class="view_diamond" target="_blank" href="{{url('admin/adprintDetails')}}/{{$order->diamondfeed->id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

{{-- <td><a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}</a>
</td>

<td>{{$order->diamondfeed->shape}}</td> --}}

<td class="trackingid_{{$order->id}}">{{$order->orderTrackingId}}
    @if($order->payment_status == 3)
<span data-toggle="tooltip" title="Tracking Id Update" class="changests paymentOrder_{{$order->id}} paystatusOrder_{{$order->id}}"><a  data-toggle="modal" data-target="#myTracking" class="trackingbtn" href="javascript:void(0);" trackingidupdate="{{$order->orderTrackingId}}" paymentStatus="{{$order->payment_status}}" payOrder="{{$order->id}}"><i class="fa fa-edit"></i></a></span>
    @endif
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
        Order sent
        @break
    @case(4)
        Order Not confirmed
        @break  
    @case(5)
        Not Available
        @break       
    @default
       Checking availability
@endswitch
@if($order->payment_status !== 3)
@if($order->order_status==5)
@if($order->checkStatus !== 3)
<span class="changests  checkStatus_{{$order->id}} checkstatusOrder_{{$order->id}}"><a class="getcheckstatusOrder" href="javascript:void(0);" checkOrder="{{$order->id}}" chStatus="{{$order->checkStatus}}">Change</a></span>
@endif
@endif
@endif

</td>

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
    @if($order->checkStatus == 2 || $order->checkStatus == 3)
    {{$order->c_symbol}} {{$order->p_finalprice}} 
    (Inc. VAT)
    @endif
    </td>

<td> <!--Delivery cost-->
    @if($current_currency !== '')
    {{$order->c_symbol}} {{number_format(floor(($current_currency * $order->deliverycost_from_admin)*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->deliverycost_from_admin)*100)/100,2, '.', '')}}
    @endif
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
         Paid
        @break
    @default
       Pending
@endswitch
@if($order->payment_status !== 3)
@if($order->checkStatus == 2 || $order->checkStatus == 3)
<span class="changests paymentOrder_{{$order->id}} paystatusOrder_{{$order->id}}"><a class="getpaystatusOrder" href="javascript:void(0);" payOrder="{{$order->id}}">Change</a></span>
@endif
@endif
</td>

<td>@if($order->ETA !== '0000-00-00'){{date_format(date_create($order->ETA),"d/m/Y")}}@endif</td>
<td>
@if($order->checkStatus == 2 || $order->checkStatus == 3)
<a target="_blank" href="{{url('public/invoicepdf/')}}/{{$order->invoice_file}}">{{$order->invoice_number}}</a>
@else

@endif
</td>
</tr>
@endforeach
@else
<tr><td colspan="18">No Data Found</td></tr>
@endif





