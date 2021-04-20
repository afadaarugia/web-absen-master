<?php

namespace App\Exports;

use App\Models\Karyawan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;

class KaryawanExport implements FromView, ShouldAutoSize
{

    // ...

    /**
     * @return array
     */
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

     public function view(): View
    {   
        return view('karyawans.export', [
            'karyawans' => Karyawan::all()
        ]);        
    }
}
