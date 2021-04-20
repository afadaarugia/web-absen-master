<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Cost Center</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Unit</th>
                        <th>Sektor </th>
                        <th>Agamas</th>
                        <th>Statuse Karyawan</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($karyawans as $karyawan)
                        <tr>
                            <td><img src="{{ asset($karyawan->foto) }}" height="70px" width="70px"></td>
                            <td>{{ $karyawan->cost_center }}</td>
                            <td>{{ $karyawan->nik }}</td>
                            <td>{{ $karyawan->nama_lengkap }}</td>
                            <td>{{ $karyawan->jen_kel }}</td>
                            <td>{{ $karyawan->namePosisions->nama }}</td>
                            <td>{{ $karyawan->units->nama }}</td>
                            <td>{{ $karyawan->sektor->nama }}</td>
                            <td>{{ $karyawan->agamas->nama }}</td>
                            <td>{{ $karyawan->statuses->nama }}</td>
                            <td>
                                {!! Form::open(['route' => ['karyawans.destroy', $karyawan->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('karyawans.show', [$karyawan->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('karyawans.edit', [$karyawan->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
                                    {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $karyawans->links() }}
</div>
</div>
