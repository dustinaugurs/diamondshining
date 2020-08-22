<?php
$orders = orders();
$totalOrders = @count($orders);
$enquiries = enquiries();
$totalEnquiries = @count($enquiries);
?>


                <li class="dropdown messages-menu"><!-----Start-Enquiries-Notification------->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i data-toggle="tooltip" data-placement="left" title="" data-original-title="Enquiries" class="fa fa-comment-o"></i>
                        <span class="label label-info" id="totalenquiry">{{$totalEnquiries}}</span>
                    </a>

                    <ul class="dropdown-menu" id="enquirylist">
                      @if($totalEnquiries > 0)
                        <li class="header heading">List of Latest Enquiries</li>
                        @foreach($enquiries as $enquiry)
                        <li class="header bbxxes">
                            <a href=""><span>({{$loop->iteration}}.) </span><span>{{$enquiry->first_name}} {{$enquiry->last_name}}</span><span><strong>Stock No. : </strong> {{$enquiry->stock_id}}</span><span>{{$enquiry->order_date}}</span></a>
                        </li>
                        @endforeach
                        <li class="footer updatelivestatus" findOrdstatus="1">
                        <a href="{{url('admin/enquiriesIndex')}}">{{  trans('strings.backend.general.see_all.messages') }}</a>
                        </li>
                        @else
                      <li class="header"><a href="">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</a></li>
                        @endif
                    </ul>
                </li><!-----End-Enquiries-Notification------->

                <li class="dropdown notifications-menu">  <!-----Start-Order-Notification------->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i data-toggle="tooltip" data-placement="left" title="" data-original-title="Orders"  class="fa fa-bell-o"></i>
                        <span class="label label-info notification-counter" id="totalorder">{{$totalOrders}}</span>
                    </a>
                    <ul class="dropdown-menu" id="orderlist">
                      @if($totalOrders > 0)
                        <li class="header heading">List of Latest Order</li>
                        @foreach($orders as $order)
                        <li class="header bbxxes">
                            <a href=""><span>({{$loop->iteration}}.) </span><span>{{$order->first_name}} {{$order->last_name}}</span><span><strong>Stock No. : </strong> {{$order->stock_id}}</span><span>{{$order->order_date}}</span></a>
                        </li>
                        @endforeach
                        <li class="footer updatelivestatus" findOrdstatus="4">
                        <a href="{{url('admin/orders')}}">{{  trans('strings.backend.general.see_all.messages') }}</a>
                        </li>
                        @else
                      <li class="header"><a href="">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</a></li>
                        @endif
                    </ul>
                    </li> <!-----End-Order-Notification------->