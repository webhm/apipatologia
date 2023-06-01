<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAsociacionExamenesRequest;
use App\Http\Requests\V1\UpdateAsociacionExamenesRequest;
use App\Http\Resources\V1\AsociacionExamenesCollection;
use App\Http\Resources\V1\AsociacionExamenesResource;
use App\Models\AsociacionExamenes;
use Illuminate\Http\Request;

class AsociacionExamenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query();
        if (isset($query)) {
            if (array_key_exists('nopedidomv', $query)){
                return new AsociacionExamenesCollection(AsociacionExamenes::Where('nopedidomv', '=', $query['nopedidomv'])->get());
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreAsociacionExamenesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsociacionExamenesRequest $request)
    {
        AsociacionExamenes::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsociacionExamenes  $asociacionExamenes
     * @return \Illuminate\Http\Response
     */
    public function show(AsociacionExamenes $asociacionExamenes)
    {
        return new AsociacionExamenesResource($asociacionExamenes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateAsociacionExamenesRequest  $request
     * @param  \App\Models\AsociacionExamenes  $asociacionExamenes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsociacionExamenesRequest $request, AsociacionExamenes $asociacionExamenes)
    {
        $asociacionExamenes->update($request->all());
        $query = $request->query();
        if (isset($query)) {
            return new AsociacionExamenesCollection(AsociacionExamenes::Where('nopedidomv', '=', $query['nopedidomv'])->get());
        } else {
            return new AsociacionExamenesCollection(AsociacionExamenes::all());
        }
    }
    /**
     * Elimina Asociación.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminarasociacion(Request $request, $id)
    {
        try {
            AsociacionExamenes::where('id', '=', $id)
                ->where('tieneinforme', '=', 0)
                ->delete();
        } catch (Exception $exception) {

        }
        $query = $request->query();
        if (isset($query)) {
            if (array_key_exists('nopedidomv', $query)){
                return new AsociacionExamenesCollection(AsociacionExamenes::Where('nopedidomv', '=', $query['nopedidomv'])->get());
            }
        }
    }
}
