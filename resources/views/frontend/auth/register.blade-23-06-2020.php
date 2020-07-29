@extends('frontend.layouts.app')

@section('content')
<section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>{{ trans('labels.frontend.auth.register_box_title') }}</h2>                    
                </div>
            </div>
        </section>
<section class="challange_area">
            <div class="container">

                <div class="row signup">

                    <div class="col-md-12">

                        <div class="panel panel-default ">
                            <div class="panel-heading"></div>

                            <div class="panel-body register-wrp">

                                {{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal']) }}

                                <div class="form-group ">
                                    <div class="row">
                                    {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName'), ['class' => 'col-md-4 control-label required']) }}
                                    <div class="col-md-8">
                                        {{ Form::input('name', 'first_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!--col-md-8-->
                                </div>

                                </div><!--form-group-->

                                 <div class="form-group ">
                                    <div class="row">
                                    {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName'), ['class' => 'col-md-4 control-label required']) }}
                                    <div class="col-md-8">
                                        {{ Form::input('name', 'last_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!--col-md-8-->
                                </div>
                                </div><!--form-group-->

                               <div class="form-group ">
                                    <div class="row">
                                    {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label required']) }}
                                    <div class="col-md-8">
                                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!--col-md-8-->
                                </div>
                                </div><!--form-group-->

                                 <div class="form-group ">
                                    <div class="row">
                                    {{ Form::label('password', trans('validation.attributes.frontend.register-user.password'), ['class' => 'col-md-4 control-label required']) }}
                                    <div class="col-md-8">
                                        {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!--col-md-8-->
                                </div>
                                </div><!--form-group-->

                                 <div class="form-group ">
                                    <div class="row">
                                    {{ Form::label('password_confirmation', trans('validation.attributes.frontend.register-user.password_confirmation'), ['class' => 'col-md-4 control-label required']) }}
                                    <div class="col-md-8">
                                        {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                                        @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div><!--col-md-8-->
                                </div>
                                </div><!--form-group-->

                                
                                {{-- Company --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('company', trans('validation.attributes.frontend.register-user.company'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','company',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.company')]) }}
                                    @error('company')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->

                            {{-- Designation --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('designation', trans('validation.attributes.frontend.register-user.designation'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','designation', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.designation')]) }}
                                    @error('designation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Phone No --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('phone_no', trans('validation.attributes.frontend.register-user.phone_no'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','phone_no',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.phone_no')]) }}
                                    @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Website --}}
                            <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('website', trans('validation.attributes.frontend.register-user.website'), ['class' => 'col-md-4 control-label']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','website',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.website')]) }}
                                    @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Address Line 1 --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('address_line1', trans('validation.attributes.frontend.register-user.address_line1'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','address_line1',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line1')]) }}
                                    @error('address_line1')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- address_line2 --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('address_line2', trans('validation.attributes.frontend.register-user.address_line2'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','address_line2',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line2')]) }}
                                    @error('address_line2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- address_line3 --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('address_line3', trans('validation.attributes.frontend.register-user.address_line3'), ['class' => 'col-md-4 control-label ']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','address_line3', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line3')]) }}
                                    
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Country --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('country', trans('validation.attributes.frontend.register-user.country'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','country',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.country')]) }}
                                    @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- State --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('state', trans('validation.attributes.frontend.register-user.state'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','state',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.state')]) }}
                                    @error('state')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- City --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('city', trans('validation.attributes.frontend.register-user.city'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','city',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.city')]) }}
                                    @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Zip --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('zip', trans('validation.attributes.frontend.register-user.zip'), ['class' => 'col-md-4 control-label required']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','zip',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.zip')]) }}
                                    @error('zip')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Enquiry --}}
                             <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('enquiry', trans('validation.attributes.frontend.register-user.enquiry'), ['class' => 'col-md-4 control-label ']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','enquiry',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.enquiry')]) }}
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            {{-- Find Us --}}
                            <div class="form-group ">
                                    <div class="row">
                                {{ Form::label('find_us', trans('validation.attributes.frontend.register-user.find_us'), ['class' => 'col-md-4 control-label ']) }}

                                <div class="col-md-8">
                                    {{ Form::input('name','find_us',null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.find_us')]) }}
                                </div><!--col-md-8-->
                            </div>
                            </div><!--form control-->
                            

                                <div class="form-group row">
                                        <div class="col-xs-7">
                                        <label class="col-md-12 control-label">
                                            {!! Form::checkbox('is_term_accept',1,false) !!}
                                            I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!} 
                                            <!-- <a href="https://laravel-adminpanel.vrkansagara.in/pages?page_slug=terms-and-conditions">termes et conditions*</a> -->
                                            
                                            @error('is_term_accept')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror</label>
                                    </div><!--form-group-->
                                </div><!--col-md-8-->

                                @if (config('access.captcha.registration'))
                                    <div class="form-group row">
                                        <div class="col-md-8 col-md-offset-4">
                                            {!! Form::captcha() !!}
                                            {{ Form::hidden('captcha_status', 'true') }}
                                        </div><!--col-md-8-->
                                    </div><!--form-group-->
                                @endif

                                <div class="form-group row">
                                    <div class="col-md-8 col-md-offset-4">
                                        {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'btn-primary login-btn']) }}
                                    </div><!--col-md-8-->
                                </div><!--form-group-->

                                {{ Form::close() }}

                            </div><!-- panel body -->

                        </div><!-- panel -->

                    </div><!-- col-md-8 -->

                </div><!-- row -->

</div>
</section>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
@endsection
