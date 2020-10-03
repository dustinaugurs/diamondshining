@php
$pageName = 'login';
@endphp

@extends('frontend.layouts.app')
@section('content')
<!--================Challange Area =================-->
<div class="login-register-wrapper section-padding">
   <div class="container">
      <div class="member-area-from-wrap">
         <div class="row">
            <!-- Login Content Start -->
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
               <div class="login-reg-form-wrap">
                  <h5>{{ trans('labels.frontend.auth.login_box_title') }}</h5>
                  {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}
                  <div class="single-input-item">
                     {{ Form::input('email', 'email', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                  </div>
                  <div class="single-input-item">
                     {{ Form::input('password', 'password', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                  </div>
                  <div class="single-input-item">
                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                           <div class="remember-meta">
                              <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" type="checkbox" value="1" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                              </div>
                              
                           </div>
                           {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password'), ['class' => 'forget-pwd']) }}
                        </div>
                  </div>
         
                  <div class="single-input-item">
                     <button class="btn btn-sqr">Login</button>
                  </div>
                  {{ Form::close() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
   [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
   cursor: pointer;
   color: blue;
   background: #0000ff1a;
   width: 32%;
   height: 120%;
   }
</style>
@endsection

