<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreInformeRequest;
use App\Http\Requests\V1\UpdateInformeRequest;
use App\Http\Resources\V1\InformeCollection;
use App\Http\Resources\V1\InformeResource;
use App\Models\Informe;
use App\Models\Tipoinforme;
use App\Models\Corte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $secuencial = Informe::select('secuencial')
            ->whereYearAndIdtipoinforme($request['year'], $request['idtipoinforme'] )
            ->orderBy('id', 'desc')
            ->first();
        $numero = 1;
        if ($secuencial) {
            $numero = $secuencial->secuencial + 1;
        }

        $request['codigoinforme']  = strval($numero)."-".$request['year'];
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
        $secuencial = Informe::select('secuencial')
            ->whereYearAndIdtipoinforme($request['year'], $request['idtipoinforme'] )
            ->orderBy('id', 'desc')
            ->first();
        $numero = 1;
        if ($secuencial) {
            $numero = $secuencial->secuencial + 1;
        }
        $request['codigoinforme']  = strval($numero)."-".$request['year'];
        $request['secuencial']  = strval($numero);
        $informe->update($request->all());
        $informe->muestras()->sync($request['muestrasenviadas']);
        $informe->cortes()->delete();
        foreach ($request['cortes'] as $corteItem) {
            $corte = array(
                "informe_id" => $corteItem['informe_id'],
                "codigocorte" => $corteItem['codigocorte'],
                "letra" => $corteItem['letra'],
                "consecutivo" => $corteItem['consecutivo'],
                "descripcion" => $corteItem['descripcion'],
            );
            Corte::create($corte);
        }
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
     * Obtiene Informes Previos del Paciente.
     *
     * @return array
     */
    public function getInformesPreviosPaciente($hcpaciente)
    {
        return DB::table('INFORMES')
            ->join('TIPOINFORMES', 'INFORMES.IDTIPOINFORME', '=', 'TIPOINFORMES.ID')
            ->where('NOHISTORIACLINICAMV', $hcpaciente )
            ->orderBy('FECHADOCUMENTO', 'desc')
            ->select('INFORMES.ID', 'CODIGOINFORME', 'TIPOINFORMES.DESCRIPCION', 'FECHADOCUMENTO' , 'NOATENCIONMV')
            ->get();
    }

    /**
     * Obtiene tipos Informe.
     *
     * @return array
     */
    public function getalltipos()
    {
        return  Tipoinforme::select("ID", "DESCRIPCION", "SIGLAS")
            ->orderBy('ID', 'desc')
            ->get();
    }

    /**
     * Obtiene Diagnosticos CIE.
     *
     * @return array
     */
    public function getdiagnostiCIE()
    {
        return  DB::table("CID")->select("CD_CID as id", "DS_CID as DESCRIPCION", "CD_CID as SIGLAS")
            ->where('CD_SGRU_CID', 'LIKE', 'C%')
            ->orWhere('CD_SGRU_CID', 'LIKE' ,'D%')
            ->orderBy('CD_CID')
            ->get();
    }

    /**
     * Obtiene nuevo secuencial.
     *
     * @return array
     */
    public function generarsecuencial($year, $idtipoinforme)
    {
        $secuencial = Informe::select('secuencial')
            ->whereYearAndIdtipoinforme($year, $idtipoinforme)
            ->orderBy('secuencial', 'desc')
            ->first();
        $numero = 1;
        if ($secuencial) {
            $numero = $secuencial->secuencial + 1;
        }
        return ['secuencialinforme' => strval($numero)."-".strval($year),
                'consecutivo' => $numero];
    }

    /**
     * Actualizar estado Informe Atendido.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function finalizaInforme( $informeId)
    {
        Informe::whereId($informeId)
            ->update(['idestadopedido'=>2]) ;

        return response()->json([
            'message' => "Informe updated successfully!",
            'informe' => $informeId
        ], 200);
    }

}
