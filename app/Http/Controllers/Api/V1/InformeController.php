<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreInformeRequest;
use App\Http\Requests\V1\UpdateInformeRequest;
use App\Http\Resources\V1\InformeCollection;
use App\Http\Resources\V1\InformeResource;
use App\Models\Informe;
use App\Models\Corte;
use Illuminate\Http\Request;

class InformeController extends Controller
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
            return new InformeCollection(Informe::whereNopedidomv($query['nopedidomv'])
                ->orderBy('id')
                ->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreInformeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInformeRequest $request)
    {
        $informe = Informe::create($request->all());
        $informe->muestras()->sync($request['muestrasenviadas']);
        foreach ($request['cortes'] as $corteItem) {
            $corte = array(
                "informe_id" => $informe['id'],
                "codigocorte" => $corteItem['codigocorte'],
                "letra" => $corteItem['letra'],
                "consecutivo" => $corteItem['consecutivo'],
                "descripcion" => $corteItem['descripcion'],
            );
            Corte::create($corte);
        }
        return new InformeResource($informe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        return new InformeResource($informe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateInformeRequest  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInformeRequest $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        //
    }

    /**
     * Obtiene nuevo secuencial.
     *
     * @return \Illuminate\Http\Response
     */
    public function generarsecuencial($year, $idtipoinforme)
    {
        $secuencial = Informe::select('secuencial')
            ->whereYearAndIdtipoinforme($year, $idtipoinforme)
            ->orderBy('id', 'desc')
            ->first();
        $numero = 1;
        if ($secuencial) {
            $numero = $secuencial->secuencial + 1;
        }
        return ['secuencialinforme' => strval($numero)."-".strval($year),
                'consecutivo' => $numero];
    }
}
