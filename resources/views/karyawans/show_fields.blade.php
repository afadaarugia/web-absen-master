 <style type="text/css">
     .bahan{
        color: red;
     }
     p{
        border-top: 1px solid black;
     }
 </style>
 <table class="table">
    <tr>
        @if($karyawan->keterangan_aktif == "Tidak Aktif")
        <th width="200px">
            <span class="bahan">Nama Karyawan</span>
        </th>
        <td width="800px">:
            <span class="bahan">{{ $karyawan->nama_lengkap }}</span>
        </td>
        @else
        <th width="200px">
            Nama Karyawan
        </th>
        <td width="800px">:
            <span>{{ $karyawan->nama_lengkap }}</span>
        </td>
        @endif
        <td rowspan="20" >
            <figure align="CENTER">
            <img src="{{ asset($karyawan->foto) }}" width="200px" height="200px" />
            <figcaption align='CENTER'>{{ $karyawan->nama_lengkap }}</figcaption>
            <figcaption align='CENTER'>{{ $karyawan->nik }}</figcaption>
            <figcaption align='CENTER'> <a href="{{ route('karyawans.export', [$karyawan->id]) }}" class='btn btn-primary'>Save</a></figcaption>
            </figure>
        </td>
    </tr>
{{--    <tr>--}}
{{--        <th> --}}
{{--            COST CENTER--}}
{{--        </th>--}}

{{--        <td>:--}}
{{--            {{ $karyawan->cost_center }}--}}
{{--        </td>--}}
{{--    </tr>--}}
    <tr>
        <th>
            NIK
        </th>

        <td>:
            {{ $karyawan->nik }}
        </td>
    </tr>
    <tr>
        <th>
            Jabatan
        </th>

        <td>:
            {{ $karyawan->namePosisions->nama }}
        </td>
    </tr>

    <tr>
        <th>
            Level
        </th>

        <td>:
            {{ $karyawan->namePosisions->levels->nama }}
        </td>
    </tr>
    <tr>
        <th>
           Sektor
        </th>

        <td>:
            {{ $karyawan->sektor->nama }}
        </td>
    </tr>
    <tr>
        <th>
            Sub Sektor
        </th>

        <td>:
            {{ $karyawan->sektor->sektors->nama }}
        </td>
    </tr>
    <tr>
        <th>
            Unit
        </th>

        <td>:
            {{ $karyawan->units->nama }}
        </td>
    </tr>
    <tr>
        <th>
            Sub Unit
        </th>

        <td>:
            {{ $karyawan->units->nama }}
        </td>
    </tr>
    <tr>
        <th>
            Jenis Kelamin
        </th>

        <td>:
            {{ $karyawan->jen_kel}}
        </td>
    </tr>
 </table>

 <p></p>

 <table class="table">
    <tr>
        <th>
            Kota Lahir
        </th>
        <td>:
            {{ $karyawan->kota_lahir }}
        </td>
        <th>
            Tanggal Lahir
        </th>   
        <td>:
            {{ date('d M Y ',strtotime($karyawan->tgl_lahir)) }}
        </td>
    </tr>
    <tr>
        <th>
            Telepon
        </th>

        <td>:
            {{ $karyawan->no_telp }}
        </td>
    </tr>
    <tr>
        <th>
            Alamat
        </th>

        <td>:
            {{ $karyawan->alamat }}
        </td>
        <th>
            E-Mail
        </th>

        <td>:
            {{ $karyawan->email }}
        </td>
    </tr>
 </table>
<p></p>
 <table class="table">
    <tr>
        <th width="200px">
            Agama
        </th>

        <td>:
            {{ $karyawan->agamas->nama }}
        </td>
    </tr>
 </table>
<p></p>
<p></p>
 <table class="table">
    <tr>
        <th width="200px">
            Keterangan Aktif/Tidak
        </th>

        <td>:
            {{ $karyawan->keterangan_aktif }}
        </td>
    </tr>
    <tr>
        <th>
            Status Karyawan
        </th>

        <td>:
            {{ $karyawan->statuses->nama }}
        </td>

    </tr>
 </table>







