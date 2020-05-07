<div class="table-responsive">
    <table class="table" id="deviceCommands-table">
        <thead>
            <tr>
                <th>Device Id</th>
        <th>Command</th>
        <th>Is Received</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deviceCommands as $deviceCommand)
            <tr>
                <td>{{ $deviceCommand->device_id }}</td>
            <td>{{ $deviceCommand->command }}</td>
            <td>{{ $deviceCommand->is_received }}</td>
                <td>
                    {!! Form::open(['route' => ['deviceCommands.destroy', $deviceCommand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('deviceCommands.show', [$deviceCommand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('deviceCommands.edit', [$deviceCommand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
