@extends('frontend.layouts.app')

@section('content')
<section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>{{ trans('labels.frontend.passwords.reset_password_box_title') }}</h2>
                    
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        <section class="challange_area">
            <div class="container">
                <div class="row signup">

                        <div class="col-lg-12">
        

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal']) }}

<div class="form-group">
    {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
    </div><!--col-md-6-->
</div><!--form-group-->

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn btn-primary']) }}
    </div><!--col-md-6-->
</div><!--form-group-->

{{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

</section><!-- row -->
@endsection