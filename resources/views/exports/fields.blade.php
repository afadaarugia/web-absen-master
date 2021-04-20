<!-- Time In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_in', 'Time In:') !!}
    {!! Form::date('time_in', null, ['class' => 'form-control','id'=>'time_in']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#time_in').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Time Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_out', 'Time Out:') !!}
    {!! Form::date('time_out', null, ['class' => 'form-control','id'=>'time_out']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#time_out').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::number('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longtitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longtitude', 'Longtitude:') !!}
    {!! Form::number('longtitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Karyawans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('karyawans_id', 'Karyawans Id:') !!}
    {!! Form::number('karyawans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('absensis.index') }}" class="btn btn-default">Cancel</a>
</div>
