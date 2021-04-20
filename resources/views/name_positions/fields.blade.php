<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Levels Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('levels_id', 'Nama Level:') !!}
    {!! Form::select('levels_id',$Level,null,["class"=>"form-control","required"]); !!}
</div><br>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('namePositions.index') }}" class="btn btn-default">Cancel</a>
</div>
