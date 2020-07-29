@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($user, ['route' => ['admin.access.user.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                {{-- First Name --}}
                <div class="form-group">
                    {{ Form::label('First Name', trans('validation.attributes.backend.access.users.firstName'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.firstName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Last Name --}}
                <div class="form-group">
                    {{ Form::label('Last Name', trans('validation.attributes.backend.access.users.lastName'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.lastName'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Email --}}
                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.email'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
             
                {{-- Company --}}
                <div class="form-group">
                    {{ Form::label('company', trans('validation.attributes.backend.access.users.company'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('company',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.company'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Designation --}}
                <div class="form-group">
                    {{ Form::label('designation', trans('validation.attributes.backend.access.users.designation'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('designation', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.designation'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Phone No --}}
                <div class="form-group">
                    {{ Form::label('phone_no', trans('validation.attributes.backend.access.users.phone_no'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('phone_no', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.phone_no'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Website --}}
                <div class="form-group">
                    {{ Form::label('website', trans('validation.attributes.backend.access.users.website'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('website',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.website')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Address Line 1 --}}
                <div class="form-group">
                    {{ Form::label('address_line1', trans('validation.attributes.backend.access.users.address_line1'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address_line1',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.address_line1'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- address_line2 --}}
                <div class="form-group">
                    {{ Form::label('address_line2', trans('validation.attributes.backend.access.users.address_line2'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address_line2',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.address_line2'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- address_line3 --}}
                <div class="form-group">
                    {{ Form::label('address_line3', trans('validation.attributes.backend.access.users.address_line3'), ['class' => 'col-lg-2 control-label ']) }}

                    <div class="col-lg-10">
                        {{ Form::text('address_line3',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.address_line3')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Country --}}
                <div class="form-group">
                    {{ Form::label('country', trans('validation.attributes.backend.access.users.country'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('country',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.country'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- State --}}
                <div class="form-group">
                    {{ Form::label('state', trans('validation.attributes.backend.access.users.state'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('state',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.state'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- City --}}
                <div class="form-group">
                    {{ Form::label('city', trans('validation.attributes.backend.access.users.city'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('city',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.city'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Zip --}}
                <div class="form-group">
                    {{ Form::label('zip', trans('validation.attributes.backend.access.users.zip'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('zip', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.zip'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Enquiry --}}
                <div class="form-group">
                    {{ Form::label('enquiry', trans('validation.attributes.backend.access.users.enquiry'), ['class' => 'col-lg-2 control-label ']) }}

                    <div class="col-lg-10">
                        {{ Form::text('enquiry',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.enquiry')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                {{-- Find Us --}}
                <div class="form-group">
                    {{ Form::label('find_us', trans('validation.attributes.backend.access.users.find_us'), ['class' => 'col-lg-2 control-label ']) }}

                    <div class="col-lg-10">
                        {{ Form::text('find_us',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.find_us')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                {{-- Template--}}
                <div class="form-group">
                    {{ Form::label('template', 'Select Markup Template', ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{-- Form::text('markup_template',null, ['class' => 'form-control box-size', 'placeholder' => 'Select Markup Template', 'required'=> 'required'])--}}
                        @if(!empty($selectedTemplate))
                            {{ Form::select('markup_template', $templates, $selectedTemplate, ['class' => 'form-control tags box-size', 'placeholder' =>'Select Diamond Feed','required' => 'required']) }}
                        @else
                            {{ Form::select('markup_template', $templates, null, ['class' => 'form-control tags box-size','placeholder' =>'Select Diamond Feed', 'required' => 'required']) }}
                        @endif
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Status --}}
                @if ($user->id != 1)
                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-1">
                                <div class="control-group">
                                    <label class="control control--checkbox">
                                         {{ Form::checkbox('status', '1', $user->status == 1) }}
                                    <div class="control__indicator"></div>
                                    </label>
                                </div>
                        </div><!--col-lg-1-->
                    </div><!--form control-->

                    {{-- Confirmed --}}
                    <div class="form-group">
                        {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-1">
                            <div class="control-group">
                                <label class="control control--checkbox">
                                    {{ Form::checkbox('confirmed', '1', $user->confirmed == 1) }}
                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                        </div><!--col-lg-1-->
                    </div><!--form control-->

                    {{-- Associated Roles --}}
                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-8">
                            @if (count($roles) > 0)
                                @foreach($roles as $role)
                                    <div>
                                    @if($role->id == 3)
                                    <label for="role-{{$role->id}}" class="control control--radio">
                                    <input type="radio" value="{{$role->id}}" name="assignees_roles[]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $userRoles) ? 'checked' : '') }} id="role-{{$role->id}}" class="get-role-for-permissions" />  &nbsp;&nbsp;{!! $role->name !!}
                                    <div class="control__indicator"></div>
                                    <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                        (
                                            <span class="show-text">{{ trans('labels.general.show') }}</span>
                                            <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                            {{ trans('labels.backend.access.users.permissions') }}
                                        )
                                    </a>
                                    </label>
                                    @endif
                                    </div>
                                    <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                        @if ($role->all)
                                            {{ trans('labels.backend.access.users.all_permissions') }}
                                        @else
                                            @if (count($role->permissions) > 0)
                                                <blockquote class="small">
                                                    @foreach ($role->permissions as $perm)
                                                        {{$perm->display_name}}<br/>
                                                    @endforeach
                                                </blockquote>
                                            @else
                                                {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                            @endif
                                        @endif
                                    </div><!--permission list-->
                                @endforeach
                            @else
                                {{ trans('labels.backend.access.users.no_roles') }}
                            @endif
                        </div><!--col-lg-3-->
                    </div><!--form control-->
                    <input type="hidden" name="permissions[2]" value="2" id="perm_2" checked="checked"> 
                    {{-- Associated Permissions --}}
                    <div class="form-group hidden">
                        {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <div id="available-permissions" style="width: 700px; height: 200px; overflow-x: hidden; overflow-y: scroll;">
                                <div class="row">
                                    <div class="col-xs-12 get-available-permissions">
                                        @if ($permissions)

                                            @foreach ($permissions as $id => $display_name)
                                            <div class="control-group">
                                                <label class="control control--checkbox" for="perm_{{ $id }}">
                                                    <input type="checkbox" name="permissions[{{ $id }}]" value="{{ $id }}" id="perm_{{ $id }}" {{ isset($userPermissions) && in_array($id, $userPermissions) ? 'checked' : '' }} /> <label for="perm_{{ $id }}">{{ $display_name }}</label>
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            @endforeach
                                        @else
                                            <p>There are no available permissions.</p>
                                        @endif
                                    </div><!--col-lg-6-->
                                </div><!--row-->
                            </div><!--available permissions-->
                        </div><!--col-lg-3-->
                    </div><!--form control-->

                @endif
                <div class="edit-form-btn">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div>
            </div><!-- /.box-body -->
        </div><!--box-->

        @if ($user->id == 1)
            {{ Form::hidden('status', 1) }}
            {{ Form::hidden('confirmed', 1) }}
            {{ Form::hidden('assignees_roles[]', 1) }}
        @endif

    {{ Form::close() }}
@endsection

@section('after-scripts')
    <script type="text/javascript">
        Backend.Utils.documentReady(function(){
            csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Backend.Users.selectors.getPremissionURL = "{{ route('admin.get.permission') }}";
            // Backend.Users.init("edit");
        });
        window.onload = function () {
            Backend.Users.windowloadhandler();
        };

    </script>
@endsection
