<!-- Device Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_id', 'Device Id:') !!}
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Command Field -->
<div class="form-group col-sm-6">
    {!! Form::label('command', 'Command:') !!}
    {!! Form::text('command', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Received Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_received', 'Is Received:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_received', 0) !!}
        {!! Form::checkbox('is_received', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('deviceCommands.index') }}" class="btn btn-default">Cancel</a>
</div>
