<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="absensis-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NIK Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Time In Terakhir</th>
                <th>Time Out Terakhir</th>
{{--                <th>Keterangan Absen</th>--}}
                <th>Total Absen</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($absenIn as $absensi)
            <tr><td>{{ $absensi->nik_karyawan }}</td>
                <td>{{ $absensi->nama_karyawan }}</td>
                   @if ($absensi->time_in !=null && \Carbon\Carbon::parse($absensi->time_in)->format('Y-m-d') === date('Y-m-d',strtotime($absensi->time_in)))
                    <td>{{ \Jenssegers\Date\Date::parse($absensi->time_in)->format('l, j-M-Y || H:i a') }}</td>
                    @elseif ($absensi->time_in != null && \Carbon\Carbon::parse($absensi->time_in)->format('Y-m-d') < date('Y-m-d',strtotime($absensi->time_in)))
                    <td>{{\Jenssegers\Date\Date::parse($absensi->time_in)->format('l, j-M-Y | H:i a') }}</td>
                    @else
                    <td>Belum Absen</td>
                    @endif
                    @if ($absensi->time_out !=null && \Carbon\Carbon::parse($absensi->time_out)->format('Y-m-d') === date('Y-m-d',strtotime($absensi->time_out)))
                    <td>{{ \Jenssegers\Date\Date::parse($absensi->time_out)->format('l, j-M-Y || H:i a') }}</td>
                    @elseif ($absensi->time_out != null && \Carbon\Carbon::parse($absensi->time_out)->format('Y-m-d') < date('Y-m-d',strtotime($absensi->time_out)))
                    <td>{{ \Jenssegers\Date\Date::parse($absensi->time_out)->format('l, j-M-Y || H:i a') }}</td>
                    @else
                    <td>Belum Absen</td>
                    @endif
{{--                <td>{{ $absensi->keterangan }}</td>--}}
                <td>{{ $absensi->total}}</td>

                <td>
                    {!! Form::open(['route' => ['absensis.destroy', $absensi->karyawans_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('absensis.show', [$absensi->karyawans_id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
