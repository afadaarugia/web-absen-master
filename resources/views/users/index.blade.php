@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
        <h1 class="pull-right">

        </h1>
    </section>
    <div class="card-body">
        <div class="row" >
              <div class="col-md-9">
{{--                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('register') }}">Add New</a>--}}
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('users.create') }}">Add New</a>
              </div>
        </div>
    </div>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

