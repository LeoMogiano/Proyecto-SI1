<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\factura;
use App\Models\marca;
use App\Models\modelo;
use App\Models\producto;
use App\Models\User;
use App\Models\venta;
use App\Models\venta_producto;
use Illuminate\Http\Request;

class frontVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        if ($request->cantidad > $producto->stock) {
            return redirect()->back()->with("error","No se cuenta con el stock requerido");
        }
        $dventa=new venta_producto();
        $dventa->venta_id=$request->venta_id;
        $dventa->producto_id=$request->producto_id;
        $dventa->cantidad=$request->cantidad;
        $precio=producto::find($request->producto_id)->precio;
        $dventa->precio_tot=$request->cantidad*$precio;
        if (!$request->descuento) {
            $dventa->descuento=0;
        } else {
            $dventa->descuento=$request->descuento;
            $nuevo_precio=$dventa->precio_tot*($dventa->descuento/100);
            $dventa->precio_tot-=$nuevo_precio;
           
        }
        $dventa->save();
      
        $producto->stock-=$dventa->cantidad;
        $producto->save();
        $venta=venta::find($request->venta_id);
        $venta->montoTotal+=$dventa->precio_tot;
        $venta->save();
        /* $idventax=$request->venta_id; */
        /* $venta = venta::all();
        $User = User::all();
        $productos=producto::all();
        $modelos=modelo::all();
        $marcas=marca::all();
        $categorias=categoria::all(); */
        return redirect()->route('front.edit',$request->venta_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=producto::all();
        $venta_id=$id;
        return view('welcome',compact('producto','venta_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
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
