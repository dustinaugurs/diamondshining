

@if(!$customers->isEmpty())
 @foreach($customers as $customer)
<tr id="rowcustomer_{{$customer->id}}">
<td>{{ $loop->iteration }}</td>
<td>{{ $customer->login_time }}</td>
<td>{{$customer->first_name}} {{$customer->last_name}}</td>
<td>{{ $customer->ip_address }}</td>
<td>{{ $customer->mac_address }}</td>
<td>{{ $customer->browser }}</td>
<td>{{ $customer->plateform }}</td>
<td>{{ $customer->login_time }}</td>
<td>{{ $customer->logout_time }}</td>
<td>
@if(!empty($customer->logout_time))
{{ date('G:i:s', strtotime($customer->logout_time) - strtotime($customer->login_time)) }} Hrs.
@else
00:00:00 Hrs.
@endif
</td>
<td>
<div class="btn-group action-btn">                 
<a class="btn btn-flat btn-default deleteclass" deldata="{{ $customer->user_session_id }}"><i data-toggle="tooltip" data-placement="top" title="Delete" class="fa fa-trash"></i>
</a>
<a href="{{url('admin/userLogDetails')}}/{{ $customer->user_session_id }}" class="btn btn-flat btn-default">
<i data-toggle="tooltip" data-placement="top" title="" class="fa fa-eye" data-original-title="View Details"></i>
</a>
</div>
</td>
</tr>
@endforeach
@else
<tr><td colspan="11">No Data Found</td></tr>
@endif

