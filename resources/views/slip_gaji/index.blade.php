@extends('layouts.app')

@section('content')
<style type="text/css">
     .line{
        border-bottom: 2px solid black;
     }
     th{
        text-align: left;
     }
     .pencarian{
        min-width: 200px;
        min-height : 20px;
        padding-bottom: 1px;
        padding-top: 20px;
     }
 </style>
<div class="box box-primary"></div>
    <section class="content-header">
        <h1 class="pull-left">Penggajians</h1>
    </section>

    <div class="pencarian">
        <br>
                <form class = "form-group" action="{{ route('slipgaji.show') }}" method="get">
                    <div class="form-group col-sm-8">
                        <div class="form-group col-sm-3">
                        {!! Form::selectMonth('bulan', null, ['class' => 'form-control' , 'placeholder' => 'Pilih Bulan']); !!}
                        </div>
                        <div class="form-group col-sm-3">
                            {!! Form::selectRange('year', 2020, 2030 , null,['class' => 'form-control','placeholder' => 'Pilih Tahun']); !!}
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                </div>
                </form>
    </div>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('slip_gaji.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection