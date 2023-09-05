<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEstadopedidoRequest;
use App\Http\Requests\V1\UpdateEstadopedidoRequest;
use App\Http\Requests\V1\UpdateInformeRequest;
use App\Http\Resources\V1\EstadopedidoCollection;
use App\Http\Resources\V1\EstadopedidoResource;
use App\Models\Corte;
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
        $input = $request->all();
        var_dump($input); exit(); print_r();

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
}
