@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>@lang('validation.errors.whoops')</strong> @lang('validation.errors.text_answer')<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif