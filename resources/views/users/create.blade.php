@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="card-header">
            <h2>
                <b>Tambah Akun User Baru</b>
            </h2>
        </div>
        @include('adminlte-templates::common.errors')

        <div class="card-body">
            {!! Form::open(['route' => 'users.store']) !!}

                @include('users.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
