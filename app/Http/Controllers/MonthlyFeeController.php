<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonthlyFeeRequest;
use App\Http\Requests\UpdateMonthlyFeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\MonthlyFee;
use App\Models\Session;
use App\Models\Batches;
use Illuminate\Http\Request;
use Flash;
use Response;

class MonthlyFeeController extends AppBaseController
{
    /**
     * Display a listing of the MonthlyFee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var MonthlyFee $monthlyFees */
        $monthlyFees = MonthlyFee::all();

        return view('monthly_fees.index')
            ->with('monthlyFees', $monthlyFees);
    }

    /**
     * Show the form for creating a new MonthlyFee.
     *
     * @return Response
     */
    public function create()
    {
        $session = Session::orderBy('id', 'desc')->first();
        // dd($session->id);
        $batches = Batches::where('session_id', $session->id)->get();
        return view('monthly_fees.create',compact('batches'));
    }

    /**
     * Store a newly created MonthlyFee in storage.
     *
     * @param CreateMonthlyFeeRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyFeeRequest $request)
    {
        $input = $request->all();

        /** @var MonthlyFee $monthlyFee */
        $monthlyFee = MonthlyFee::create($input);

        Flash::success('Monthly Fee saved successfully.');

        return redirect(route('monthlyFees.index'));
    }

    /**
     * Display the specified MonthlyFee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MonthlyFee $monthlyFee */
        $monthlyFee = MonthlyFee::find($id);

        if (empty($monthlyFee)) {
            Flash::error('Monthly Fee not found');

            return redirect(route('monthlyFees.index'));
        }

        return view('monthly_fees.show')->with('monthlyFee', $monthlyFee);
    }

    /**
     * Show the form for editing the specified MonthlyFee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var MonthlyFee $monthlyFee */
        $monthlyFee = MonthlyFee::find($id);

        if (empty($monthlyFee)) {
            Flash::error('Monthly Fee not found');

            return redirect(route('monthlyFees.index'));
        }
        $session = Session::orderBy('id', 'desc')->first();
        $batches = Batches::where('session_id', $session->id)->get();

        return view('monthly_fees.edit', compact('monthlyFee','batches'));
    }

    /**
     * Update the specified MonthlyFee in storage.
     *
     * @param int $id
     * @param UpdateMonthlyFeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyFeeRequest $request)
    {
        /** @var MonthlyFee $monthlyFee */
        $monthlyFee = MonthlyFee::find($id);

        if (empty($monthlyFee)) {
            Flash::error('Monthly Fee not found');

            return redirect(route('monthlyFees.index'));
        }

        $monthlyFee->fill($request->all());
        $monthlyFee->save();

        Flash::success('Monthly Fee updated successfully.');

        return redirect(route('monthlyFees.index'));
    }

    /**
     * Remove the specified MonthlyFee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MonthlyFee $monthlyFee */
        $monthlyFee = MonthlyFee::find($id);

        if (empty($monthlyFee)) {
            Flash::error('Monthly Fee not found');

            return redirect(route('monthlyFees.index'));
        }

        $monthlyFee->delete();

        Flash::success('Monthly Fee deleted successfully.');

        return redirect(route('monthlyFees.index'));
    }
}
