@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Absensi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($absensi, ['route' => ['absensis.update', $absensi->id], 'method' => 'patch']) !!}

                        @include('absensis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection