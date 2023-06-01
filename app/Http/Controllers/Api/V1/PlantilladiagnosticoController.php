<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Plantilladiagnostico;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePlantilladiagnosticoRequest;
use App\Http\Requests\V1\UpdatePlantilladiagnosticoRequest;
use Illuminate\Http\Request;

class PlantilladiagnosticoController extends Controller
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
            if (array_key_exists('usuario', $query)) {
                $plantillas = Plantilladiagnostico::whereNombreusuario($query['usuario'])->get();
                return response()->json([
                    'status' => true,
                    'plantillas' => $plantillas
                ]);
            }
            else {
                return response()->json([
                    'status' => false,
                    'mensaje' => "falta el usuario"
                ]);
            }
        }
        else {
            return response()->json([
                'status' => false,
                'mensaje' => "falta el usuario"
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
     * @param  \App\Http\Requests\StorePlantilladiagnosticoRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePlantilladiagnosticoRequest $request)
    {
        $plantilla = Plantilladiagnostico::create($request->all());
        return response()->json([
            'message' => "Product saved successfully!",
            'data' => $plantilla
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantilladiagnostico  $plantilladiagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(Plantilladiagnostico $plantilladiagnostico)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantilladiagnosticoRequest  $request
     * @param  \App\Models\Plantilladiagnostico  $plantilladiagnostico
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePlantilladiagnosticoRequest $request, Plantilladiagnostico $plantilladiagnostico)
    {
        //
        $plantilladiagnostico->update($request->all());

        return response()->json([
            'message' => "Product updated successfully!",
            'plantilla' => $plantilladiagnostico
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plantilladiagnostico  $plantilladiagnostico
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Plantilladiagnostico $plantilladiagnostico)
    {
        $plantilladiagnostico->delete();
        return response()->json([
            'message' => "Product deleted successfully!",
        ], 200);
    }
}
