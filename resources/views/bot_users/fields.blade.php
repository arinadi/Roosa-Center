<!-- Account Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_type_id', 'Account Type Id:') !!}
    {!! Form::select('account_type_id', $account_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Account Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_id', 'Account Id:') !!}
    {!! Form::text('account_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
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


<!-- 'bootstrap / Toggle Switch Is Admin Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin', 0) !!}
        {!! Form::checkbox('is_admin', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('botUsers.index') }}" class="btn btn-default">Cancel</a>
</div>
