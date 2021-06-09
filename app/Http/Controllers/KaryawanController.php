<?php
namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Sektor;
use App\Models\Status;
use App\Models\User;
use App\Models\NamePosition;
use App\Models\Unit;
use App\Models\Agama;
use App\Models\Karyawan;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use App\Http\Requests\CreateKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Repositories\KaryawanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use File;
use Storage;
use ZipArchive;
use DB;
use Auth;
use Flash;
use Response;

class KaryawanController extends AppBaseController
{
    /** @var  KaryawanRepository */
    private $karyawanRepository;

    public function __construct(KaryawanRepository $karyawanRepo)
    {
        $this->karyawanRepository = $karyawanRepo;
    }

    /**
     * Display a listing of the Karyawan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $karyawans = $this->karyawanRepository->paginate(20);
        if($request->nik){
            $nik = $input['nik'];

                 $karyawans = Karyawan::where('nik',$nik)->paginate(20);

        }

        return view('karyawans.index')
            ->with('karyawans', $karyawans);
    }

    /**
     * Show the form for creating a new Karyawan.
     *
     * @return Response
     */
    public function create()
    {
        $User = User::pluck ('name','id');
        $Level = Level::pluck ('nama','id');
        $NamePosition = NamePosition::pluck ('nama','id');
        $Agama = Agama::pluck ('nama','id');
        $Sektor = Sektor::pluck ('nama','id');
        $parentSektor = Sektor::pluck ('nama','sektors_id');
        $Unit = Unit::pluck ('nama','id');
        $Status = Status::pluck ('nama','id');

        return view('karyawans.create',compact(
            'parentSektor',
            'User',
            'Level',
            'NamePosition',
            'Agama',
            'Sektor',
            'Unit',
            'Status'
        ));
    }

    /**
     * Store a newly created Karyawan in storage.
     *
     * @param CreateKaryawanRequest $request
     *
     * @return Response
     */
    public function store(CreateKaryawanRequest $request)
    {
        $input = $request->except('foto');

        $karyawan = $this->karyawanRepository->create($input);

        if ($request->has('foto')){
            $foto = $request->file('foto');
            $filename = $karyawan->nik.'.'.$foto->getClientOriginalExtension();
            $saveFoto = $request->foto->storeAs('public/foto_karyawan',$filename,'local');
            $karyawan->foto= "storage".substr($saveFoto, strpos($saveFoto, '/'));
            $karyawan->save();

        }
        Flash::success('Karyawan saved successfully.');

        return redirect(route('karyawans.index'));
    }

    /**
     * Display the specified Karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        return view('karyawans.show')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for editing the specified Karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $User = User::pluck ('name','id');
        $Level = Level::pluck ('nama','id');
        $NamePosition = NamePosition::pluck ('nama','id');
        $Sektor = Sektor::pluck ('nama','id');
        $Unit = Unit::pluck ('nama','id');
        $Status = Status::pluck ('nama','id');

        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('users.index'));
        }

        return view('karyawans.edit',compact(
            'karyawan',
            'User',
            'Level',
            'NamePosition',
            'Sektor',
            'Unit',
            'Status'
        ));
    }

    /**
     * Update the specified Karyawan in storage.
     *
     * @param int $id
     * @param UpdateKaryawanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKaryawanRequest $request)
    {
        $karyawan = $this->karyawanRepository->find($id);

        $date = date('d-m-y');

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }
        $input = $request->except('foto','foto_kk','foto_ktp');

        if ($request->has('foto')){
            File::delete($karyawan->foto);
            $foto = $request->file('foto');
            $filename = $date.'-'.$karyawan->nik.'.'.$foto->getClientOriginalExtension();
            $saveFoto = $request->foto->storeAs('public/foto_karyawan',$filename,'local');
            $karyawan->foto= "storage".substr($saveFoto, strpos($saveFoto, '/'));
            $karyawan->save();

        }

        if ($request->has('foto_ktp')){
            File::delete($karyawan->foto_ktp);
            $foto_ktp = $request->file('foto_ktp');
            $filename =  $date.'-'.'ktp_'.$karyawan->nik.'.'.$foto_ktp->getClientOriginalExtension();
            $fotoKtp = $request->foto_ktp->storeAs('public/foto_karyawan',$filename,'local');
            $karyawan->foto_ktp= "storage".substr($fotoKtp, strpos($fotoKtp, '/'));
            $karyawan->save();

        }
        if ($request->has('foto_kk')){
            File::delete($karyawan->foto_kk);
            $file = $request->file('foto_kk');
            $filename =  $date.'-'.'kk_'.$karyawan->nik.'.'.$file->getClientOriginalExtension();
            $fotoKk = $request->foto_kk->storeAs('public/foto_karyawan',$filename,'local');
            $karyawan->foto_kk= "storage".substr($fotoKk, strpos($fotoKk, '/'));
            $karyawan->save();
        }

        $karyawan = $this->karyawanRepository->update($input, $id);


        Flash::success('Karyawan updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Karyawan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        $this->karyawanRepository->delete($id);

        Flash::success('Karyawan deleted successfully.');

        return redirect(route('karyawans.index'));
    }


    public function person(Request $request)
    {
        $karyawan = Karyawan::where('users_id', Auth::user()->id)->first();

        // $karyawan = Auth::user()->karyawan->namePosisions->gaji_pokok;

        // return $karyawan;

        return view('karyawans.show')
            ->with('karyawan', $karyawan);
    }

    public function export()
    {

        return (new KaryawanExport)->download('Database_Karyawan.xlsx');
    }

    public function export_image()
    {

        $filename = "foto_karyawan.zip";

        $zip = new ZipArchive;

        if($zip->open(storage_path($filename),ZipArchive::CREATE)=== TRUE)
        {
            $files = \File::files(storage_path('app/public/foto_karyawan'));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value,$relativeName);

            }
            $zip->close();
        }

        return response()->download(storage_path($filename));

    }


    public function downloadFoto($imageId){
       $karyawans = Karyawan::where('id', $imageId)->firstOrFail();
       $path = public_path().'/'.$karyawans->foto;
       return response()->download($path, $karyawans->original_filename, ['Content-Type' => $karyawans->mime]);
    }
     public function downloadFotoKk($imageId){
       $karyawans = Karyawan::where('id', $imageId)->firstOrFail();
       $path = public_path().'/'.$karyawans->foto_kk;
       return response()->download($path, $karyawans->original_filename, ['Content-Type' => $karyawans->mime]);
    }
     public function downloadFotoKtp($imageId){
       $karyawans = Karyawan::where('id', $imageId)->firstOrFail();
       $path = public_path().'/'.$karyawans->foto_ktp;
       return response()->download($path, $karyawans->original_filename, ['Content-Type' => $karyawans->mime]);
    }


     public function import(Request $request)
    {
        $date = date('d-m-y');
        $filename = $date.$request->file('file')->getClientOriginalExtension();
        $path1 = $request->file('file')->storeAs('temp',$filename,'local');
        $path=storage_path('app').'/'.$path1;

        Excel::import(new KaryawanImport,$request->file('file'));

        return back();
    }

}


