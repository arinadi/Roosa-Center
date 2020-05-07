<!-- Public Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('public_key', 'Public Key:') !!}
    {!! Form::text('public_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Secret Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secret_key', 'Secret Key:') !!}
    {!! Form::text('secret_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Verified Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_verified', 'Is Verified:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_verified', 0) !!}
        {!! Form::checkbox('is_verified', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Blocked Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_blocked', 'Is Blocked:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_blocked', 0) !!}
        {!! Form::checkbox('is_blocked', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('devices.index') }}" class="btn btn-default">Cancel</a>
</div>
