<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAuditoriapedidoRequest;
use App\Http\Requests\V1\UpdateAuditoriapedidoRequest;
use App\Http\Resources\V1\AuditoriapedidoCollection;
use App\Http\Resources\V1\AuditoriapedidoResource;
use App\Models\Auditoriapedido;

class AuditoriapedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AuditoriapedidoCollection(Auditoriapedido::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreAuditoriapedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuditoriapedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auditoriapedido  $auditoriapedido
     * @return \Illuminate\Http\Response
     */
    public function show(Auditoriapedido $auditoriapedido)
    {
        return new AuditoriapedidoResource($auditoriapedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateAuditoriapedidoRequest  $request
     * @param  \App\Models\Auditoriapedido  $auditoriapedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuditoriapedidoRequest $request, Auditoriapedido $auditoriapedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auditoriapedido  $auditoriapedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditoriapedido $auditoriapedido)
    {
        //
    }
}
