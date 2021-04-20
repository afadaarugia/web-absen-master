@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Absensis</h1>
        <form action="{{ route('absensis.rekap') }}" method="get">
            <div class="input-group mb-3 col-md-4 float-right">
                {!! Form::date('start', null, ['class' => 'form-control','id'=>'start']) !!}
                @section('scripts')
                    <script type="text/javascript">
                        $('#start').datetimepicker({
                            format: 'YYYY-MM-DD',
                            useCurrent: false
                        })
                    </script>
                @endsection
                To
                {!! Form::date('end', null, ['class' => 'form-control','id'=>'end']) !!}
                @section('scripts')
                    <script type="text/javascript">
                        $('#end').datetimepicker({
                            format: 'YYYY-MM-DD',
                            useCurrent: false
                        })
                    </script>
                @endsection
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </div>            
            </div>
        </form>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('rekap_absen.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

@endsection


