<!-- Cost Center Field -->
<div class=" col-sm-6">
    {!! Form::label('cost_center', 'Cost Center:') !!}
    {!! Form::text('cost_center', null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Ta Field -->
<div class=" col-sm-6">
    {!! Form::label('nik_ta', 'Nik Ta:') !!}
    {!! Form::number('nik_ta', null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Bistel Field -->
<div class=" col-sm-6">
    {!! Form::label('nik_bistel', 'Nik Bistel:') !!}
    {!! Form::number('nik_bistel', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lengkap Field -->
<div class=" col-sm-6">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class=" col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Jen Kel Field -->
<div class=" col-sm-6">
    {!! Form::label('jen_kel', 'Jen Kel:') !!}
    {!! Form::select('jen_kel',['Laki-laki'=>'L', 'Perempuan' =>'P'],null,["class"=>"form-control","required"]); !!}
</div>

<!-- Alamat Field -->
<div class=" col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Kota Lahir Field -->
<div class=" col-sm-6">
    {!! Form::label('kota_lahir', 'Kota Lahir:') !!}
    {!! Form::text('kota_lahir', null, ['class' => 'form-control']) !!}
</div>

<div class=" col-sm-6">
    {!! Form::label('suku', 'Suku:') !!}
    {!! Form::text('suku', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Lahir Field -->
<div class=" col-sm-6">
    {!! Form::label('tgl_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'id'=>'tgl_lahir']); !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl_lahir').datetimepicker({
        })
    </script>
@endsection

<div class=" col-sm-6 ">
    {!! Form::label('no_telp', 'No. HP:') !!}
    {!! Form::text('no_telp', null, ['class' => 'form-control']) !!}
</div>

<div class=" col-sm-6">
    {!! Form::label('no_telp_kel', 'No. HP Keluarga:') !!}
    {!! Form::text('no_telp_kel', null, ['class' => 'form-control']) !!}
</div>

<div class=" col-sm-6">
    {!! Form::label('nama_keluarga', 'Nama Keluarga:') !!}
    {!! Form::text('nama_keluarga', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class=" col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control' ,'enctype' => 'multipart/from-data']) !!}
</div>

<!-- Status Pernikahan Field -->
<div class=" col-sm-6">
    {!! Form::label('status_pernikahan', 'Status Pernikahan:') !!}
    {!! Form::text('status_pernikahan', null, ['class' => 'form-control']) !!}
</div>

<!-- No Ktp Field -->
<div class=" col-sm-6">
    {!! Form::label('no_ktp', 'No Ktp:') !!}
    {!! Form::text('no_ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Kartu Keluarga Field -->
<div class=" col-sm-6">
    {!! Form::label('nomor_kartu_keluarga', 'Nomor Kartu Keluarga:') !!}
    {!! Form::text('nomor_kartu_keluarga', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Npwp Field -->
<div class=" col-sm-6">
    {!! Form::label('nomor_npwp', 'Nomor Npwp:') !!}
    {!! Form::text('nomor_npwp', null, ['class' => 'form-control']) !!}
</div>

<!-- No Bpjs Kesehatan Field -->
<div class=" col-sm-6">
    {!! Form::label('no_bpjs_kesehatan', 'No Bpjs Kesehatan:') !!}
    {!! Form::text('no_bpjs_kesehatan', null, ['class' => 'form-control']) !!}
</div>

<!-- No Bpjs Ketenagakerjaan Field -->
<div class=" col-sm-6">
    {!! Form::label('no_bpjs_ketenagakerjaan', 'No Bpjs Ketenagakerjaan:') !!}
    {!! Form::text('no_bpjs_ketenagakerjaan', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rek Field -->
<div class=" col-sm-6">
    {!! Form::label('no_rek', 'No Rek:') !!}
    {!! Form::text('no_rek', null, ['class' => 'form-control']) !!}
</div>

<!-- Jurusan Field -->
<div class=" col-sm-6">
    {!! Form::label('jurusan', 'Jurusan:') !!}
    {!! Form::text('jurusan', null, ['class' => 'form-control']) !!}
</div>

<div class=" col-sm-6">
    {!! Form::label('atas_nama', 'Atas Nama di Bank:') !!}
    {!! Form::text('atas_nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lembaga Field -->
<div class=" col-sm-6">
    {!! Form::label('nama_lembaga', 'Nama Lembaga:') !!}
    {!! Form::text('nama_lembaga', null, ['class' => 'form-control']) !!}
</div>

<!-- Ukuran Seragam Field -->
<div class=" col-sm-6">
    {!! Form::label('ukuran_seragam', 'Ukuran Seragam:') !!}
    {!! Form::text('ukuran_seragam', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Ayah Field -->
<div class=" col-sm-6">
    {!! Form::label('nama_ayah', 'Nama Ayah:') !!}
    {!! Form::text('nama_ayah', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Ibu Kandung Field -->
<div class=" col-sm-6">
    {!! Form::label('nama_ibu_kandung', 'Nama Ibu Kandung:') !!}
    {!! Form::text('nama_ibu_kandung', null, ['class' => 'form-control']) !!}
</div>

<!-- Kontrak Ke Field -->
<div class=" col-sm-6">
    {!! Form::label('kontrak_ke', 'Kontrak Ke:') !!}
    {!! Form::number('kontrak_ke', null, ['class' => 'form-control']) !!}
</div>

<!-- Awal Kontrak Field -->
<div class=" col-sm-6">
    {!! Form::label('awal_kontrak', 'Awal Kontrak:') !!}
    {!! Form::date('awal_kontrak', null, ['class' => 'form-control','id'=>'awal_kontrak']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#awal_kontrak').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Akhir Kontrak Field -->
<div class=" col-sm-6">
    {!! Form::label('akhir_kontrak', 'Akhir Kontrak:') !!}
    {!! Form::date('akhir_kontrak', null, ['class' => 'form-control','id'=>'akhir_kontrak']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#akhir_kontrak').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection


<div class=" col-sm-6">
    {!! Form::label('tgl_mulai_kerja', 'Tanggal Mulai Kerja:') !!}
    {!! Form::date('tgl_mulai_kerja', null, ['class' => 'form-control','id'=>'akhir_kontrak']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#akhir_kontrak').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<div class=" col-sm-6">
    {!! Form::label('keterangan_aktif', 'Keterangan Aktif:') !!}
    {!! Form::select('keterangan_aktif',['Aktif'=>'Aktif', 'Tidak Aktif' =>'Tidak Aktif'],null,["class"=>"form-control","required"]); !!}
</div>

<!-- Jumlah Anak Field -->
<div class=" col-sm-6">
    {!! Form::label('jumlah_anak', 'Jumlah Anak:') !!}
    {!! Form::text('jumlah_anak', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Posisions Id Field -->
<div class=" col-sm-6">
    {!! Form::label('name_posisions_id', 'Jabatan/Name Position:') !!}
    {!! Form::select('name_posisions_id',$NamePosition ,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Units Id Field -->
<div class=" col-sm-6">
    {!! Form::label('units_id', 'Sub Unit:') !!}
    {!! Form::select('units_id',$Unit,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Sektors Id Field -->
<div class=" col-sm-6">
    {!! Form::label('sektors_id', 'Sub Sektor:') !!}
    {!! Form::select('sektors_id',$Sektor,null ,["class"=>"form-control","required"]); !!}
</div>

<!-- Pendidikans Id Field -->
<div class=" col-sm-6">
    {!! Form::label('pendidikans_id', 'Pendidikans Terakhir:') !!}
    {!! Form::select('pendidikans_id',$Pendidikan,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Agamas Id Field -->
<div class=" col-sm-6">
    {!! Form::label('agamas_id', 'Agamas:') !!}
    {!! Form::select('agamas_id',$Agama,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Statuses Id Field -->
<div class=" col-sm-6">
    {!! Form::label('statuses_id', 'Status Karyawan:') !!}
    {!! Form::select('statuses_id',$Status,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Banks Id Field -->
<div class=" col-sm-6">
    {!! Form::label('banks_id', 'Nama Banks:') !!}
    {!! Form::select('banks_id',$Bank,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Gol Darahs Id Field -->
<div class=" col-sm-6">
    {!! Form::label('gol_darahs_id', 'Golongan Darah:') !!}
    {!! Form::select('gol_darahs_id',$GolDarah,null,["class"=>"form-control","required"]); !!}
</div>

<div class=" col-sm-6" style="padding-top: 10px;">
    {!! Form::label('foto_ktp', 'Foto KTP:') !!}
    {!! Form::file('foto_ktp', null, ['class' => 'form-control' ,'enctype' => 'multipart/from-data']) !!}
</div>

<div class=" col-sm-6" style="padding-top: 10px;">
    {!! Form::label('foto_kk', 'Foto Kartu Keluarga:') !!}
    {!! Form::file('foto_kk', null, ['class' => 'form-control' ,'enctype' => 'multipart/from-data']) !!}
</div>

<!-- Users Id Field -->
<div class=" col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::select('users_id',$User,null,["class"=>"form-control","required"]); !!}
</div>

<!-- Submit Field -->
<div class=" col-sm-12" style="padding-top: 15px;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('karyawans.index') }}" class="btn btn-default">Cancel</a>
</div>
