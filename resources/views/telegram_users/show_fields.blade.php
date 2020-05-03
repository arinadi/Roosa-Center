<!-- Telegram Id Field -->
<div class="form-group">
    {!! Form::label('telegram_id', 'Telegram Id:') !!}
    <p>{{ $telegramUsers->telegram_id }}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $telegramUsers->phone_number }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $telegramUsers->name }}</p>
</div>

<!-- Is Verified Field -->
<div class="form-group">
    {!! Form::label('is_verified', 'Is Verified:') !!}
    <p>{{ $telegramUsers->is_verified }}</p>
</div>

<!-- Is Admin Field -->
<div class="form-group">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <p>{{ $telegramUsers->is_admin }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $telegramUsers->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $telegramUsers->updated_at }}</p>
</div>

