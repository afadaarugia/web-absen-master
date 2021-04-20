<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJamKerjaRequest;
use App\Http\Requests\UpdateJamKerjaRequest;
use App\Repositories\JamKerjaRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class JamKerjaController extends AppBaseController
{
    /** @var  JamKerjaRepository */
    private $jamKerjaRepository;

    public function __construct(JamKerjaRepository $jamKerjaRepo)
    {
        $this->jamKerjaRepository = $jamKerjaRepo;
    }

    /**
     * Display a listing of the JamKerja.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jamKerjas = $this->jamKerjaRepository->all();

        return view('jam_kerjas.index')
            ->with('jamKerjas', $jamKerjas);
    }

    /**
     * Show the form for creating a new JamKerja.
     *
     * @return Response
     */
    public function create()
    {
        return view('jam_kerjas.create');
    }

    /**
     * Store a newly created JamKerja in storage.
     *
     * @param CreateJamKerjaRequest $request
     *
     * @return Response
     */
    public function store(CreateJamKerjaRequest $request)
    {
        $input = $request->all();

        $input['jam_awal']=Carbon::createFromFormat('Y-m-d\TH:i', $input['jam_awal'])->toDateTimeString();
        $input['jam_akhir']=Carbon::createFromFormat('Y-m-d\TH:i', $input['jam_akhir'])->toDateTimeString();

        $jamKerja = $this->jamKerjaRepository->create($input);

        Flash::success('Jam Kerja saved successfully.');

        return redirect(route('jamKerjas.index'));
    }

    /**
     * Display the specified JamKerja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jamKerja = $this->jamKerjaRepository->find($id);

        if (empty($jamKerja)) {
            Flash::error('Jam Kerja not found');

            return redirect(route('jamKerjas.index'));
        }

        return view('jam_kerjas.show')->with('jamKerja', $jamKerja);
    }

    /**
     * Show the form for editing the specified JamKerja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jamKerja = $this->jamKerjaRepository->find($id);

        if (empty($jamKerja)) {
            Flash::error('Jam Kerja not found');

            return redirect(route('jamKerjas.index'));
        }

        return view('jam_kerjas.edit')->with('jamKerja', $jamKerja);
    }

    /**
     * Update the specified JamKerja in storage.
     *
     * @param int $id
     * @param UpdateJamKerjaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJamKerjaRequest $request)
    {
        $jamKerja = $this->jamKerjaRepository->find($id);

        $input = $request->all();

        $input['jam_awal']=Carbon::createFromFormat('Y-m-d\TH:i', $input['jam_awal'])->toDateTimeString();
        $input['jam_akhir']=Carbon::createFromFormat('Y-m-d\TH:i', $input['jam_akhir'])->toDateTimeString();

        if (empty($jamKerja)) {
            Flash::error('Jam Kerja not found');

            return redirect(route('jamKerjas.index'));
        }

        $jamKerja = $this->jamKerjaRepository->update($input, $id);

        Flash::success('Jam Kerja updated successfully.');

        return redirect(route('jamKerjas.index'));
    }

    /**
     * Remove the specified JamKerja from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jamKerja = $this->jamKerjaRepository->find($id);

        if (empty($jamKerja)) {
            Flash::error('Jam Kerja not found');

            return redirect(route('jamKerjas.index'));
        }

        $this->jamKerjaRepository->delete($id);

        Flash::success('Jam Kerja deleted successfully.');

        return redirect(route('jamKerjas.index'));
    }
}
