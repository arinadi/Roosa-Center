<!-- Device Id Field -->
<div class="form-group">
    {!! Form::label('device_id', 'Device Id:') !!}
    <p>{{ $deviceData->device_id }}</p>
</div>

<!-- Device Data Category Id Field -->
<div class="form-group">
    {!! Form::label('device_data_category_id', 'Device Data Category Id:') !!}
    <p>{{ $deviceData->device_data_category_id }}</p>
</div>

<!-- Key Field -->
<div class="form-group">
    {!! Form::label('key', 'Key:') !!}
    <p>{{ $deviceData->key }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $deviceData->value }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $deviceData->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $deviceData->updated_at }}</p>
</div>

