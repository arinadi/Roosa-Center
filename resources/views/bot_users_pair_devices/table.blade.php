<div class="table-responsive">
    <table class="table" id="botUsersPairDevices-table">
        <thead>
            <tr>
                <th>Public Key</th>
        <th>Bot User Id</th>
        <th>Is Verified</th>
        <th>Is Blocked</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($botUsersPairDevices as $botUsersPairDevices)
            <tr>
                <td>{{ $botUsersPairDevices->public_key }}</td>
            <td>{{ $botUsersPairDevices->bot_user_id }}</td>
            <td>{{ $botUsersPairDevices->is_verified }}</td>
            <td>{{ $botUsersPairDevices->is_blocked }}</td>
                <td>
                    {!! Form::open(['route' => ['botUsersPairDevices.destroy', $botUsersPairDevices->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('botUsersPairDevices.show', [$botUsersPairDevices->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('botUsersPairDevices.edit', [$botUsersPairDevices->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
