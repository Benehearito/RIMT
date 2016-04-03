<h4>Datos de envio</h4>
<div class="form-group{{ $errors->has('name_take') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.name')</label>
    <div class="col-md-9">
        {!! Form::text('name_take', null,['class'=>'form-control','placeholder' =>'Nombre del receptor']) !!}
        @if ($errors->has('name_take'))
            <span class="help-block"><strong>{{ $errors->first('name_take') }}</strong></span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('email_take') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.email')</label>
    <div class="col-md-9">
        {!! Form::text('email_take', null,['class'=>'form-control','placeholder' =>'Email del receptor']) !!}
        @if ($errors->has('email_take'))
            <span class="help-block"><strong>{{ $errors->first('email_take') }}</strong></span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('telephone_take') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.telephone')</label>
    <div class="col-md-9">
        {!! Form::text('telephone_take', null,['class'=>'form-control','placeholder' =>'Teléfono del receptor']) !!}
        @if ($errors->has('telephone_take'))
            <span class="help-block"><strong>{{ $errors->first('telephone_take') }}</strong></span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.address')</label>
    <div class="col-md-9">
        {!! Form::text('address', null,['class'=>'form-control','placeholder' =>'Dirección del receptor']) !!}
        @if ($errors->has('address'))
            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
    <label class="col-md-3 control-label">@lang('validation.attributes.postcode')</label>
    <div class="col-md-9">
        {!! Form::text('postcode', null,['class'=>'form-control','placeholder' =>'Codigo postal del receptor']) !!}
        @if ($errors->has('postcode'))
            <span class="help-block"><strong>{{ $errors->first('postcode') }}</strong></span>
        @endif
    </div>
</div>


