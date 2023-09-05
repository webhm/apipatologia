<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEstadopedidoRequest;
use App\Http\Requests\V1\UpdateEstadopedidoRequest;
use App\Http\Resources\V1\EstadopedidoCollection;
use App\Http\Resources\V1\EstadopedidoResource;
use App\Models\Estadopedido;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadopedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EstadopedidoCollection
     */
    public function index()
    {
        return new EstadopedidoCollection(Estadopedido::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreEstadopedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstadopedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return EstadopedidoResource
     */
    public function show(Estadopedido $estadopedido)
    {
        return new EstadopedidoResource($estadopedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateEstadopedidoRequest  $request
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstadopedidoRequest $request, Estadopedido $estadopedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estadopedido  $estadopedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadopedido $estadopedido)
    {
        //
    }

    /**
     * Search the State of each Pedido from a collection of Pedidos.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPedidosEstados(Request $request)
    {
        $pedidos = $request->all();
        $estados = [];
        foreach ($pedidos as $pedido) {
            $noProcesado = Informe::select('id')
                ->where('NoPedidoMv', $pedido )
                ->count();
            if ($noProcesado == 0) {
                $estados[] = array(
                    "pedido" => $pedido,
                    "estado" => "Ingresado",
                    "color" => "#FF0000"
                ) ;
            } else {
                $ingresado = DB::table('INFORMES')
                    ->selectRaw('CASE
                                 WHEN COUNT(*) > 0 AND COUNT(*) = SUM(CASE WHEN IDESTADOPEDIDO = 1
                                 THEN 1 ELSE 0 END)
                                 THEN 1 ELSE 0
                                 END AS Ingresado')
                    ->where('NOPEDIDOMV', '=', strval($pedido))
                    ->get();
                if ($ingresado[0]->ingresado > 0) {
                    $estados[] = array(
                        "pedido" => $pedido,
                        "estado" => "Ingresado",
                        "color" => "#008000"
                    ) ;
                } else {
                    $parcialmenteConfirmado = DB::table('INFORMES')
                        ->selectRaw('CASE
                                     WHEN COUNT(*) > 0 THEN 1 ELSE 0
                                     END AS Parcialmente_Confirmado')
                        ->where('NOPEDIDOMV', '=', strval($pedido))
                        ->where('IDESTADOPEDIDO', '<>', 1)
                        ->get();

                    if ($parcialmenteConfirmado[0]->Parcialmente_Confirmado > 0) {
                        $estados[] = array(
                            "pedido" => $pedido,
                            "estado" => "Parcialmente Confirmado",
                            "color" => "#008080"
                        ) ;
                    } else {
                        $confirmado = DB::table('INFORMES')
                            ->selectRaw('CASE
                                         WHEN COUNT(*) > 0 AND COUNT(*) = SUM(CASE WHEN IDESTADOPEDIDO > 1 THEN 1 ELSE 0 END)
                                         THEN 1 ELSE 0
                                         END AS Confirmado')
                            ->where('NOPEDIDOMV', '=', strval($pedido))
                            ->get();

                        if ($confirmado[0]->Confirmado > 0) {
                            $estados[] = array(
                                "pedido" => $pedido,
                                "estado" => "Confirmado",
                                "color" => "#000080"
                            ) ;
                        }
                    }
                }
            }
        }
        return response()->json($estados, 200);
    }
}
