<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFotoRecognitionRequest;
use App\Http\Requests\UpdateFotoRecognitionRequest;
use App\Models\Karyawan;
use App\Models\User;
use App\Repositories\FotoRecognitionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Auth;
use Response;
use File;
use Mockery\Exception;

class FotoRecognitionController extends AppBaseController
{
    /** @var  FotoRecognitionRepository */
    private $fotoRecognitionRepository;

    public function __construct(FotoRecognitionRepository $fotoRecognitionRepo)
    {
        $this->fotoRecognitionRepository = $fotoRecognitionRepo;
    }

    /**
     * Display a listing of the FotoRecognition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fotoRecognitions = $this->fotoRecognitionRepository->all();

        return view('foto_recognitions.index')
            ->with('fotoRecognitions', $fotoRecognitions);
    }

    /**
     * Show the form for creating a new FotoRecognition.
     *
     * @return Response
     */
    public function create()
    {
        $User = User::pluck ('name','id');

        return view('foto_recognitions.create',compact('User'));
    }

    /**
     * Store a newly created FotoRecognition in storage.
     *
     * @param CreateFotoRecognitionRequest $request
     *
     * @return Response
     */
    public function store(CreateFotoRecognitionRequest $request)
    {
        $input = $request->except('foto');

        $date = date('d-m-y');
        try{
            DB::beginTransaction();
            $fotoRecognition = $this->fotoRecognitionRepository->create($input);

            if( $request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $date.'-'.$input['users_id'].'.'. $file->getClientOriginalExtension();
                $path = $request->foto->storeAs('public/foto',$filename,'local');
                $fotoRecognition->foto ='storage'.substr($path,strpos($path, '/'));
                $fotoRecognition->save();
            }
            DB::commit();
            Flash::success('Saved successfully.');
        } catch(Exception $e) {
            DB::rollback();
            Flash::error('Gagal ditambah!');
        }

        return redirect(route('fotoRecognitions.index'));
    }

    /**
     * Display the specified FotoRecognition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fotoRecognition = $this->fotoRecognitionRepository->find($id);

        if (empty($fotoRecognition)) {
            Flash::error('Foto Recognition not found');

            return redirect(route('fotoRecognitions.index'));
        }

        return view('foto_recognitions.show')->with('fotoRecognition', $fotoRecognition);
    }

    /**
     * Show the form for editing the specified FotoRecognition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fotoRecognition = $this->fotoRecognitionRepository->find($id);
        $User = User::pluck ('name','id');

        if (empty($fotoRecognition)) {
            Flash::error('Foto Recognition not found');

            return redirect(route('fotoRecognitions.index'));
        }

        return view('foto_recognitions.edit',compact('User'))->with('fotoRecognition', $fotoRecognition);
    }

    /**
     * Update the specified FotoRecognition in storage.
     *
     * @param int $id
     * @param UpdateFotoRecognitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFotoRecognitionRequest $request)
    {
        $input = $request->except('foto');

        $fotoRecognition = $this->fotoRecognitionRepository->find($id);

        if (empty($fotoRecognition)) {
            Flash::error('Foto Recognition not found');

            return redirect(route('fotoRecognitions.index'));
        }


        $date = date('d-m-y');
        try{
            DB::beginTransaction();
            $fotoRecognition = $this->fotoRecognitionRepository->update($input, $id);

            if( $request->hasFile('foto')) {
                File::delete($fotoRecognition->foto);
                $file = $request->file('foto');
                $filename = $date.'-'.$input['users_id'].'.'. $file->getClientOriginalExtension();
                $path = $request->foto->storeAs('public/foto',$filename,'local');
                $fotoRecognition->foto = 'storage'.substr($path,strpos($path, '/'));
                $fotoRecognition->save();
            }
            DB::commit();
            Flash::success('Saved successfully.');
        } catch(Exception $e) {
            DB::rollback();
            Flash::error('Gagal ubah!');
        }

        return redirect(route('fotoRecognitions.index'));
    }

    /**
     * Remove the specified FotoRecognition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fotoRecognition = $this->fotoRecognitionRepository->find($id);

        if (empty($fotoRecognition)) {
            Flash::error('Foto Recognition not found');

            return redirect(route('fotoRecognitions.index'));
        }

        $this->fotoRecognitionRepository->delete($id);

        Flash::success('Foto Recognition deleted successfully.');

        return redirect(route('fotoRecognitions.index'));
    }
}
