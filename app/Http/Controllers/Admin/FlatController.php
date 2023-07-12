<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FlatDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlatCreateRequest;
use App\Models\Flat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Response;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FlatDataTable $dataTable)
    {
        return $dataTable->render('admin.flat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.flat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlatCreateRequest $request): RedirectResponse
    {
        Flat::create($request->validated());

        return to_route('admin.flat.index');
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
