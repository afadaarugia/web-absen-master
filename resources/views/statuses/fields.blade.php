<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div><br>

<!-- Submit Field -->
<div class="col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('statuses.index') }}" class="btn btn-default">Cancel</a>
</div>
