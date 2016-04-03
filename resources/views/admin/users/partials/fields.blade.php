<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.role')</label>

    <div class="col-md-8">
        {!! Form::select(
                     'role',
                     [''=>'Rol de usuario']+$roles,
                     $find_role,
                     array('class' => 'selectpicker form-control', 'id' => 'role')
        ) !!}

        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.name')</label>

    <div class="col-md-8">
        {!! Form::text('name', null,['class'=>'form-control','placeholder' =>'Por favor introduzca su nombre']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.lastname')</label>

    <div class="col-md-8">
        {!! Form::text('lastname', null,['class'=>'form-control','placeholder' =>'Por favor introduzca sus apellidos']) !!}

        @if ($errors->has('lastname'))
            <span class="help-block">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.dni')</label>

    <div class="col-md-8">
        {!! Form::text('dni', null,['class'=>'form-control','placeholder' =>'Por favor introduzca su DNI']) !!}

        @if ($errors->has('dni'))
            <span class="help-block">
                <strong>{{ $errors->first('dni') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.telephone')</label>

    <div class="col-md-8">
        {!! Form::text('telephone', null,['class'=>'form-control','placeholder' =>'Por favor introduzca su teléfono']) !!}

        @if ($errors->has('telephone'))
            <span class="help-block">
                <strong>{{ $errors->first('telephone') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.email')</label>

    <div class="col-md-8">
        {!! Form::text('email', null,['class'=>'form-control','placeholder' =>'Por favor introduzca su e-mail']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

