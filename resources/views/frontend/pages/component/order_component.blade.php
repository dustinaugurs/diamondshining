
                                <!-- product single item start -->
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
            <select name="changedatetimeOrder" class="changedatetimeOrder">
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
 <tbody class="dataafterfilterOrder">
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

<td><a class="view_diamond" target="_blank" href="{{$order->diamondfeed->pdf}}">{{$order->diamondfeed->lab}}</a>
</td>

<td>{{$order->diamondfeed->shape}}</td>

<td class="trackingid">{{$order->orderTrackingId}}</td>
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
    @if($current_currency !== '')
    {{$symbol}} {{number_format(floor(($current_currency * ($order->diamondfeed->price  * $order->multiplier_id))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price * $order->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

    <!-- <td>
    @if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * (($setting->VAT / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price))*100)/100,2, '.', '')}}
    @else
    $ {{number_format(floor((($setting->VAT / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (inc. VAT)
    </td> -->

<td> <!----mulipliercost---->
    @if($current_currency !== '')
   <?php 
   $finalprice = ($order->diamondfeed->price * $order->multiplier_id)+($order->diamondfeed->price * $order->multiplier_id)*$setting->VAT/100; 
   ?>
    {{$symbol}} {{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price * $order->multiplier_id)*100)/100,2, '.', '')}}
    @endif
    (Inc. VAT)
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
<tr><td colspan="14">No Data Found</td></tr>
@endif

                                  

</tbody>
</table> 

</div>
							 
							 	 
							 
							 
							 