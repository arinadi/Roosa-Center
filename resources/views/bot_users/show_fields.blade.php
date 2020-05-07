<!-- Account Type Id Field -->
<div class="form-group">
    {!! Form::label('account_type_id', 'Account Type Id:') !!}
    <p>{{ $botUsers->account_type_id }}</p>
</div>

<!-- Account Id Field -->
<div class="form-group">
    {!! Form::label('account_id', 'Account Id:') !!}
    <p>{{ $botUsers->account_id }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $botUsers->phone_number }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $botUsers->name }}</p>
</div>

<!-- Is Verified Field -->
<div class="form-group">
    {!! Form::label('is_verified', 'Is Verified:') !!}
    <p>{{ $botUsers->is_verified }}</p>
</div>

<!-- Is Admin Field -->
<div class="form-group">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <p>{{ $botUsers->is_admin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $botUsers->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $botUsers->updated_at }}</p>
</div>

