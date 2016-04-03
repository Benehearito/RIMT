<div class="row">
    <div class="col-md-7">
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">@lang('validation.attributes.category')</label>

            <div class="col-md-9">
                {!! Form::select(
                             'category_id',
                             ['null'=>'Sin categoria']+$categories,
                            null,
                             array('class' => 'selectpicker form-control', 'id' => 'role')
                ) !!}

                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('title_es') ? ' has-error' : '' }}">
            <label class="col-md-3 control-label">@lang('validation.attributes.title')</label>

            <div class="col-md-9">
                {!! Form::text('title_es', null,['class'=>'form-control','placeholder' =>'Por favor introduzca el título']) !!}

                @if ($errors->has('title_es'))
                    <span class="help-block"><strong>{{ $errors->first('title_es') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">@lang('validation.attributes.active')</label>
            <div class="col-md-9">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('active') }}
                    </label>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">@lang('validation.attributes.price')</label>

            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">€</span>
                    {!! Form::text('price', null,['class'=>'form-control','placeholder' =>'Por favor introduzca el precio']) !!}
                </div>
                @if ($errors->has('price'))
                    <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">@lang('validation.attributes.discount')</label>

            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">%</span>
                    {!! Form::text('discount', null,['class'=>'form-control','placeholder' =>'Por favor introduzca el descuento']) !!}
                </div>
                @if ($errors->has('discount'))
                    <span class="help-block"><strong>{{ $errors->first('discount') }}</strong></span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">@lang('validation.attributes.stock')</label>

            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">N</span>
                    {!! Form::text('stock', null,['class'=>'form-control','placeholder' =>'Por favor introduzca el stock']) !!}
                </div>
                @if ($errors->has('stock'))
                    <span class="help-block"><strong>{{ $errors->first('stock') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">@lang('validation.attributes.dimension')</label>

            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">m³</span>
                    {!! Form::text('dimension', null,['class'=>'form-control','placeholder' =>'Por favor introduzca la dimensión']) !!}
                </div>
                @if ($errors->has('dimension'))
                    <span class="help-block"><strong>{{ $errors->first('dimension') }}</strong></span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group{{ $errors->has('text_es') ? ' has-error' : '' }}">
        <label class="col-md-11 col-md-offset-1  text-left">@lang('validation.attributes.description')</label>
        <div class="col-md-10 col-md-offset-1">
            {!! Form::textarea ('text_es', null,['id'=>'text_es','class'=>'ckeditor']) !!}
        </div>
    </div>
</div>
