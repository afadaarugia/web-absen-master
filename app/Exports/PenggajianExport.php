<?php

namespace App\Exports;

use App\Models\Penggajian;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class PenggajianExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

     public function view(): View
    {   
        return view('penggajians.export', [
            'penggajians' => Penggajian::all()
        ]);        
    }
}
