<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::orderBy('updated_at','DESC')->paginate(10);
        if($request){
            $search=$request->get('search');
            $pedidos=Pedido::where('id','=',$search)
                        ->orWhere('description','LIKE','%'.$search.'%')
                        ->orderBy('updated_at','DESC')
                        ->paginate(10);                   
        }
        return view('pedidos.index', compact('pedidos','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        $clientes=null;
        $cliente=null;
        if($id == 0){
        $clientes = Cliente::all();
    }else{
        $cliente=Cliente::find($id);
    }
        return view('pedidos.create', compact('clientes','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        $request->validate([
            'desc' => ['required', 'string', 'max:255']
        ]);

        $pedido = new Pedido;
        $pedido->description = $request->desc;
        $pedido->status = 'En proceso';
        $pedido->cliente_id= $request->clients;
        $pedido->save();



        return redirect(RouteServiceProvider::HOME)->with('success','Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request,$pedido_id)
    {
        $pedido = Pedido::where('id',$pedido_id)->update([
            'description' => $request->desc
        ]);

        return redirect('/pedidos')->with('success','Pedido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($pedido_id)
    {
        $pedido=Pedido::find($pedido_id)->delete();
        return redirect(RouteServiceProvider::HOME)->with('success','Pedido eliminado correctamente');
    }
}
