<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSektorAPIRequest;
use App\Http\Requests\API\UpdateSektorAPIRequest;
use App\Models\Sektor;
use App\Repositories\SektorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SektorController
 * @package App\Http\Controllers\API
 */

class SektorAPIController extends AppBaseController
{
    /** @var  SektorRepository */
    private $sektorRepository;

    public function __construct(SektorRepository $sektorRepo)
    {
        $this->sektorRepository = $sektorRepo;
    }

    /**
     * Display a listing of the Sektor.
     * GET|HEAD /sektors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sektors = $this->sektorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sektors->toArray(), 'Sektors retrieved successfully');
    }

    /**
     * Store a newly created Sektor in storage.
     * POST /sektors
     *
     * @param CreateSektorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSektorAPIRequest $request)
    {
        $input = $request->all();

        $sektor = $this->sektorRepository->create($input);

        return $this->sendResponse($sektor->toArray(), 'Sektor saved successfully');
    }

    /**
     * Display the specified Sektor.
     * GET|HEAD /sektors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sektor $sektor */
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            return $this->sendError('Sektor not found');
        }

        return $this->sendResponse($sektor->toArray(), 'Sektor retrieved successfully');
    }

    /**
     * Update the specified Sektor in storage.
     * PUT/PATCH /sektors/{id}
     *
     * @param int $id
     * @param UpdateSektorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSektorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sektor $sektor */
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            return $this->sendError('Sektor not found');
        }

        $sektor = $this->sektorRepository->update($input, $id);

        return $this->sendResponse($sektor->toArray(), 'Sektor updated successfully');
    }

    /**
     * Remove the specified Sektor from storage.
     * DELETE /sektors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sektor $sektor */
        $sektor = $this->sektorRepository->find($id);

        if (empty($sektor)) {
            return $this->sendError('Sektor not found');
        }

        $sektor->delete();

        return $this->sendSuccess('Sektor deleted successfully');
    }
}
