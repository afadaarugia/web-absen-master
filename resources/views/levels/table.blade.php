<div class="table-responsive">
    <table class="table" id="levels-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($levels as $level)
            <tr>
                <td>{{ $level->nama }}</td>
                <td>
                    {!! Form::open(['route' => ['levels.destroy', $level->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('levels.show', [$level->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                        <a href="{{ route('levels.edit', [$level->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
