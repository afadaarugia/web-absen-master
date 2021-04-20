<?php

namespace App\Exports;

use App\Models\Penggajian;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class SlipGajiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $id;

    function __construct($id){
        $this->id = $id;
    }

     public function view(): View
    {   

        return view('penggajians.show_fields', [
            
            'penggajians' => DB::table('penggajian')
                    ->select(DB::raw('sum(potongans.bpjs + potongans.jht  + potongans.pph  + potongans.jkm + potongans.jkk)as total_potongan,
                    sum( pendapatan.bpjs + pendapatan.jht +pendapatan.pph + pendapatan.jkm + pendapatan.jkm) as total_pendapatan, 
                    sum(pendapatan.insentif_jab + pendapatan.insentif_ps + pendapatan.insentif_transportasi + pendapatan.insentif_prestasi)as insentif,
                    name_posisions.gaji_pokok as gaji_pokok, 
                    name_posisions.nama as jabatan,
                    karyawans.nama_lengkap as nama_karyawan, 
                    penggajian.karyawans_id,
                    potongans.bpjs as pt_bpjs , potongans.jht as pt_jht   , potongans.pph as pt_pph , potongans.jkm as pt_jkm, potongans.jkk as pt_jkk,
                    pendapatan.bpjs as pd_bpjs, pendapatan.jht as pd_jht,pendapatan.pph as pd_pph , pendapatan.jkm as pd_jkm, pendapatan.jkk as pd_jkk,
                    pendapatan.insentif_jab  as in_jab, pendapatan.insentif_ps as in_ps , pendapatan.insentif_transportasi as in_tp, pendapatan.insentif_prestasi as in_pr

                    '))
                    ->where('penggajian.karyawans_id', $this->id)
                    ->join('karyawans','penggajian.karyawans_id', 'karyawans.id')
                    ->join('name_posisions','name_posisions.id', 'karyawans.name_posisions_id')
                    ->join('potongans', 'potongans.id', 'penggajian.potongans_id')
                    ->join('pendapatan', 'pendapatan.id', 'penggajian.pendapatan_id')
                    ->groupBy('potongans.bpjs','jabatan','gaji_pokok','penggajian.karyawans_id' ,'nama_karyawan','pd_jkm','pd_pph',
                        'pd_jht', 'pd_bpjs','pt_jkm','pt_pph','pt_bpjs','pt_jht','in_pr','in_tp','in_ps','in_jab','pt_jkk','pd_jkk')
                    ->get()
        ]);        
    }
}