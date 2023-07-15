<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FlatBillingDataTable;
use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\FlatBilling;
use Illuminate\Http\Request;

class FlatBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FlatBillingDataTable $dataTable)
    {
        return $dataTable->render('admin.flat-billing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flats = Flat::all();
        return view('admin.flat-billing.create', compact('flats'));
    }

    public function getFlats(Request $request)
    {

        $flat = Flat::find($request->id);
        $previousBills = FlatBilling::select('current_month_unit', 'date')
            ->where('flat_name', $flat->flat_name)
            ->orderBy('date', 'DESC')
            ->get();

        return response(['flat' => $flat, 'previous_bill' => $previousBills]);
    }

    /**
     * @param cal_flat_name
     * @param cal_prev_unit
     * @param cal_current_unit
     * @param cal_extra_day
     */

    /**
     * TODO: Have to work on validations
     */

    function CalculateEstimateUnit(Request $request)
    {
        $baseUnit = ($request->cal_current_unit - $request->cal_prev_unit);
        $perDayUnit = ($baseUnit / (30 + $request->cal_extra_day));
        $extraUnits = $perDayUnit * $request->cal_extra_day;
        $estimateUnit = ($baseUnit - $extraUnits);

        return $estimateUnit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
