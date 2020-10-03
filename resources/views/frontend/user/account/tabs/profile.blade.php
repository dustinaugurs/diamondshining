<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6"> <!-------start-box-------->
<table class="table profiletable table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.first_name') }}</th>
        <td>{{ !empty($logged_in_user->first_name) ? $logged_in_user->first_name : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_name') }}</th>
        <td>{{ !empty($logged_in_user->last_name) ? $logged_in_user->last_name : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.company') }}</th>
        <td>{{ !empty($logged_in_user->company) ? $logged_in_user->company : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.vatnumber') }}</th>
        <td>{{ !empty($logged_in_user->VATnumber) ? $logged_in_user->VATnumber : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.cregNumber') }}</th>
        <td>{{ !empty($logged_in_user->cregNumber) ? $logged_in_user->cregNumber : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
        <td>{{ !empty($logged_in_user->email) ? $logged_in_user->email : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{ $logged_in_user->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ $logged_in_user->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>
</div> <!-------end-box-------->

<div class="col-lg-6 col-md-6 col-sm-6"> <!-------start-box-------->
<table class="table profiletable table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.address_line1') }}</th>
        <td>{{ !empty($logged_in_user->address_line1) ? $logged_in_user->address_line1 : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.address_line2') }}</th>
        <td>{{ !empty($logged_in_user->address_line2) ? $logged_in_user->address_line2 : '' }}</td>
    </tr>
    
    <tr>
        <th>{{ trans('labels.frontend.user.profile.address_line3') }}</th>
        <td>{{ !empty($logged_in_user->address_line3) ? $logged_in_user->address_line3 : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.city') }}</th>
        <td>{{ !empty($logged_in_user->city) ? $logged_in_user->city : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.state') }}</th>
        <td>{{ !empty($logged_in_user->state) ? $logged_in_user->state : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.country') }}</th>
        <td>{{ !empty($logged_in_user->country) ? $logged_in_user->country : '' }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.zip') }}</th>
        <td>{{ !empty($logged_in_user->zip) ? $logged_in_user->zip : '' }}</td>
    </tr>
</table>
</div> <!-------end-box-------->


</div>