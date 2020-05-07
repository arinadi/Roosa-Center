<div class="table-responsive">
    <table class="table" id="deviceData-table">
        <thead>
            <tr>
                <th>Device Id</th>
        <th>Device Data Category Id</th>
        <th>Key</th>
        <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deviceData as $deviceData)
            <tr>
                <td>{{ $deviceData->device_id }}</td>
            <td>{{ $deviceData->device_data_category_id }}</td>
            <td>{{ $deviceData->key }}</td>
            <td>{{ $deviceData->value }}</td>
                <td>
                    {!! Form::open(['route' => ['deviceData.destroy', $deviceData->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('deviceData.show', [$deviceData->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('deviceData.edit', [$deviceData->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
