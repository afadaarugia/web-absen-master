

<div class=" card card-body table-responsive">
    <h4>Detail Absensi {{ $karyawan->karyawans->nama_lengkap }} - {{ $karyawan->karyawans->nik_bistel }}</h4>
    <table class="table table-bordered table-striped" id="absensis-table">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Sektor</th>
                <th>Latitude</th>
                <th>Longitude</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $absensi)
            <tr>
                <td>{{ $absensi->karyawans->nama_lengkap }}</td>
                @if($absensi->time_in != null)
                <td>{{ $absensi->time_in->format('d, M Y H:i') }}</td>
                @else
                <td>{{ $absensi->time_out}}</td>
                @endif
                @if($absensi->time_out != null)
                <td>{{ $absensi->time_out->format('d, M Y H:i')}}</td>
                @else
                <td>{{ $absensi->time_out}}</td>
                @endif
                <td>{{ $absensi->karyawans->sektor->nama}}</td>
                <td>{{ $absensi->latitude}}</td>
                <td>{{ $absensi->longtitude}}</td>


                <td>
                    {!! Form::open(['route' => ['absensis.destroy', $absensi->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('absensis.show', [$absensi->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                        <a href="{{ route('absensis.edit', [$absensi->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>

        <tr>
                <th>Total Absen</th>
                <th>{{$totalAbsen}}</th>
        </tr>

    </table>
</div>


