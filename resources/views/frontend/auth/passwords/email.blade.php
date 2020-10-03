@extends('frontend.layouts.app')

@section('content')

<div class="login-register-wrapper section-padding">
   <div class="container">
      <div class="member-area-from-wrap">
         <div class="row">
          
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
               <div class="login-reg-form-wrap">
                  <h5>{{ trans('labels.frontend.passwords.reset_password_box_title') }}</h5>
                    <div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    </div>
                    {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal']) }}
                   

                  <div class="single-input-item">
                   {{ Form::input('email', 'email', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                  </div>
              
                  <div class="single-input-item">
                      <button type="submit" value="Send Password Reset Link" class="btn btn-sqr">Reset Password</button>
                   <!-- {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn btn-sqr']) }}
                -->
                  </div>
                  {{ Form::close() }}
               </div>
            </div>
          
         </div>
      </div>
   </div>
</div>
@endsection