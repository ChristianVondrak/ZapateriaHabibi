<?php

namespace App\Http\Controllers;

use App\Models\PedidoItem;
use App\Http\Requests\StorePedidoItemRequest;
use App\Http\Requests\UpdatePedidoItemRequest;

class PedidoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePedidoItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoItem $pedidoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoItem $pedidoItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoItemRequest  $request
     * @param  \App\Models\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoItemRequest $request, PedidoItem $pedidoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoItem  $pedidoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoItem $pedidoItem)
    {
        //
    }
}
