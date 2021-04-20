<style type="text/css">
    .cap{
        text-transform: uppercase;
    }
</style>
<div class="table-responsive">
    <table class="table" id="karyawans-table" border="2">
        <thead class="cap" bgcolor ="gray">
            <tr>
            <th>Cost Center</th>
            <th>Jabatan</th>
            <th>Nik Bistel</th>
            <th>Nik TA</th>
            <th>Nama Lengkap</th>
            <th>Sektor </th>
            <th>Sub Sektor</th>
            <th>Level</th>
            <th>Unit</th>
            <th>Sub Unit</th>
            <th>Tanggal Masuk Kerja</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Kota Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Status Pernikahan</th>
            <th>Jumlah Anak</th>
            <th>Nomor Ktp</th>
            <th>Nomor Kartu Keluarga</th>
            <th>Nomor NPWP</th>
            <th>BPJS Kesehatan</th>
            <th>BPJS ketenagakerjaan</th>
            <th>Pendidikan Terakhir</th>
            <th>Jurusan</th>
            <th>Nama Lembaga Pendidikan</th>
            <th>Golongan Darah</th>
            <th>Ukuran Seragam</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Nomor Rekening Bank</th>
            <th>Nama di Rekening Bank</th>
            <th>Nama Bank</th>
            <th>Status Karyawan</th>
            <th>Kontrak ke-</th>
            <th>Nama Keluarga Yang Bisa Dihubungi</th>
            <th>No. HP Keluarga Yang Bisa Dihubungi</th>
            <th>Awal Kontrak</th>
            <th>Akhir Kontrak</th>
            <th>Foto</th>
            <th>Foto KTP</th>
            <th>Foto KK</th>
            <th>Status Aktif</th>
        </tr>
        </thead>
        <tbody>
        @foreach($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->cost_center }}</td>
                <td>{{ $karyawan->namePosisions->nama }}</td>
                <td>{{ $karyawan->nik_bistel }}</td>
                <td>{{ $karyawan->nik_ta }}</td>
                <td>{{ $karyawan->nama_lengkap }}</td>
                <td>{{ $karyawan->sektor->nama }}</td>
                <td>{{ $karyawan->sektor->sektors->nama }}</td>
                <td>{{ $karyawan->namePosisions->levels->nama }}</td>
                <td>{{ $karyawan->units->nama }}</td>
                <td>{{ $karyawan->units->units->nama }}</td>
                <td>{{ date('d-m-Y ',strtotime($karyawan->tgl_mulai_kerja)) }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->no_telp }}</td>
                <td>{{ $karyawan->alamat }}</td>
                <td>{{ $karyawan->kota_lahir }}</td>
                <td>{{ date('d-m-Y ',strtotime($karyawan->tgl_lahir)) }}</td>
                <td>{{ $karyawan->jen_kel }}</td>
                <td>{{ $karyawan->agamas->nama }}</td>
                <td>{{ $karyawan->status_pernikahan }}</td>
                <td>{{ $karyawan->jumlah_anak }}</td>
                <td>'{{ $karyawan->no_ktp }}</td>
                <td>'{{ $karyawan->nomor_kartu_keluarga }}</td>
                <td>'{{ $karyawan->nomor_npwp }}</td>
                <td>'{{ $karyawan->no_bpjs_kesehatan }}</td>
                <td>'{{ $karyawan->no_bpjs_ketenagakerjaan }}</td>
                <td>{{ $karyawan->pendidikans->nama }}</td>
                <td>{{ $karyawan->jurusan }}</td>
                <td>{{ $karyawan->nama_lembaga }}</td>
                <td>{{ $karyawan->golDarahs->nama }}</td>
                <td>{{ $karyawan->ukuran_seragam }}</td>
                <td>{{ $karyawan->nama_ayah }}</td>
                <td>{{ $karyawan->nama_ibu_kandung }}</td>
                <td>'{{ $karyawan->no_rek }}</td>
                <td>{{ $karyawan->atas_nama }}</td>
                <td>{{ $karyawan->banks->nama }}</td>
                <td>{{ $karyawan->statuses->nama }}</td>
                <td>{{ $karyawan->kontrak_ke }}</td>
                <td>{{ $karyawan->nama_keluarga }}</td>
                <td>{{ $karyawan->no_telp_kel }}</td> 
                <td>{{ date('d-m-Y ',strtotime($karyawan->awal_kontrak)) }}</td>
                <td>{{ date('d-m-Y ',strtotime($karyawan->akhir_kontrak)) }}</td>
                <td>{{ $karyawan->foto }}</td>
                <td>{{ $karyawan->foto_ktp }}</td>
                <td>{{ $karyawan->foto_kk }}</td>
                <td>{{ $karyawan->keterangan_aktif }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
