<?php

namespace App\Http\Controllers\API;

use App\Models\Sektor;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

/**
 * Class AbsensiController
 * @package App\Http\Controllers\API
 */

class DistanceAPIController extends AppBaseController
{
    
    public function cekLokasi(){

        $query = Sektor::distance($latitude, $longitude);
        $asc = $query->orderBy('distance', 'ASC')->get();
    }
}
