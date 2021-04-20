@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jam Kerja
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="card card-body">
                   {!! Form::model($jamKerja, ['route' => ['jamKerjas.update', $jamKerja->id], 'method' => 'patch']) !!}

                        @include('jam_kerjas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
