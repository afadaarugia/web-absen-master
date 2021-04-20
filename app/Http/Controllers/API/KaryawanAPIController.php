<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKaryawanAPIRequest;
use App\Http\Requests\API\UpdateKaryawanAPIRequest;
use App\Models\Karyawan;
use App\Repositories\KaryawanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

/**
 * Class KaryawanController
 * @package App\Http\Controllers\API
 */

class KaryawanAPIController extends AppBaseController
{
    /** @var  KaryawanRepository */
    private $karyawanRepository;

    public function __construct(KaryawanRepository $karyawanRepo)
    {
        $this->karyawanRepository = $karyawanRepo;
    }

    /**
     * Display a listing of the Karyawan.
     * GET|HEAD /karyawans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //  $karyawans = $this->karyawanRepository->findWhere([
        //     'users_id'=>Auth::user()->id
        //     ]);

        $karyawans = Karyawan::where('users_id',Auth::user()->id)->with(
            'agamas',
            'units',
            'statuses',
            'golDarahs',
            'namePosisions',
            'pendidikans',
            'sektors',
            'banks'
            )->get();

        return $this->sendResponse($karyawans, 'Karyawans retrieved successfully');
    }

    /**
     * Store a newly created Karyawan in storage.
     * POST /karyawans
     *
     * @param CreateKaryawanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKaryawanAPIRequest $request)
    {
        $input = $request->all();

        $karyawan = $this->karyawanRepository->create($input);

        return $this->sendResponse($karyawan->toArray(), 'Karyawan saved successfully');
    }

    /**
     * Display the specified Karyawan.
     * GET|HEAD /karyawans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Karyawan $karyawan */
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            return $this->sendError('Karyawan not found');
        }

        return $this->sendResponse($karyawan->toArray(), 'Karyawan retrieved successfully');
    }

    /**
     * Update the specified Karyawan in storage.
     * PUT/PATCH /karyawans/{id}
     *
     * @param int $id
     * @param UpdateKaryawanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKaryawanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Karyawan $karyawan */
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            return $this->sendError('Karyawan not found');
        }

        $karyawan = $this->karyawanRepository->update($input, $id);

        return $this->sendResponse($karyawan->toArray(), 'Karyawan updated successfully');
    }

    /**
     * Remove the specified Karyawan from storage.
     * DELETE /karyawans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Karyawan $karyawan */
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            return $this->sendError('Karyawan not found');
        }

        $karyawan->delete();

        return $this->sendSuccess('Karyawan deleted successfully');
    }
}
