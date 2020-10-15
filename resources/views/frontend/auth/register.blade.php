@php
$pageName = 'register';
@endphp

@extends('frontend.layouts.app')
@section('content')
<div class="login-register-wrapper section-padding">
   <div class="container">
      <div class="member-area-from-wrap">
         <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
               <div class="login-reg-form-wrap sign-up-form">
                  <h5>{{ trans('labels.frontend.auth.register_box_title') }}</h5>
                  {{ Form::open(['route' => 'frontend.auth.saveregister', 'class' => 'form-horizontal']) }}
                    
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text', 'first_name', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                           @error('first_name')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text', 'last_name', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                              @error('last_name')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('email', 'email', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                              @error('email')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('password', 'password', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                              @error('password')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('password', 'password_confirmation', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                              @error('password_confirmation')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text','company',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.company')]) }}
                              @error('company')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text','VATnumber',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.vatnumber')]) }}
                              @error('VATnumber')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text','designation', null,['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.designation')]) }}
                              @error('designation')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text','phone_no',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.phone_no')]) }}
                              @error('phone_no')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="single-input-item">
                           {{ Form::input('text','website',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.website')]) }}
                              @error('website')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-input-item">
                            {{ Form::input('text','address_line1',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line1')]) }}
                              @error('address_line1')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','address_line2',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line2')]) }}
                              @error('address_line2')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','address_line3', null,['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line3')]) }}
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','country',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.country')]) }}
                              @error('country')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','state',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.state')]) }}
                              @error('state')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','city',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.city')]) }}
                              @error('city')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','zip',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.zip')]) }}
                              @error('zip')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','enquiry',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.enquiry')]) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                            {{ Form::input('text','find_us',null, ['class' => ' box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.find_us')]) }}
                            </div>
                        </div>

                     </div>
                     <div class="single-input-item" style="display:none;">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                
                                                
                                                    <input type="checkbox" checked="checked" value="1" name="is_term_accept" class="custom-control-input" id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!}</label>
                                                </div>
                                                @error('is_term_accept')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                                            </div>
                                        </div>
                                    </div>
                   
                     @if (config('access.captcha.registration'))
                     <div class="form-group row">
                        <div class="col-md-8 col-md-offset-4">
                           {!! Form::captcha() !!}
                           {{ Form::hidden('captcha_status', 'true') }}
                        </div>
                     </div>
                     @endif
                     <div class="single-input-item">
                         <button type="submit" value="Register" class="btn btn-sqr">Register</button>
                     <!-- {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'btn btn-sqr']) }} -->
                      
                     </div>
                     {{ Form::close() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

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

