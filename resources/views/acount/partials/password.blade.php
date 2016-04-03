<h4>Cambiar Password</h4>
{!! Form::model($user,['route' =>'acount.changepassword','class'=>'form-horizontal', 'role'=>'form' , 'method' => 'PUT']) !!}
    <div class="form-group{{ $errors->has('password_active') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">@lang('validation.attributes.password_active')</label>
        <div class="col-md-8">
            {!! Form::password('password_active',['class'=>'form-control']) !!}

            @if ($errors->has('password_active'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_active') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">@lang('validation.attributes.password_new')</label>
        <div class="col-md-8">
            {!! Form::password('password',['class'=>'form-control']) !!}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">@lang('validation.attributes.confirm_password')</label>
        <div class="col-md-8">
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <p class="text-right"><button type="submit" class="btn btn-default">Actualizar password</button></p>

{!! Form::close() !!}
