<!-- Public Key Field -->
<div class="form-group">
    {!! Form::label('public_key', 'Public Key:') !!}
    <p>{{ $devices->public_key }}</p>
</div>

<!-- Secret Key Field -->
<div class="form-group">
    {!! Form::label('secret_key', 'Secret Key:') !!}
    <p>{{ $devices->secret_key }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $devices->name }}</p>
</div>

<!-- Is Verified Field -->
<div class="form-group">
    {!! Form::label('is_verified', 'Is Verified:') !!}
    <p>{{ $devices->is_verified }}</p>
</div>

<!-- Is Blocked Field -->
<div class="form-group">
    {!! Form::label('is_blocked', 'Is Blocked:') !!}
    <p>{{ $devices->is_blocked }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $devices->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $devices->updated_at }}</p>
</div>

