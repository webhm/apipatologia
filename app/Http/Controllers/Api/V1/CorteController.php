<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCorteRequest;
use App\Http\Requests\V1\UpdateCorteRequest;
use App\Models\Corte;

class CorteController extends Controller
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
     * @param  \App\Http\Requests\V1\StoreCorteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCorteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function show(Corte $corte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateCorteRequest  $request
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCorteRequest $request, Corte $corte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corte $corte)
    {
        //
    }

    /**
     * Obtiene nuevo secuencial.
     *
     * @return \Illuminate\Http\Response
     */
    public function generarsecuencial($letra, $idinforme)
    {
        $secuencial = Corte::select('consecutivo')
            ->whereLetraAndinformeId($letra, $idinforme)
            ->orderBy('consecutivo', 'desc')
            ->first();
        $numero = 1;
        if ($secuencial) {
            $numero = $secuencial->consecutivo + 1;
        }
        return ['consecutivo' => $numero];
    }
}
