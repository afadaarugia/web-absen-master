<!-- Ket Field -->
<div class="form-group col-sm-8">
    {!! Form::label('ket', 'Waktu:') !!}
    {!! Form::text('ket', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Jam Awal Field -->
<div class="form-group col-sm-8">
    {!! Form::label('jam_awal', 'Jam Awal:') !!}
{{--    {!! Form::date('jam_awal', null, ['class' => 'form-control','id'=>'jam_awal']) !!}--}}
    <input id="jam_awal" name="jam_awal" class="form-control" type="datetime-local">
</div>

{{--@push('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#jam_awal').datetimepicker({--}}
{{--            format: 'YYYY-MM-DD HH:mm:ss',--}}
{{--            useCurrent: false--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}

<!-- Jam Akhir Field -->
<div class="form-group col-sm-8">
    {!! Form::label('jam_akhir', 'Jam Akhir:') !!}
{{--    {!! Form::date('jam_akhir', null, ['class' => 'form-control','id'=>'jam_akhir']) !!}--}}
    <input id="jam_akhir" name="jam_akhir" class="form-control" type="datetime-local">
</div>

{{--@push('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#jam_akhir').datetimepicker({--}}
{{--            format: 'YYYY-MM-DD HH:mm:ss',--}}
{{--            useCurrent: false--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jamKerjas.index') }}" class="btn btn-default">Cancel</a>
</div>
