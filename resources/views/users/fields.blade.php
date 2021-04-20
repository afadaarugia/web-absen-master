<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Nama Akun:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="col-sm-6">
    {!! Form::label('email', 'Alamat Email Aktif:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="col-sm-6">
    <label for="aktif">Aktif:</label>
    <select class="form-control" name="aktif" id="aktif">
        <option value="YA">YA</option>
        <option value="TIDAK">TIDAK</option>
    </select>
</div>

{{--<div class="col-sm-6">--}}
{{--    {!! Form::label('nik', 'NIK :') !!}--}}
{{--    {!! Form::number('nik', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Password Field -->
<div class="col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="col-sm-12 mt-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
