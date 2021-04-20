<!-- Nama Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div><br>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('levels.index') }}" class="btn btn-default">Cancel</a>
</div>
