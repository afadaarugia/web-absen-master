@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Foto Recognition
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fotoRecognition, ['route' => ['fotoRecognitions.update', $fotoRecognition->id], 'method' => 'patch','files' => true]) !!}

                        @include('foto_recognitions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
