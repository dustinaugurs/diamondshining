
                                <!-- product single item start -->
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <caption>{{$order}}</caption>
 <thead>
<tr>
<th>Date 
        <div class="changedatabox">
            <select name="changedatetimeOrderP" id="changedatetimeOrderP">
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
    <th>Ref/Name/Contact No.</th>
    <th>Order Status</th>
    <th>Items</th>
    <th>Cost (Ex VAT)</th>
    <th>Multiplier</th>
    <th>SalePrice (Ex VAT)</th>
    <th>SalePrice (Inc VAT)</th>
    <th>Payment Status
    <div class="changedatabox">
            <select name="paymentStatusOrderP" id="paymentStatusOrderP">
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
 <tbody id="dataafterfilterOrderP">
     @if(!$orders->isEmpty())
 @foreach($orders as $order)
<tr id="rowupdateOrderP_{{$order->id}}">
<td>{{$order->order_date}}</td>
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
<span class="changests changestsOrderP_{{$order->id}}" id="upstatusOrderP_{{$order->id}}"><a class="getstatusvalueOrderP" href="javascript:void(0);" idsOrder="{{$order->id}}">Change</a></span>
</td>

<td><a class="view_diamond" target="_blank" href="{{url('printDetails')}}/{{$order->diamondfeed->stock_id}}">{{$order->diamondfeed->stock_id}}</a>
</td>

<td>
    @if($current_currency !== '')
    {{$symbol}} {{number_format(floor(($current_currency * $order->diamondfeed->price)*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

<td>{{$order->multiplierprice->multiplier_usd}} x</td>

<td>
    @if($current_currency !== '')
    {{$symbol}} {{number_format(floor(($current_currency * ($order->diamondfeed->price * $order->multiplierprice->multiplier_usd))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
    (Ex. VAT)
    </td>

    <td>
    @if($current_currency !== '')
    {{$symbol}}{{number_format(floor(($current_currency * ((20 / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price))*100)/100,2, '.', '')}}
    @else
    $ {{number_format(floor(((20 / 100 ) * $order->diamondfeed->price + $order->diamondfeed->price)*100)/100,2, '.', '')}}
    @endif
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

<span class="changests paymentOrderP_{{$order->id}}" id="paystatusOrderP_{{$order->id}}"><a class="getpaystatusOrderP" href="javascript:void(0);" payOrderP="{{$order->id}}">Change</a></span>
</td>

<td>{{$order->ETA}}</td>
</tr>
@endforeach
@else
<tr><td colspan="10">No Data Found</td></tr>
@endif

                                  

</tbody>
</table> 

</div>
							 
							 	 
							 
							 
							 