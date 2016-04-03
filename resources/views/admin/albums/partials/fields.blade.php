<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label">@lang('validation.attributes.album')</label>

    <div class="col-md-6">
        {!! Form::select(
                     'album_id',
                     ['NULL'=>'Sin album']+$albums,
                     null,
                     array('class' => 'selectpicker form-control', 'id' => 'album_id')
        ) !!}

        @if ($errors->has('album_id'))
            <span class="help-block">
                <strong>{{ $errors->first('album_id') }}</strong>
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


