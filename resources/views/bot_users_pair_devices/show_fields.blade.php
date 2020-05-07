<!-- Public Key Field -->
<div class="form-group">
    {!! Form::label('public_key', 'Public Key:') !!}
    <p>{{ $botUsersPairDevices->public_key }}</p>
</div>

<!-- Bot User Id Field -->
<div class="form-group">
    {!! Form::label('bot_user_id', 'Bot User Id:') !!}
    <p>{{ $botUsersPairDevices->bot_user_id }}</p>
</div>

<!-- Is Verified Field -->
<div class="form-group">
    {!! Form::label('is_verified', 'Is Verified:') !!}
    <p>{{ $botUsersPairDevices->is_verified }}</p>
</div>

<!-- Is Blocked Field -->
<div class="form-group">
    {!! Form::label('is_blocked', 'Is Blocked:') !!}
    <p>{{ $botUsersPairDevices->is_blocked }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $botUsersPairDevices->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $botUsersPairDevices->updated_at }}</p>
</div>

