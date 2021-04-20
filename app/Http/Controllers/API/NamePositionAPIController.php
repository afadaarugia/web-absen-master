<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNamePositionAPIRequest;
use App\Http\Requests\API\UpdateNamePositionAPIRequest;
use App\Models\NamePosition;
use App\Repositories\NamePositionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NamePositionController
 * @package App\Http\Controllers\API
 */

class NamePositionAPIController extends AppBaseController
{
    /** @var  NamePositionRepository */
    private $namePositionRepository;

    public function __construct(NamePositionRepository $namePositionRepo)
    {
        $this->namePositionRepository = $namePositionRepo;
    }

    /**
     * Display a listing of the NamePosition.
     * GET|HEAD /namePositions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $namePositions = $this->namePositionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($namePositions->toArray(), 'Name Positions retrieved successfully');
    }

    /**
     * Store a newly created NamePosition in storage.
     * POST /namePositions
     *
     * @param CreateNamePositionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNamePositionAPIRequest $request)
    {
        $input = $request->all();

        $namePosition = $this->namePositionRepository->create($input);

        return $this->sendResponse($namePosition->toArray(), 'Name Position saved successfully');
    }

    /**
     * Display the specified NamePosition.
     * GET|HEAD /namePositions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NamePosition $namePosition */
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            return $this->sendError('Name Position not found');
        }

        return $this->sendResponse($namePosition->toArray(), 'Name Position retrieved successfully');
    }

    /**
     * Update the specified NamePosition in storage.
     * PUT/PATCH /namePositions/{id}
     *
     * @param int $id
     * @param UpdateNamePositionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNamePositionAPIRequest $request)
    {
        $input = $request->all();

        /** @var NamePosition $namePosition */
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            return $this->sendError('Name Position not found');
        }

        $namePosition = $this->namePositionRepository->update($input, $id);

        return $this->sendResponse($namePosition->toArray(), 'NamePosition updated successfully');
    }

    /**
     * Remove the specified NamePosition from storage.
     * DELETE /namePositions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NamePosition $namePosition */
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            return $this->sendError('Name Position not found');
        }

        $namePosition->delete();

        return $this->sendSuccess('Name Position deleted successfully');
    }
}
