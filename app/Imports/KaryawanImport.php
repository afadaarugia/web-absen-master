<?php

namespace App\Imports;

use App\Models\Karyawan;
use App\User;
use App\Models\NamePosition;
use App\Models\Bank;
use App\Models\GolDarah;
use App\Models\Status;
use App\Models\Unit;
use App\Models\Sektor;
use App\Models\Pendidikan;
use App\Models\Agama;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $sql = User::where('nik', $row[2])->get();
        $agama = Agama::where('nama', $row[14])->get();
        $NamePosition = NamePosition::where('nama', $row[1])->get();
        $Bank = Bank::where('nama', $row[31])->get();
        $Status = Status::where('nama', $row[34])->get();
        $GolDarah = GolDarah::where('nama', $row[25])->get();
        $Pendidikan = Pendidikan::where('nama', $row[22])->get();
        $Sektor = Sektor::where('nama', $row[5])->get();
        $Unit = Unit::where('nama', $row[6])->get();

        $idAgama = 1;
        $idSektor = 1;
        $idJabatan = 1;
        $idBank = 1;
        $idStatus = 1;
        $idPendidikan = 1;
        $idUnit = 1;
        $idGolDarah = 1;

        $idUser = 1;
        foreach ($sql as $users) {
            $idUser = $users->id;
        }

        foreach ($agama as $agamas) {
            $idAgama = $agamas->id;
        }

        foreach ($NamePosition as $NamePosition) {
            $idJabatan = $NamePosition->id;
        }

        foreach ($Bank as $Bank) {
            $idBank = $Bank->id;
        }

        foreach ($Status as $Status) {
            $idStatus = $Status->id;
        }

        foreach ($GolDarah as $GolDarah) {
            $idGolDarah = $GolDarah->id;
        }

        foreach ($Pendidikan as $Pendidikan) {
            $idPendidikan = $Pendidikan->id;
        }

        foreach ($Unit as $Unit) {
            $idUnit = $Unit->id;
        }

        foreach ($Sektor as $Sektor) {
            $idSektor = $Sektor->id;
        }

        $row[39]= $idUser;
        $row[1]= $idJabatan;
        $row[14]= $idAgama;
        $row[5]= $idSektor;
        $row[6]= $idUnit;
        $row[31]= $idBank;
        $row[25]= $idGolDarah;
        $row[34]= $idStatus;
        $row[22]= $idPendidikan;
        $row[12] = Carbon::parse($row[12])->format('Y-m-d');
        $row[7] = Carbon::parse($row[7])->format('Y-m-d');
        $row[36] = Carbon::parse($row[36])->format('Y-m-d');
        $row[37] = Carbon::parse($row[37])->format('Y-m-d');


        return new Karyawan([

        'cost_center' => $row[0],
        'name_posisions_id' => $row[1],
        'nik_bistel' => $row[2],
        'nik_ta' => $row[3],
        'nama_lengkap' => $row[4],
        'sektors_id' => $row[5],
        'units_id' => $row[6],
        'tgl_mulai_kerja' => $row[7],
        'email' => $row[8],
        'no_telp' => $row[9],
        'alamat' => $row[10],
        'kota_lahir' => $row[11],
        'tgl_lahir' => $row[12],
        'jen_kel' => $row[13],
        'agamas_id' => $row[14],
        'status_pernikahan' => $row[15],
        'jumlah_anak' => $row[16],
        'no_ktp' => $row[17],
        'nomor_kartu_keluarga'=> $row[18],
        'nomor_npwp'=> $row[19],
        'no_bpjs_kesehatan'=> $row[20],
        'no_bpjs_ketenagakerjaan'=> $row[21],
        'pendidikans_id' => $row[22],
        'jurusan' => $row[23],
        'nama_lembaga' => $row[24],
        'gol_darahs_id' => $row[25],
        'ukuran_seragam' => $row[26],
        'nama_ayah' => $row[27],
        'nama_ibu_kandung' => $row[28],
        'no_rek' => $row[29],
        'atas_nama' => $row[30],
        'banks_id' => $row[31],
        'statuses_id' => $row[34],
        'kontak_ke' => $row[35],
        'nama_keluarga' => $row[32],
        'no_telp_kel' => $row[33],
        'awal_kontak' => $row[36],
        'akhir_kontrak' => $row[37],
        'keterangan_aktif' => $row[38],
        'users_id' => $row[39],

        ]);
    }
}
