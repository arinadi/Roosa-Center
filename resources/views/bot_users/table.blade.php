<div class="table-responsive">
    <table class="table" id="botUsers-table">
        <thead>
            <tr>
                <th>Account Type Id</th>
        <th>Account Id</th>
        <th>Phone Number</th>
        <th>Name</th>
        <th>Is Verified</th>
        <th>Is Admin</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($botUsers as $botUsers)
            <tr>
                <td>{{ $botUsers->account_type_id }}</td>
            <td>{{ $botUsers->account_id }}</td>
            <td>{{ $botUsers->phone_number }}</td>
            <td>{{ $botUsers->name }}</td>
            <td>{{ $botUsers->is_verified }}</td>
            <td>{{ $botUsers->is_admin }}</td>
                <td>
                    {!! Form::open(['route' => ['botUsers.destroy', $botUsers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('botUsers.show', [$botUsers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('botUsers.edit', [$botUsers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
