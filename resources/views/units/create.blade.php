@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Unit
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="card-body">
                <div class="row">
                    {!! Form::open(['route' => 'units.store']) !!}

                        @include('units.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
