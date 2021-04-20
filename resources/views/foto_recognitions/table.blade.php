<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Foto Recognation</th>
                <th>Nama Karywan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fotoRecognitions as $fotoRecognition)
            <tr>
                <td><img src="{{ asset($fotoRecognition->foto) }}" style="width: 150px;height: 150px"> </td>
                <td>{{ $fotoRecognition->users->karyawan->nama_lengkap }}</td>
                <td>
                    {!! Form::open(['route' => ['fotoRecognitions.destroy', $fotoRecognition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fotoRecognitions.show', [$fotoRecognition->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                        <a href="{{ route('fotoRecognitions.edit', [$fotoRecognition->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
{{--                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
