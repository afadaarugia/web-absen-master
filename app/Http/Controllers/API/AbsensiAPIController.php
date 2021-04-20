<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAbsensiAPIRequest;
use App\Http\Requests\API\UpdateAbsensiAPIRequest;
use App\Models\FotoRecognition;
use App\Models\JamKerja;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Ixudra\Curl\CurlService;
use Ixudra\Curl\Facades\Curl;
use Mockery\Exception;
use Salman\GeoFence\Service\GeoFenceCalculator;
use App\Models\Absensi;
use App\Models\Karyawan;
use Carbon\Carbon;
use App\Repositories\AbsensiRepository;
use Illuminate\Http\Request;
use App\Models\Sektor;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;
use DB;

/**
 * Class AbsensiController
 * @package App\Http\Controllers\API
 */

class AbsensiAPIController extends AppBaseController
{
    /** @var  AbsensiRepository */
    private $absensiRepository;

    public function __construct(AbsensiRepository $absensiRepo)
    {
        $this->absensiRepository = $absensiRepo;
    }

    /**
     * Display a listing of the Absensi.
     * GET|HEAD /absensis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $absensis = $this->absensiRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        //$absensis = Absensi::where('karyawans_id', Auth::user()->id)->get();

       $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $sql = Absensi::where('karyawans_id',Auth::user()->karyawan->id)->whereBetween('created_at',[$start,$end])->get();


        $totalCuti = $sql->where('keterangan','Cuti')->count();
        $totalSakit = $sql->where('keterangan','Sakit')->count();
        $totalTimeIn = $sql->whereBetween('time_in',[$start,$end])->count();
        $totalTimeOut = $sql->whereBetween('time_out',[$start,$end])->count();
        $totalAbsen = $sql->count();

        $response = array(
            'total_time_in' => $totalTimeIn,
            'total_time_out' => $totalTimeOut,
            'total_sakit' => $totalSakit,
            'total_cuti' => $totalCuti,
            'total_absen' => $totalAbsen,
            'absensi' => $sql,
            );

        return $this->sendResponse($response,"successfully");
    }

    /**
     * Store a newly created Absensi in storage.
     * POST /absensis
     *
     * @param CreateAbsensiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAbsensiAPIRequest $request)
    {

        $input = $request->all();
        $input['time_in'] = date("Y-m-d H:i:s");
        $input['karyawans_id'] = Auth::user()->karyawan->id;

        $absensi = $this->absensiRepository->create($input);

        return $this->sendResponse($absensi->toArray(), 'Absensi saved successfully');
    }

    /**
     * Display the specified Absensi.
     * GET|HEAD /absensis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // /** @var Absensi $absensi */
        // $absensi = $this->absensiRepository->find($id);

        // if (empty($absensi)) {
        //     return $this->sendError('Absensi not found');
        // }

        // return $this->sendResponse($absensi->toArray(), 'Absensi retrieved successfully');

        $absensi = Absensi::where('users_id',Auth::user()->id)->with(
            'agamas',
            'units',
            'statuses',
            'golDarahs',
            'namePositon',
            'pendidikans',
            'sektors',
            'banks'
            )->get();

        return $this->sendResponse($absensi, 'Absesnsi retrieved successfully');


    }

    /**
     * Update the specified Absensi in storage.
     * PUT/PATCH /absensis/{id}
     *
     * @param int $id
     * @param UpdateAbsensiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAbsensiAPIRequest $request)
    {
        $input = $request->all();
        $input['karyawans_id'] = Auth::user()->karyawan->id;
        $input['time_out'] = date("Y-m-d H:i:s");


        /** @var Absensi $absensi */
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            return $this->sendError('Absensi not found');
        }

        $absensi = $this->absensiRepository->update($input, $id);

        return $this->sendResponse($absensi->toArray(), 'Absensi updated successfully');
    }

    /**
     * Remove the specified Absensi from storage.
     * DELETE /absensis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Absensi $absensi */
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            return $this->sendError('Absensi not found');
        }

        $absensi->delete();

        return $this->sendSuccess('Absensi deleted successfully');
    }

    public function cekLokasi(Request $request)
    {
        //$i =Absensi::select('created_at')->where('karyawans_id', Auth::user()->id)->get();

        //--AMBIL WAKTU JAM KERJA DARI PENGATURAN
        //=======================================//
        $jamkerjapagi = JamKerja::where('ket','pagi')->first();
        $jamkerjasore = JamKerja::where('ket','sore')->first();

        $input = $request->all();

        //return $input;
        //==================================//
        $latitude = floatval($input['lat']);
        $longitude = floatval($input['lang']);

        $sektor = Auth::user()->karyawan->sektor;

        $d_calculator = new GeoFenceCalculator();

        $long = floatval($sektor->longtitude);
        $lat = floatval($sektor->latitude);

       $distance = $d_calculator->CalculateDistance($long,$lat, $longitude, $latitude);
       //return $distance;

       if ($distance <= 0.15){

            $hour = Carbon::now()->hour;

            //--PERGANTIAN CARA HITUNG MENGUNAKAN PENGATURAN JAM KERJA = FORMAT DATE H
            if ($hour >= Carbon::parse($jamkerjapagi->jam_awal)->format('H') && $hour <= Carbon::parse($jamkerjapagi->jam_akhir)->format('H')){

                $absen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('created_at', [Carbon::today()->addHours(Carbon::parse($jamkerjapagi->jam_awal)->format('H')) , Carbon::today()->addHours(Carbon::parse($jamkerjasore->jam_awal)->format('H'))->addMinutes(Carbon::parse($jamkerjasore->jam_awal)->format('i'))])->first();

                if(!empty($absen)){
                    return $this->sendSuccess("Sudah Absen Pagi ");
                }

            } else if($hour >= Carbon::parse($jamkerjasore->jam_awal)->format('H') && $hour <= Carbon::parse($jamkerjasore->jam_akhir)->format('H')){

                //$absen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('updated_at', [Carbon::today()->addHours(17) ,Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(34)])->first();

                //--PERGANTIAN CARA HITUNG MENGUNAKAN PENGATURAN JAM KERJA = FORMAT DATE H:m
                //==========================================================================//
                $absen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('updated_at', [Carbon::today()->addHours(Carbon::parse($jamkerjasore->jam_awal)->format('H')) ,Carbon::today()->addHours(Carbon::parse($jamkerjasore->jam_akhir)->format('H'))->addMinutes(Carbon::parse($jamkerjasore->jam_akhir)->format('i'))])->first();

                if(!empty($absen)){
                    return $this->sendSuccess("Sudah Absen Sore ");
                }

            } else {
                return $this->sendError("Belum Waktunya Absen ");
            }
//            return $this->sendError('Belum Absen Pagi & Sore');
        } else {
           return $this->sendError('Jarak Terlalu Jauh');
       }
        return $this->sendSuccess('Belum absen pagi & sore');
    }

    public function cekAbsen() {
        $start = Carbon::today()->startOfDay();
        $end = Carbon::today()->endOfDay();

        $sql = Absensi::where('karyawans_id',Auth::user()->karyawan->id)->whereBetween('created_at',[$start,$end])->first();

        return $this->sendResponse($sql,"Succsss");

    }

    public function jadwalAbsen() {
        $jamkerjapagi = JamKerja::where('ket','pagi')->first();
        $jamkerjasore = JamKerja::where('ket','sore')->first();

        $jam = array(
            'awal_pagi_awal' =>$jamkerjapagi->jam_awal,
            'awal_pagi_akhir' =>$jamkerjapagi->jam_akhir,
            'awal_sore_awal' =>$jamkerjasore->jam_awal,
            'awal_sore_akhir' =>$jamkerjasore->jam_akhir
        );

        return $this->sendResponse($jam,"Jam Absen Success");
    }

// public function createAbsen(Request $request)
//     {

//         $i =Absensi::select('created_at')->where('karyawans_id', Auth::user()->id)->get();



//         $input = $request->all();
//         $input['karyawans_id'] = Auth::user()->karyawan->id;
//         //return $input;

//         $latitude = floatval($input['lat']);
//         $longitude = floatval($input['lang']);

//         $sektor = Auth::user()->karyawan->sektor;

//         //return $sektors;
//          $d_calculator = new GeoFenceCalculator();

//          $long = floatval($sektor->longtitude);
//         $lat = floatval($sektor->latitude);

//        $distance = $d_calculator->CalculateDistance($long,$lat, $longitude, $latitude);

//        if ($distance <= 0.15 ){

//         $hour = Carbon::now()->hour;

//         if ($hour >=5 && $hour<= 16){

//             $absen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('created_at', [Carbon::today()->addHours(5) , Carbon::today()->addHours(16)->addMinutes(59)->addSeconds(59)])->first();
//                $input['time_in'] = date("Y-m-d H:i:s");

//             if(!empty($absen)){

//                     return $this->sendError("Sudah Absen Pagi ");
//             }

//         }else if($hour >16 && $hour<24){

//              $absen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('created_at', [Carbon::today()->addHours(17) ,Carbon::today()->addHours(23)->addMinutes(59)->addSeconds(59)])->first();
//                  $input['time_out'] = date("Y-m-d H:i:s");

//              if(!empty($absen)){

//                     return $this->sendError("Sudah Absen Sore ");
//             }

//         }else {

//             return $this->sendError("Belum Waktunya Absen ");

//         }

//         $absensi = $this->absensiRepository->create($input);

//         return $this->sendSuccess('Absen Berhasil');
//     }

//      return $this->sendError('Jarak Terlalu Jauh');

//     }

    public function getUpdate(){

    $hour = Carbon::now()->hour;
        $start = Carbon::now()->format('Y-m-d').' 00:00:01';
        $end = Carbon::now()->format('Y-m-d').' 23:59:59';

        $jamkerjapagi = JamKerja::where('ket','pagi')->first();
        $jamkerjasore = JamKerja::where('ket','sore')->first();

        if($hour >= Carbon::parse($jamkerjapagi->jam_awal)->format('H') && $hour <= Carbon::parse($jamkerjasore->jam_akhir)->format('H') ){

        $absen = Absensi::where('karyawans_id',Auth::user()->karyawan->id)->whereBetween('created_at',[$start,$end])->max('id');
        $sql = Absensi::where('karyawans_id',Auth::user()->karyawan->id)->whereBetween('created_at',[$start,$end])->max('created_at');


        if($sql !== null){
            $response = array(
            'time_in' => $sql,
            'id' => $absen
            );

            return $this->sendResponse($response,"successfully");
        }

    }
        return $this->sendError("Tidak Ada Data");

    }

    public function faceRecognition(Request $request) {
        try {

            $input = $request->validate([
                'users_id' => 'required',
                'foto_upload' => 'required|mimes:jpg,jpeg,png',
                'foto_recognition' => 'required'
            ]);

            $date = date('d-m-y');
            if( $request->hasFile('foto_upload')) {
                $file = $request->file('foto_upload');
                $upload = $date.'-'.$input['users_id'].'.'. $file->getClientOriginalExtension();
                $request->foto_upload->storeAs('public/tmp_foto',$upload,'local');
            }else{
                return $this->sendError("Tidak ada file yang di upload", 200);
            }
            $curl = curl_init();

            $image1 = '/var/www/web-absen/public/storage/tmp_foto/'.$upload;
            $image2 = '/var/www/web-absen/public/'.$input['foto_recognition'];
//
//            $image1 = '/var/www/web-absen/public/storage/tmp_foto/03-09-20-1.jpg';
//            $image2 = '/var/www/web-absen/public/storage/foto/01-09-20-1.png';

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://compareface.britech.id/upload",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Accept: application/json'
                ),
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array(
                    'image1' => $image1,
                    'image2' => $image2),
            ));

            $data = curl_exec($curl);
            $response2 = json_decode($data,true);
            curl_close($curl);

            $response = array(
                'users_id' => $input['users_id'],
                'foto_upload' => $upload,
                'foto_recognition' => $input['foto_recognition'],
                //'msg' => $response2['msg'],
                'msg' => $upload .' dan '.$input['foto_recognition'],
                'similiarity' => $response2['similiarity'],
                'tes'=>$upload
            );

            return $this->sendResponse($response,'success');

        } catch (Exception $e){
                return $this->sendError($e->getMessage(), 200);
            }
    }
}

