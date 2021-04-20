@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Karyawan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="card-body">
                <div class="row">
                    {!! Form::open(['route' => 'karyawans.store', 'files' => true, 'class'=>'form-group']) !!}
                    <div class="row">
                         @include('karyawans.fields')                        
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
