
                                <!-- product single item start -->
<div class="table-responsive">
 
 <table class="table table-bordered" style="border-collapse:collapse;">
 <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
            <select name="changedate" id="changedatetime">
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
    <th>Status</th>
    <th>SalePrice (Ex VAT)</th>
    <th>SalePrice (Inc VAT)</th>
    <th>ETA</th>
</tr>
 </thead>
 <tbody id="dataafterfilter">
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
<!-- <span class="changests changests_{{$order->id}}" id="upstatus_{{$order->id}}"><a class="getstatusvalue" href="javascript:void(0);" ids="{{$order->id}}">Change</a></span> -->
</td>

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

<td>
    @if($current_currency !== '')
    {{$symbol}} {{number_format(floor(($current_currency * ($order->diamondfeed->price * 1))*100)/100,2, '.', '')}} 
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

<td>{{$order->ETA}}</td>
</tr>
@endforeach
@else
<tr><td colspan="12">No Data Found</td></tr>
@endif

                                  

</tbody>
</table> 

</div>
							 
							 	 
							 
							 
							 