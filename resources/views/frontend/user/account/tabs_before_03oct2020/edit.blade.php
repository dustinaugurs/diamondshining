{{ Form::model($logged_in_user, ['url' => 'profileUpdate', 'class' => 'form-horizontal', 'method' => 'POST']) }}
       @csrf

       <div class="row">

       <div class="col-lg-4 col-md-4 col-sm-4">
       <div class="form-group">
        {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'first_name', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
    </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'last_name', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 pformheading">
        <p>Comapny Details : </p>
     </div>

     <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('company', trans('validation.attributes.frontend.register-user.company'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'company', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.company')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('vatnumber', trans('validation.attributes.frontend.register-user.vatnumber'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'VATnumber', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.vatnumber')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('cregNumber', trans('validation.attributes.frontend.register-user.cregNumber'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'cregNumber', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.cregNumber')]) }}
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 pformheading">
        <p>Address Details : </p>
     </div>

     <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('address_line1', trans('validation.attributes.frontend.register-user.address_line1'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'address_line1', null, ['class' => 'form-control', 'required'=>'required',  'placeholder' => trans('validation.attributes.frontend.register-user.address_line1')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('address_line2', trans('validation.attributes.frontend.register-user.address_line2'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'address_line2', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line2')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('address_line3', trans('validation.attributes.frontend.register-user.address_line3'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'address_line3', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.address_line3')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('city', trans('validation.attributes.frontend.register-user.city'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'city', null, ['class' => 'form-control', 'required'=>'required',  'placeholder' => trans('validation.attributes.frontend.register-user.city')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('state', trans('validation.attributes.frontend.register-user.state'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'state', null, ['class' => 'form-control', 'required'=>'required',  'placeholder' => trans('validation.attributes.frontend.register-user.state')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('country', trans('validation.attributes.frontend.register-user.country'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'country', null, ['class' => 'form-control', 'required'=>'required',  'placeholder' => trans('validation.attributes.frontend.register-user.country')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
        {{ Form::label('zip', trans('validation.attributes.frontend.register-user.zip'), ['class' => 'control-label']) }}
            {{ Form::input('text', 'zip', null, ['class' => 'form-control', 'required'=>'required',  'placeholder' => trans('validation.attributes.frontend.register-user.zip')]) }}
        </div>
    </div>


    
    @if ($logged_in_user->canChangeEmail())
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="form-group">
            {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => ' control-label']) }}
            
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> {{  trans('strings.frontend.user.change_email_notice') }}
                </div>

                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'required'=>'required', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
            </div>
        </div>
    @endif
              
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
        </div>
    </div></div>

    </div>

{{ Form::close() }}