
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

<td class="trackingid_{{$order->id}}">{{$order->orderTrackingId}}</td>
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
@if($order->checkStatus !== '3')
@if($order->order_status==5)
<span class="changests  checkStatus_{{$order->id}} checkstatusOrder_{{$order->id}}"><a class="getcheckstatusOrder" href="javascript:void(0);" checkOrder="{{$order->id}}" chStatus="{{$order->checkStatus}}">Change</a></span>
@endif
@endif
</td>

<td>{{$order->multiplier_id}} X</td>

<td> <!----mulipliercost---->
    @if($current_currency !== '')
   <?php 
   $finalprice = ($order->diamondfeed->price * $order->multiplier_id)+($order->diamondfeed->price * $order->multiplier_id)*$setting->VAT/100; 
   
   ?>
    {{$symbol}}{{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price * $order->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Inc. VAT)
    </td>

<td>
    @if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($order->deliverycost_from_admin * $order->user->template->multiplier_usd))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->deliverycost_from_admin)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>



    <td>
    @if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($order->diamondfeed->price * $order->multiplier_id))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price*$order->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

    <td>
    @if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ($order->diamondfeed->price))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>


<!-- <td>
    @if($order->user->currency_code !== '')
    {{$order->user->currency_symbol}} {{number_format(floor(($current_currency[$order->user->currency_code] * ($order->diamondfeed->price * 1))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

    <td>
    @if($order->user->currency_code !== '')
    {{$order->user->currency_symbol}}{{number_format(floor(($current_currency[$order->user->currency_code] * (($setting->VAT / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price))*100)/100,2, '.', '')}}
    @else
    $ {{number_format(floor((($setting->VAT / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (inc. VAT)
    </td> -->

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

