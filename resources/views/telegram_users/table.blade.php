<div class="table-responsive">
    <table class="table" id="telegramUsers-table">
        <thead>
            <tr>
                <th>Telegram Id</th>
        <th>Phone Number</th>
        <th>Name</th>
        <th>Is Verified</th>
        <th>Is Admin</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($telegramUsers as $telegramUsers)
            <tr>
                <td>{{ $telegramUsers->telegram_id }}</td>
            <td>{{ $telegramUsers->phone_number }}</td>
            <td>{{ $telegramUsers->name }}</td>
            <td>{{ $telegramUsers->is_verified }}</td>
            <td>{{ $telegramUsers->is_admin }}</td>
                <td>
                    {!! Form::open(['route' => ['telegramUsers.destroy', $telegramUsers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('telegramUsers.show', [$telegramUsers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('telegramUsers.edit', [$telegramUsers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
