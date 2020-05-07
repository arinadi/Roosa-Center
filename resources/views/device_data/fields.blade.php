<!-- Device Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_id', 'Device Id:') !!}
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Device Data Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_data_category_id', 'Device Data Category Id:') !!}
    {!! Form::select('device_data_category_id', $device_data_categoryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Key:') !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('deviceData.index') }}" class="btn btn-default">Cancel</a>
</div>
