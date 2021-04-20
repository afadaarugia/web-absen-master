<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Sub Sektor:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    {!! Form::label('latitude', 'Latitude :') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-12">
    {!! Form::label('longtitude', 'Longitude:') !!}
    {!! Form::text('longtitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Sektors Id Field -->
<div class="col-sm-12">
    {!! Form::label('sektors_id', 'Nama Sektor:') !!}
    {!! Form::select('sektors_id',$Sektor,null,["class"=>"form-control","required"]); !!}
</div><br>

<!-- Submit Field -->
<div class="col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sektors.index') }}" class="btn btn-default">Cancel</a>
</div>
