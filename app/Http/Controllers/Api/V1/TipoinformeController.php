<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreTipoinformeRequest;
use App\Http\Requests\V1\UpdateTipoinformeRequest;
use App\Models\Tipoinforme;

class TipoinformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreTipoinformeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoinformeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipoinforme  $tipoinforme
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoinforme $tipoinforme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateTipoinformeRequest  $request
     * @param  \App\Models\Tipoinforme  $tipoinforme
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoinformeRequest $request, Tipoinforme $tipoinforme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipoinforme  $tipoinforme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoinforme $tipoinforme)
    {
        //
    }
}
