@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="card-header">
            <h2>
                <b>Edit Akun User Baru</b>
            </h2>
        </div>
        @include('adminlte-templates::common.errors')

        <div class="card-body">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            @include('users.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
