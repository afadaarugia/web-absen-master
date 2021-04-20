<?php

namespace App\Http\Controllers;

use App\Models\JamKerja;
use Illuminate\Http\Request;
use App\Models\NamePosition;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Sektor;
use App\Models\User;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensis = Absensi::count();

        $NamePosition = NamePosition::count();

        $sektors = Sektor::count();

        $users = User::count();

        $jamkerjapagi = JamKerja::where('ket','pagi')->first();

        $jamkerjasore = JamKerja::where('ket','sore')->first();


        $grafik = $this->chart_kategory();

        $person = Karyawan::where('users_id', Auth::user()->id)->first();

        return view('home',compact('grafik','absensis','NamePosition','person','sektors','users','jamkerjapagi','jamkerjasore'));
    }

    public function chart_kategory($value='')
    {
        $grafik = [];
        $data = DB::table('absensis')
            ->select('absensis.id','karyawans.nama_lengkap', DB::raw("count(absensis.id) as jml"))
            ->join('karyawans','absensis.karyawans_id','=','karyawans.id')
            ->groupBy('absensis.id','karyawans.nama_lengkap')
            ->get();

        foreach ($data as $key => $value) {
        $grafik['labels'][] = $value->nama_lengkap;
        $grafik['data'][] = $value->jml;
        $r = rand(0,255);
        $g = rand(0,255);
        $b = rand(0,255);
        $grafik['backgroundColor'][] = "rgba($r,$g,$b,10)";
        }
        if(count($data)==0){
            return [];
        }
        else{
            return [
                'labels'=>json_encode($grafik['labels'],true),
            'data'=>json_encode($grafik['data']),
            'backgroundColor'=>json_encode($grafik['backgroundColor'],true),
            'borderColor'=>json_encode($grafik['backgroundColor'],true)
            ];
        }
    }
}
