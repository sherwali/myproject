<div class="table-responsive">
    <table class="table" id="monthlyFees-table">
        <thead>
            <tr>
                <th>Grade</th>
        <th>Amount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($monthlyFees as $monthlyFee)
            <tr>
                <td>{{ $monthlyFee->batch->grade->name }}</td>
                <td>{{ $monthlyFee->amount }}</td>
                <td>
                    {!! Form::open(['route' => ['monthlyFees.destroy', $monthlyFee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('monthlyFees.show', [$monthlyFee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('monthlyFees.edit', [$monthlyFee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
