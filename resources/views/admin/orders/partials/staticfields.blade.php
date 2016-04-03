<h4>Datos del comprador</h4>
<div class="form-group">
    <label class="col-md-3 control-label">@lang('validation.attributes.name')</label>
    <div class="col-md-9">
        {!! Form::text('name', null,['class'=>'form-control','placeholder' =>'Nombre del comprador']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">@lang('validation.attributes.email')</label>
    <div class="col-md-9">
        {!! Form::text('email', null,['class'=>'form-control','placeholder' =>'Email del comprador']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">@lang('validation.attributes.telephone')</label>
    <div class="col-md-9">
        {!! Form::text('telephone', null,['class'=>'form-control','placeholder' =>'Teléfono del comprador']) !!}
    </div>
</div>


