<!-- Device Id Field -->
<div class="form-group">
    {!! Form::label('device_id', 'Device Id:') !!}
    <p>{{ $deviceCommand->device_id }}</p>
</div>

<!-- Command Field -->
<div class="form-group">
    {!! Form::label('command', 'Command:') !!}
    <p>{{ $deviceCommand->command }}</p>
</div>

<!-- Is Received Field -->
<div class="form-group">
    {!! Form::label('is_received', 'Is Received:') !!}
    <p>{{ $deviceCommand->is_received }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $deviceCommand->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $deviceCommand->updated_at }}</p>
</div>

