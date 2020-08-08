
                                <!-- product single item start -->
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <caption>{{$completed}}</caption>
 <thead>
<tr>
<th>Date 
        <div class="changedatabox">
            <select name="changedateCompleted" id="changedateCompleted">
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
            <select name="paymentCompleted" id="paymentCompleted">
                <option value="">All</option>
                <option value="">Deposite Paid</option>
                <option value="">Fully Paid</option>
            </select>
        </div>
    </th>
    <th>ETA</th>
</tr>
 </thead>
 <tbody id="dataafterfilterCompleted">
     @if(!$orders->isEmpty())
 @foreach($orders as $order)
<tr id="rowupdateCompleted_{{$order->id}}">
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
<span class="changests changestsCompleted_{{$order->id}}" id="upstatusCompleted_{{$order->id}}"><a class="getstatusvalueCompleted" href="javascript:void(0);" idsCompleted="{{$order->id}}">Change</a></span>
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

<td>Pending
    <a href="javascript">Change</a>
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
							 
							 	 
							 
							 
							 