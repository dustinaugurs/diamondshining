@if(@count($orders) !== 0)
<table class="table table-bordered" style="border-collapse:collapse;">
 <thead>
<tr>
<th>#</th>
<th>Date</th>
<th>Invoice Number</th>
    <th>Stock No.</th>
    <th>Certificate</th>
    <th>Shape</th>
    <th>Status</th>
    <th>Price (Ex VAT)</th>
    <th>Final Price (Inc VAT)</th>
    <th>ETA</th>
</tr>
 </thead>
 <tbody id="invoicesearch">
 @foreach($orders as $order)
<tr id="rowupdateOrder_{{$order->id}}">

<td>{{ $loop->iteration }}</td>
<td>{{$order->order_date}}</td>
<td><a target="_blank" href="{{url('public/invoicepdf')}}/{{$order->invoice_file}}">{{$order->invoice_number}}</a></td>

<td><a class="view_diamond" target="_blank" href="{{url('printDetails')}}/{{$order->diamondfeed->stock_id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

<td><a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}</a>
</td>

<td>{{$order->diamondfeed->shape}}</td>

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

</td>

<td>{{$order->ETA}}</td>
</tr>
@endforeach


</tbody>
</table> 
@else
<div class="invnotfound">
<p>Your Invoice Number Not Matched. Please Try Again.</p>
</div>

@endif