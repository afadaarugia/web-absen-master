<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Jam Absen</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Jadwal</th>
        <th>Jam Awal</th>
        <th>Jam Akhir</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jamKerjas as $jamKerja)
            <tr>
                <td>{{ $jamKerja->ket }}</td>
            <td>{{ \Carbon\Carbon::parse($jamKerja->jam_awal)->format('H:i') }} </td>
            <td>{{ \Carbon\Carbon::parse($jamKerja->jam_akhir)->format('H:i') }} </td>
                <td>
                    {!! Form::open(['route' => ['jamKerjas.destroy', $jamKerja->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jamKerjas.show', [$jamKerja->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                        <a href="{{ route('jamKerjas.edit', [$jamKerja->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
{{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
