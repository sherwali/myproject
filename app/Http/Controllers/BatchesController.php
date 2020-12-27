<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatchesRequest;
use App\Http\Requests\UpdateBatchesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Batches;
use Illuminate\Http\Request;
use Flash;
use Response;

class BatchesController extends AppBaseController
{
    /**
     * Display a listing of the Batches.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Batches $batches */
        $batches = Batches::all();

        return view('batches.index')
            ->with('batches', $batches);
    }

    /**
     * Show the form for creating a new Batches.
     *
     * @return Response
     */
    public function create()
    {
        return view('batches.create');
    }

    /**
     * Store a newly created Batches in storage.
     *
     * @param CreateBatchesRequest $request
     *
     * @return Response
     */
    public function store(CreateBatchesRequest $request)
    {
        $input = $request->all();

        /** @var Batches $batches */
        $batches = Batches::create($input);

        Flash::success('Batches saved successfully.');

        return redirect(route('batches.index'));
    }

    /**
     * Display the specified Batches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Batches $batches */
        $batches = Batches::find($id);

        if (empty($batches)) {
            Flash::error('Batches not found');

            return redirect(route('batches.index'));
        }

        return view('batches.show')->with('batches', $batches);
    }

    /**
     * Show the form for editing the specified Batches.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Batches $batches */
        $batches = Batches::find($id);

        if (empty($batches)) {
            Flash::error('Batches not found');

            return redirect(route('batches.index'));
        }

        return view('batches.edit')->with('batches', $batches);
    }

    /**
     * Update the specified Batches in storage.
     *
     * @param int $id
     * @param UpdateBatchesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBatchesRequest $request)
    {
        /** @var Batches $batches */
        $batches = Batches::find($id);

        if (empty($batches)) {
            Flash::error('Batches not found');

            return redirect(route('batches.index'));
        }

        $batches->fill($request->all());
        $batches->save();

        Flash::success('Batches updated successfully.');

        return redirect(route('batches.index'));
    }

    /**
     * Remove the specified Batches from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Batches $batches */
        $batches = Batches::find($id);

        if (empty($batches)) {
            Flash::error('Batches not found');

            return redirect(route('batches.index'));
        }

        $batches->delete();

        Flash::success('Batches deleted successfully.');

        return redirect(route('batches.index'));
    }
}
