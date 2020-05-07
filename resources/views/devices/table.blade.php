<div class="table-responsive">
    <table class="table" id="devices-table">
        <thead>
            <tr>
                <th>Public Key</th>
        <th>Secret Key</th>
        <th>Name</th>
        <th>Is Verified</th>
        <th>Is Blocked</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($devices as $devices)
            <tr>
                <td>{{ $devices->public_key }}</td>
            <td>{{ $devices->secret_key }}</td>
            <td>{{ $devices->name }}</td>
            <td>{{ $devices->is_verified }}</td>
            <td>{{ $devices->is_blocked }}</td>
                <td>
                    {!! Form::open(['route' => ['devices.destroy', $devices->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('devices.show', [$devices->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('devices.edit', [$devices->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
