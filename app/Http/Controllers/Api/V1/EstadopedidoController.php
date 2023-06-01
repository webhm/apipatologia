<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreEstadopedidoRequest;
use App\Http\Requests\V1\UpdateEstadopedidoRequest;
use App\Http\Resources\V1\EstadopedidoCollection;
use App\Http\Resources\V1\EstadopedidoResource;
use App\Models\Estadopedido;

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
}
