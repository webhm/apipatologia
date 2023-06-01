<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreMuestraRequest;
use App\Http\Requests\V1\UpdateMuestraRequest;
use App\Http\Resources\V1\MuestraCollection;
use App\Http\Resources\V1\MuestraResource;
use App\Models\Muestra;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    /**
     * Obtiene nuevo secuencial.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenersecuencial()
    {
        $secuencial = Muestra::select('id')->orderBy('id', 'desc')->first();
        if (!$secuencial) {
            $secuencial = ['id'=>0];
        }
        return $secuencial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query();
        if (isset($query)) {
            if (array_key_exists('muestraid', $query)){
                return new MuestraCollection(Muestra::whereId($query['muestraid'])
                    ->orderBy('id')
                    ->get());
            } elseif (array_key_exists('nopedidomv', $query)) {
                return new MuestraCollection(Muestra::whereNopedidomv($query['nopedidomv'])
                    ->orderBy('id')
                    ->get());
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreMuestraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMuestraRequest $request)
    {
        //Task::create($request->validated());
        return new MuestraResource(Muestra::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function show(Muestra $muestra)
    {
        return new MuestraResource($muestra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateMuestraRequest  $request
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMuestraRequest $request, Muestra $muestra)
    {
        $muestra->update($request->all());
        $query = $request->query();
        if (isset($query)) {
            return new MuestraCollection(Muestra::Where('nopedidomv', '=', $query['nopedidomv'])->get());
        } else {
            return new MuestraCollection(Muestra::all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muestra $muestra)
    {
        //
    }
}
