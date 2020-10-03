

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
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    </div>
                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}
                    <input type="hidden" name="token" value="{{ $token }}">
   
                  <div class="single-input-item">
                  {{ Form::input('hidden', 'email', $email, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                  </div>
                  <div class="single-input-item">
                  {{ Form::input('password', 'password', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                  </div>
                  <div class="single-input-item">
                  {{ Form::input('password', 'password_confirmation', null, ['class' => '', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                  </div>
             
                  <div class="single-input-item">
                   {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-sqr']) }}
                    
                  </div>
                  {{ Form::close() }}
               </div>
            </div>
          
         </div>
      </div>
   </div>
   </div>
<!-- <section class="banner_area">
   <div class="container">
      <div class="banner_inner_text">
         <h2>{{ trans('labels.frontend.passwords.reset_password_box_title') }}</h2>
      </div>
   </div>
</section> -->
<!--================End Banner Area =================-->
<!-- <section class="challange_area">
   <div class="container">
      <div class="row signup">
         <div class="col-lg-12">
            @if (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
            @endif
            {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
               {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
               <div class="col-md-6">
                  <p class="form-control-static">{{ $email }}</p>
                  {{ Form::input('hidden', 'email', $email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
               </div>
             
            </div>
            
            <div class="form-group">
               {{ Form::label('password', trans('validation.attributes.frontend.register-user.password'), ['class' => 'col-md-4 control-label']) }}
               <div class="col-md-6">
                  {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
               </div>
               
            </div>
           
            <div class="form-group">
               {{ Form::label('password_confirmation', trans('validation.attributes.frontend.register-user.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
               <div class="col-md-6">
                  {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
               </div>
               
            </div>
           
            <div class="form-group">
               <div class="col-md-6 col-md-offset-4">
                  {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary']) }}
               </div>
              
            </div>
            
            {{ Form::close() }}
         </div>
      </div>
      
   </div>

</section> -->
@endsection

