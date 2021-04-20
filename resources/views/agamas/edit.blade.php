@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agama
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="card-body">
               <div class="row">
                   {!! Form::model($agama, ['route' => ['agamas.update', $agama->id], 'method' => 'patch' ,'class' => 'form-group']) !!}

                        @include('agamas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection