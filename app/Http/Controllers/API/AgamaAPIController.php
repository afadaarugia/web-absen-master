<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgamaAPIRequest;
use App\Http\Requests\API\UpdateAgamaAPIRequest;
use App\Models\Agama;
use App\Repositories\AgamaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AgamaController
 * @package App\Http\Controllers\API
 */

class AgamaAPIController extends AppBaseController
{
    /** @var  AgamaRepository */
    private $agamaRepository;

    public function __construct(AgamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }

    /**
     * Display a listing of the Agama.
     * GET|HEAD /agamas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $agamas = $this->agamaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($agamas->toArray(), 'Agamas retrieved successfully');
    }

    /**
     * Store a newly created Agama in storage.
     * POST /agamas
     *
     * @param CreateAgamaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgamaAPIRequest $request)
    {
        $input = $request->all();

        $agama = $this->agamaRepository->create($input);

        return $this->sendResponse($agama->toArray(), 'Agama saved successfully');
    }

    /**
     * Display the specified Agama.
     * GET|HEAD /agamas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agama $agama */
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        return $this->sendResponse($agama->toArray(), 'Agama retrieved successfully');
    }

    /**
     * Update the specified Agama in storage.
     * PUT/PATCH /agamas/{id}
     *
     * @param int $id
     * @param UpdateAgamaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgamaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agama $agama */
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        $agama = $this->agamaRepository->update($input, $id);

        return $this->sendResponse($agama->toArray(), 'Agama updated successfully');
    }

    /**
     * Remove the specified Agama from storage.
     * DELETE /agamas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agama $agama */
        $agama = $this->agamaRepository->find($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        $agama->delete();

        return $this->sendSuccess('Agama deleted successfully');
    }
}
