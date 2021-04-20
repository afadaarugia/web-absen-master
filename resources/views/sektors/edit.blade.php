@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sektor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="card-body">
               <div class="row">
                   {!! Form::model($sektor, ['route' => ['sektors.update', $sektor->id], 'method' => 'patch']) !!}

                        @include('sektors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection