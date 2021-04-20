<?php

namespace App\Exports;

use App\Models\Absensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AbsensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

     public function view(): View
    {   
        return view('absensis.table', [
            'absensis' => Absensi::all()
        ]);        
    }
}
