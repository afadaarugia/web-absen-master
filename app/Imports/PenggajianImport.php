<?php

namespace App\Imports;

use App\Models\Penggajian;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class PenggajianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Penggajian
    */
    public function model(array $row)
    {
        $sql = Karyawan::where('nik', $row[20])->get();
        $idUser = 1;
        foreach ($sql as $users) {
            $idUser = $users->id;
        }
        $idUser = $row[0];

        return new Penggajian([

            'karyawans_id' => $row[0],
            'gaji_pokok' =>$row[1],
            'insentif_jab' =>$row[2],
            'insentif_prestasi'=>$row[3],
            'intensif_telekomunikasi'=>$row[3],
            'insentif_transportasi' =>$row[5],
            'insentif_ps'=>$row[6],
            'intensif_lembur'=>$row[7],
            'rapel_lembur'=>$row[8],
            'rapel_gaji'=>$row[9],
            'rapel_ps'=>$row[10],
            'tunj_bpjs'=>$row[11],
            'tunj_jkk'=>$row[12],
            'tunj_jkm'=>$row[13],
            'tunj_jht'=>$row[14],
            'tunj_pph'=>$row[15],
            'pot_pinaman_kopegtel'=>$row[16],
            'pot_pinjaman_lain'=>$row[17],
            'angsuran_ke'=>$row[18],
            'bulan_penggajian'=>$row[19],
                //
        ]);
    }
}
