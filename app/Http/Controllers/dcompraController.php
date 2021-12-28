<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\producto;
use App\Models\producto_compra;
use Illuminate\Http\Request;

class dcompraController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=producto::find($request->producto_id);
        $dcompra=new producto_compra();
        $dcompra->compra_id=$request->compra_id;
        $dcompra->producto_id=$request->producto_id;
        $dcompra->cantidad=$request->cantidad;
        $precio=producto::find($request->producto_id)->precio;
        $dcompra->precio_tot=$request->cantidad*$precio;
        $dcompra->save();
      
        $producto->stock+=$dcompra->cantidad;
        $producto->save();
        $compra=compra::find($request->compra_id);
        $compra->costoTotal+=$dcompra->precio_tot;
        $compra->save();
        
        return redirect()->route('compras.show',$request->compra_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos=producto::all();
        $compra_id=$id;
        return view('dcompras.create',compact('productos','compra_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
