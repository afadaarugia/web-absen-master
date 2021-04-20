<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUnitAPIRequest;
use App\Http\Requests\API\UpdateUnitAPIRequest;
use App\Models\Unit;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UnitController
 * @package App\Http\Controllers\API
 */

class UnitAPIController extends AppBaseController
{
    /** @var  UnitRepository */
    private $unitRepository;

    public function __construct(UnitRepository $unitRepo)
    {
        $this->unitRepository = $unitRepo;
    }

    /**
     * Display a listing of the Unit.
     * GET|HEAD /units
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $units = $this->unitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($units->toArray(), 'Units retrieved successfully');
    }

    /**
     * Store a newly created Unit in storage.
     * POST /units
     *
     * @param CreateUnitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUnitAPIRequest $request)
    {
        $input = $request->all();

        $unit = $this->unitRepository->create($input);

        return $this->sendResponse($unit->toArray(), 'Unit saved successfully');
    }

    /**
     * Display the specified Unit.
     * GET|HEAD /units/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            return $this->sendError('Unit not found');
        }

        return $this->sendResponse($unit->toArray(), 'Unit retrieved successfully');
    }

    /**
     * Update the specified Unit in storage.
     * PUT/PATCH /units/{id}
     *
     * @param int $id
     * @param UpdateUnitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            return $this->sendError('Unit not found');
        }

        $unit = $this->unitRepository->update($input, $id);

        return $this->sendResponse($unit->toArray(), 'Unit updated successfully');
    }

    /**
     * Remove the specified Unit from storage.
     * DELETE /units/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Unit $unit */
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            return $this->sendError('Unit not found');
        }

        $unit->delete();

        return $this->sendSuccess('Unit deleted successfully');
    }
}
