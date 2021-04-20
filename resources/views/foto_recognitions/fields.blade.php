<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control','accept'=>'image/*']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-8">
    {!! Form::label('users_id', 'Akun Karyawan:') !!}
    {!! Form::select('users_id',$User,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fotoRecognitions.index') }}" class="btn btn-default">Cancel</a>
</div>
