<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No.</th>
            <th>Aktif</th>
            <th width="300px">Username</th>
            <th>NIK</th>
            <th>Email</th>
            <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($users as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td><span class="badge badge-success">{{ $user->aktif }}</span></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->karyawan->nik }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ url('karyawans/'.$user->karyawan['id'].'/edit') }}" class='btn btn-sm btn-info'><i class="fas fa-edit"></i></a>
                    <a href="{{ url('karyawans/'.$user->karyawan['id']) }}" class='btn btn-sm btn-info'><i class="fas fa-eye"></i></a>
                </td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
{{--                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>--}}
                    <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-edit"></i></a>
{{--                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
    </div>
</div>
