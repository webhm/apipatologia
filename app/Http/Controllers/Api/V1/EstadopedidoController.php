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

class EstadopedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function getPedidosEstados(Request $request)
    {
        $data = array(
            array(
                "CD_PRE_MED" => "520277",
                "estado" => "Confirmado",
                "color" => "#ffaa11"
            ),
            array(
                "CD_PRE_MED" => "519352",
                "estado" => "Ingresado",
                "color" => "#ffaa11"
            ),
            array(
                "CD_PRE_MED" => "519066",
                "estado" => "Parcial",
                "color" => "#ffaa11"
            ),
            array(
                "CD_PRE_MED" => "518184",
                "estado" => "Confirmado",
                "color" => "#ffaa11"
            ),
            array(
                "CD_PRE_MED" => "517288",
                "estado" => "Ingresado",
                "color" => "#ffaa11"
            ),
            array(
                "CD_PRE_MED" => "516386",
                "estado" => "Parcial",
                "color" => "#ffaa11"
            )
        );


        // return response()->json($data, 200);
        // $input = $request->all();
        //  dd($input); exit();

        $input = $request->all();
        $estados = array();
        foreach ($input as $pedido) {
            $numeroPedido = $pedido['CD_PRE_MED'];
            $chequeoEstado = Informe::select('id')
                ->where('NoPedidoMv', $numeroPedido )
                ->count();
            if ($chequeoEstado == 0) {
                $estados[] = array(
                    "pedido" => $numeroPedido,
                    "estado" => "Parcial",
                    "color" => "#ffaa11"
                ) ;
            } else {
                $estados[] =
                    array(
                        "pedido" => $numeroPedido,
                        "estado" => "Procesado",
                        "color" => "#ffaa11"
                    ) ;
            }
        }
        return response()->json($estados, 200);
        //return $estados;
    }
}
