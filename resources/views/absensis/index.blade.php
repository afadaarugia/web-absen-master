@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Absensis</h1>
    </section>
      <div class="card-body">
         <label>Pilih Tanggal</label>
        <div class="row">
              <div class="col-md-12">
                <form class = "form-group" action="{{ route('absensis.index') }}" method="get">
                    <div class="row">
                         <div class="col-md-3">
                        {!! Form::date('start', null, ['class' => 'form-control','id'=>'start']) !!}
                        @section('scripts')
                            <script type="text/javascript">
                                $('#start').datetimepicker({
                                    format: 'YYYY-MM-DD',
                                    useCurrent: false
                                })
                            </script>
                        @endsection
                    </div>
                    <div class="col-sm-0" >Sampai</div>
                    <div class="col-md-3" >
                        {!! Form::date('end', null, ['class' => 'form-control','id'=>'end']) !!}
                    @section('scripts')
                    <script type="text/javascript">
                        $('#end').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: false
                                })
                    </script>
                    @endsection
                    </div>
                        <div class="col-sm-2" >
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(Auth::user()->akses == 'admin')
    <div class="card-body">
        <div class="row" >
              <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('absensis.create') }}">Add New</a>
                <a class="btn btn-primary" href="{{ route('absensis.export')}}">To Excel</a>
              </div>
          </div>
    </div>
    @endif


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


