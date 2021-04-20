<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\JamKerja;
use App\Repositories\AbsensiRepository;
use App\Models\Absensi;
Use App\Models\Karyawan;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use Carbon\Carbon;
use Flash;
use Response;
use Auth;
use DB;

class AbsensiController extends AppBaseController
{
    /** @var  AbsensiRepository */
    private $absensiRepository;

    public function __construct(AbsensiRepository $absensiRepo)
    {
        $this->absensiRepository = $absensiRepo;
    }

    /**
     * Display a listing of the Absensi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if ($request->start != '' and $request->end != '') {
            $start = Carbon::parse($request->start)->format('Y-m-d H:i:s');
            $end = Carbon::parse($request->end)->format('Y-m-d H:i:s');

            $absenIn = DB::table('absensis')
                    ->select(DB::raw('count(absensis.created_at) as total, karyawans.nama_lengkap as nama_karyawan,karyawans.nik as nik_karyawan, absensis.karyawans_id as karyawans_id'),
                        DB::raw('max(time_in) as time_in,max(time_out) as time_out , keterangan, absensis.deleted_at
                        '))
                    ->where('absensis.deleted_at' , null)
                    ->whereBetween('absensis.created_at', [$start, $end])
                    ->join('karyawans', 'absensis.karyawans_id', 'karyawans.id')
                    ->orderBy('nama_karyawan')
                    ->groupBy('nik_karyawan','nama_karyawan','karyawans_id','keterangan','deleted_at')
                    ->get();

       //return $absenIn;

        return view('absensis.index',compact('absenIn'));

        }
        // $sql = Absensi::all()->whereBetween('created_at',[Carbon::now()->format('Y-m-d'),Carbon::now()->addDays()->format('Y-m-d ')]);
        // return $sql;


       $absenIn = DB::table('absensis')
                    ->select(DB::raw('count(absensis.created_at) as total, karyawans.nama_lengkap as nama_karyawan,karyawans.nik as nik_karyawan,absensis.karyawans_id as karyawans_id'),
                        DB::raw('max(time_in) as time_in,max(time_out) as time_out, keterangan, absensis.deleted_at
                        '))
                    ->where('absensis.deleted_at' , null)
                    ->whereBetween('absensis.created_at', [$start, $end])
                    ->join('karyawans', 'absensis.karyawans_id', 'karyawans.id')
                    ->orderBy('nama_karyawan')
                    ->groupBy('nik_karyawan','nama_karyawan','karyawans_id','keterangan','deleted_at')
                    ->get();

       //return $absenIn;

        return view('absensis.index',compact('absenIn'));
    }

    /**
     * Show the form for creating a new Absensi.
     *
     * @return Response
     */
    public function create()
    {
        $Karyawan = Karyawan::pluck('nama_lengkap','id');
        return view('absensis.create',compact('Karyawan'));
    }

    /**
     * Store a newly created Absensi in storage.
     *
     * @param CreateAbsensiRequest $request
     *
     * @return Response
     */
    public function store(CreateAbsensiRequest $request)
    {
        $input = $request->all();
        $input['time_out'] = date("Y-m-d H:i:s");
        $input['time_in'] = date("Y-m-d H:i:s");

        $absensi = $this->absensiRepository->create($input);

        Flash::success('Absensi saved successfully.');

        return redirect(route('absensis.index'));
    }

    /**
     * Display the specified Absensi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Request $request,$id)
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i');

        $startIn = Carbon::now()->startOfMonth()->hours(5)->format('Y-m-d H:i');
        $endIn = Carbon::now()->endOfMonth()->hours(16)->minutes(59)->format('Y-m-d H:i');

        $startOut = Carbon::now()->startOfMonth()->hours(17)->format('Y-m-d H:i');
        $endOut = Carbon::now()->endOfMonth()->hours(23)->format('Y-m-d H:i');

        $startLembur = Carbon::now()->startOfMonth()->addDays();
        $endLembur = Carbon::now()->endOfMonth();

        $absensi = Absensi::all()->where('karyawans_id',$id)->whereBetween('created_at', [$start, $end]);

        $karyawan = Absensi::where('karyawans_id',$id)->first();

        $totalAbsen = Absensi::all()->where('karyawans_id',$id)->whereBetween('created_at', [$start, $end])->count();
        $Lembur = Absensi::all()->where('karyawans_id',$id)->whereBetween('created_at', [$startLembur, $endLembur])->count();

        if (empty($absensi)) {
            Flash::error('Absensi not found');

            return redirect(route('absensis.index'));
        }

     // return $absensi->karyawans->nama_lengkap;

        return view('absensis.show',compact('absensi',
            'totalAbsen',
            'Lembur','karyawan'));
    }

    /**
     * Show the form for editing the specified Absensi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $absensi = $this->absensiRepository->find($id);
        $Karyawan = Karyawan::pluck('nama_lengkap','id');

        if (empty($absensi)) {
            Flash::error('Absensi not found');

            return redirect(route('absensis.index'));
        }


        return view('absensis.edit',compact('absensi','Karyawan'));
    }

    /**
     * Update the specified Absensi in storage.
     *
     * @param int $id
     * @param UpdateAbsensiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAbsensiRequest $request)
    {
        $absensi = $this->absensiRepository->find($id);
        $input = $request->all();
        $input['time_out'] = date("Y-m-d H:i:s");
        $input['time_in'] = date("Y-m-d H:i:s");


        if (empty($absensi)) {
            Flash::error('Absensi not found');

            return redirect(route('absensis.index'));
        }

        $absensi = $this->absensiRepository->update($input, $id);

        Flash::success('Absensi updated successfully.');

        return redirect(route('absensis.index'));
    }

    /**
     * Remove the specified Absensi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            Flash::error('Absensi not found');

            return redirect(route('absensis.index'));
        }

        $this->absensiRepository->delete($id);

        Flash::success('Absensi deleted successfully.');

        return redirect(route('absensis.index'));
    }

    public function Rekap(Request $request)
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

         if ($request->start != '' and $request->end != '') {
            $start = Carbon::parse($request->start)->format('Y-m-d H:i:s');
            $end = Carbon::parse($request->end)->format('Y-m-d H:i:s');

        }
            $absensis = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('created_at', [$start, $end]);

            $totalAbsen = Absensi::all()->where('karyawans_id', Auth::user()->karyawan->id)->whereBetween('created_at', [$start, $end])->count();

            return view('rekap_absen.index',compact('absensis', 'totalAbsen'));

        // $karyawan = Karyawan::with('users')->where('users_id', Auth::user()->id);

    }

    public function export()
    {
        return (new AbsensiExport)->download('absensi.xlsx');
    }

}
