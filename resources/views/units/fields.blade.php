<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama', 'Sub Unit:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Units Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('units_is', 'Nama Unit:') !!}
    {!! Form::select('units_id',$Unit,null,["class"=>"form-control","required"]); !!}
</div><br>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('units.index') }}" class="btn btn-default">Cancel</a>
</div>
