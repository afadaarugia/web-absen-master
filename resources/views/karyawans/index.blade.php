@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Karyawan</h1><br>
            <a>
            <div class="col-lg-2 col-7" style="margin-left: auto;">
              <form class="form-inline ml-3"  action="{{ route('karyawans.index') }}" method="get">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Masukkan Nik Bistel" aria-label="Search" name="nik">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </div>
          </a>
           <a class="btn btn-primary pull-right" href="{{ route('karyawans.create') }}">Add New</a>
           <a class="btn btn-primary pull-right" href="{{ route('karyawans.export') }}">Export Excel</a>
           <a class="btn btn-primary pull-right" href="{{ route('karyawans.export_image') }}">Download Image</a>
    </section>


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('karyawans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

@endsection

