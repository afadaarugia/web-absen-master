@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Absensis</h1><br>
        {!! Form::label( 'month','Pilih Bulan :') !!}
        {!! Form::selectMonth('month') !!}
        <a href="{{ route('absensis.rekapan')}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
        
        <h1 class="pull-right">
            <a href="{{ route('absensis.export')}}">Export To Excel</a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('absensis.create') }}">Add New</a>

        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('absensis.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

