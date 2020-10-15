@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::open(['url' => 'passwordChanged', 'class' => 'form-horizontal', 'method' => 'POST']) }}

<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
<div class="form-group">
        {{ Form::label('old_password', trans('validation.attributes.frontend.register-user.old_password'), ['class' => 'control-label']) }}
        
            {{ Form::input('password', 'old_password', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.old_password')]) }}
        
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('password', trans('validation.attributes.frontend.register-user.new_password'), ['class' => 'control-label']) }}
        
            {{ Form::input('password', 'password', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.new_password')]) }}
        
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.register-user.new_password_confirmation'), ['class' => 'control-label']) }}
        
        {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.new_password_confirmation')]) }}
       
    </div>
     </div>

     <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'change-password']) }}
        </div>
    </div>
    </div>

    </div>

{{ Form::close() }}