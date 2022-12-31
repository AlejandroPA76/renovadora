<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $listPedidos = Pedido::orderBy('created_at','desc')->get();
       
        
       return view('pedidos.index', compact('listPedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('pedidos.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPedido = new Pedido;
        $newPedido->nombre = $request->input('name');
        $newPedido->cant_zap = $request->input('czapato');
        $newPedido->precio = $request->input('price');
        $newPedido->abono = $request->input('abono');
        $newPedido->restante = $request->input('price') - $request->input('abono');
        $newPedido->entrega= $request->input('fechaE'). " ". $request->input('time').":00";

        $newPedido->tel = $request->input('tel');
        $newPedido->status = $request->input('status');
        $newPedido->descripcion = $request->input('description');
        $newPedido->save();

        return redirect("/pedidos");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $sPedido = Pedido::find($pedido->id);
        //convertimos el timestand 
        //en fecha y hora por separado
        $fecha = strftime("%d/%m/%Y", strtotime($sPedido->entrega));
        $hora =  strftime("%H:%M:%S",strtotime($sPedido->entrega));

        return view('pedidos.show',compact('sPedido','fecha','hora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $upPedido =Pedido::find($pedido->id);
        $upPedido->status = $request->input('status');
        $upPedido->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $delP = Pedido::find($pedido->id);
        $delP->delete();
        return redirect('');
    }

    
}
