<div class="table-responsive">
    <table class="table" id="accountTypes-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accountTypes as $accountTypes)
            <tr>
                <td>{{ $accountTypes->name }}</td>
                <td>
                    {!! Form::open(['route' => ['accountTypes.destroy', $accountTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accountTypes.show', [$accountTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('accountTypes.edit', [$accountTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
