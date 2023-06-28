<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Plantillamacroscopica;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePlantillamacroscopicaRequest;
use App\Http\Requests\V1\UpdatePlantillamacroscopicaRequest;
use Illuminate\Http\Request;

class PlantillamacroscopicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = $request->query();
        if (isset($query)) {
//            if (array_key_exists('usuario', $query)) {
//                $plantillas = Plantillamacroscopica::whereNombreusuario($query['usuario'])->get();
                $plantillas = Plantillamacroscopica::all();
                return response()->json([
                    'status' => true,
                    'plantillas' => $plantillas
                ]);
//            }
//            else {
//                return response()->json([
//                    'status' => false,
//                    'mensaje' => "falta el usuario"
//                ]);
//            }
        }
        else {
            return response()->json([
                'status' => false,
                'mensaje' => "faltan datos"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlantillamacroscopicaRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePlantillamacroscopicaRequest $request)
    {
        $plantilla = Plantillamacroscopica::create($request->all());
        return response()->json([
            'message' => "Plantilla saved successfully!",
            'data' => $plantilla
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantillamacroscopica  $plantillamacroscopica
     * @return \Illuminate\Http\Response
     */
    public function show(Plantillamacroscopica $plantillamacroscopica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantillamacroscopica  $plantillamacroscopica
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantillamacroscopica $plantillamacroscopica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantillamacroscopicaRequest  $request
     * @param  \App\Models\Plantillamacroscopica  $plantillamacroscopica
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePlantillamacroscopicaRequest $request, Plantillamacroscopica $plantillamacroscopica)
    {
        $plantillamacroscopica->update($request->all());
        return response()->json([
            'message' => "Plantilla updated successfully!",
            'plantilla' => $plantillamacroscopica
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantillamacroscopica  $plantillamacroscopica
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Plantillamacroscopica $plantillamacroscopica)
    {
        $plantillamacroscopica->delete();
        return response()->json([
            'message' => "Plantilla deleted successfully!",
        ], 200);
    }
}
