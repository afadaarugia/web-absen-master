<div class="table-responsive">
    <table class="table" id="absensis-table">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Latitude</th>
                <th>Longtitude</th>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($absensis as $absensi)
            <tr>
                <td>{{ $absensi->karyawans->nama_lengkap }}</td>
                <td>{{ $absensi->time_in }}</td>
                <td>{{ $absensi->time_out }}</td>
                <td>{{ $absensi->latitude }}</td>
                <td>{{ $absensi->longtitude }}</td>
                
                <td>
                    {!! Form::open(['route' => ['absensis.destroy', $absensi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('absensis.show', [$absensi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('absensis.edit', [$absensi->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
