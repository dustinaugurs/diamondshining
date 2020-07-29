<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.name') }}</th>
        <td>{{ $user->first_name .' '. $user->last_name }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.email') }}</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Markup Template</th>
        <td>{{ $user->markup_template }}</td>
    </tr>
    <tr>
        <th>{{ 'Phone No.' }}</th>
        <td>{{ $user->phone_no }}</td>
    </tr>
    <tr>
        <th>Company Name</th>
        <td>{{ $user->company }}</td>
    </tr>
    <tr>
        <th>Designation</th>
        <td>{{ $user->designation }}</td>
    </tr>
    <tr>
        <th>Website</th>
        <td>{{ $user->website }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $user->address_line1 }}<br />{{ $user->address_line2 }}<br />{{ $user->address_line3 }}</td>
    </tr>
    <tr>
        <th>City</th>
        <td>{{ $user->city }}</td>
    </tr>
    <tr>
        <th>State</th>
        <td>{{ $user->state }}</td>
    </tr>
    <tr>
        <th>Country</th>
        <td>{{ $user->country }}</td>
    </tr>
    <tr>
        <th>Zip Code</th>
        <td>{{ $user->zip }}</td>
    </tr>
    <tr>
        <th>Enquiry</th>
        <td>{{ $user->enquiry }}</td>
    </tr>
    <tr>
        <th>Where you find us</th>
        <td>{{ $user->find_us }}</td>
    </tr>
    
    

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.status') }}</th>
        <td>{!! $user->status_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.confirmed') }}</th>
        <td>{!! $user->confirmed_label !!}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.created_at') }}</th>
        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.access.users.tabs.content.overview.last_updated') }}</th>
        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
    </tr>

    @if ($user->trashed())
        <tr>
            <th>{{ trans('labels.backend.access.users.tabs.content.overview.deleted_at') }}</th>
            <td>{{ $user->deleted_at }} ({{ $user->deleted_at->diffForHumans() }})</td>
        </tr>
    @endif
</table>