<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label">@lang('validation.attributes.category')</label>

    <div class="col-md-6">
        {!! Form::select(
                     'category_id',
                     ['NULL'=>'Sin Categoria']+$categories,
                     null,
                     array('class' => 'selectpicker form-control', 'id' => 'category')
        ) !!}

        @if ($errors->has('category'))
            <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('title_es') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label">@lang('validation.attributes.title')</label>

    <div class="col-md-6">
        {!! Form::text('title_es', null,['class'=>'form-control','placeholder' =>'Por favor introduzca un título']) !!}

        @if ($errors->has('title_es'))
            <span class="help-block">
                <strong>{{ $errors->first('title_es') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">@lang('validation.attributes.active')</label>
    <div class="col-md-6">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('active') }}
            </label>
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

