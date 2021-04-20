<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNamePositionRequest;
use App\Http\Requests\UpdateNamePositionRequest;
use App\Repositories\NamePositionRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Level;
use Illuminate\Http\Request;
use Flash;
use Response;

class NamePositionController extends AppBaseController
{
    /** @var  NamePositionRepository */
    private $namePositionRepository;

    public function __construct(NamePositionRepository $namePositionRepo)
    {
        $this->namePositionRepository = $namePositionRepo;
    }

    /**
     * Display a listing of the NamePosition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $namePositions = $this->namePositionRepository->all();

        return view('name_positions.index')
            ->with('namePositions', $namePositions);
    }

    /**
     * Show the form for creating a new NamePosition.
     *
     * @return Response
     */
    public function create()
    {
        $Level = Level::pluck ('nama','id');

        return view('name_positions.create', compact(
            'Level'
        ));
    }

    /**
     * Store a newly created NamePosition in storage.
     *
     * @param CreateNamePositionRequest $request
     *
     * @return Response
     */
    public function store(CreateNamePositionRequest $request)
    {
        $input = $request->all();

        $namePosition = $this->namePositionRepository->create($input);

        Flash::success('Name Position saved successfully.');

        return redirect(route('namePositions.index'));
    }

    /**
     * Display the specified NamePosition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            Flash::error('Name Position not found');

            return redirect(route('namePositions.index'));
        }

        return view('name_positions.show')->with('namePosition', $namePosition);
    }

    /**
     * Show the form for editing the specified NamePosition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $namePosition = $this->namePositionRepository->find($id);
        $Level = Level::pluck ('nama','id');

        if (empty($namePosition)) {
            Flash::error('Name Position not found');

            return redirect(route('namePositions.index'));
        }

        return view('name_positions.edit',compact('namePosition','Level'));
    }

    /**
     * Update the specified NamePosition in storage.
     *
     * @param int $id
     * @param UpdateNamePositionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNamePositionRequest $request)
    {
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            Flash::error('Name Position not found');

            return redirect(route('namePositions.index'));
        }

        $namePosition = $this->namePositionRepository->update($request->all(), $id);

        Flash::success('Name Position updated successfully.');

        return redirect(route('namePositions.index'));
    }

    /**
     * Remove the specified NamePosition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $namePosition = $this->namePositionRepository->find($id);

        if (empty($namePosition)) {
            Flash::error('Name Position not found');

            return redirect(route('namePositions.index'));
        }

        $this->namePositionRepository->delete($id);

        Flash::success('Name Position deleted successfully.');

        return redirect(route('namePositions.index'));
    }
}
