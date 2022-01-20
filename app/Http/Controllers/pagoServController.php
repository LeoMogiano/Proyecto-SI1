<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Models\servicio_venta;
use App\Models\venta;
use Illuminate\Http\Request;

//store()--> boton añadir a carrito de (SERVICIO)
//destroy()--> boton eliminar a carrito de (SERVICIO)
class pagoServController extends Controller
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
        /* return "hola"; */
        $dservicio = new servicio_venta();
        $dservicio->venta_id=$request->venta_id;
        $dservicio->servicio_id=$request->servicio_id;
        $dservicio->cantidad=$request->cantidad;
        $precio=servicio::find($request->servicio_id)->precio;
        $dservicio->precio_tot=$request->cantidad*$precio;
        /* if (!$request->descuento) {
            $dventa->descuento=0;
        } else {
            $dventa->descuento=$request->descuento;
            $nuevo_precio=$dventa->precio_tot*($dventa->descuento/100);
            $dventa->precio_tot-=$nuevo_precio;
           
        } */
        $dservicio->save();
      
        /* $producto->stock-=$dventa->cantidad;
        $producto->save(); */
        $venta=venta::find($request->venta_id);
        $venta->montoTotal+=$dservicio->precio_tot; //TRIGGER cuando se añade a carrito el monto total se actualiza
        $venta->save();

        /* $factura=factura::find($request->venta_id);
        $factura->monTotal=$venta->montoTotal;
        $factura->save(); */
        
        
        return redirect()->route('fservicio.edit',$request->venta_id)->with("success","Se ha añadido al carrito exitosamente.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $ventap=servicio_venta::where('id',$id)->first();
        $venta=venta::where('id',$ventap->venta_id)->first();
        $venta->montoTotal-=$ventap->precio_tot;                //TRIGGER SE DISMINUYE de monto total de eliminar
        $venta->save();
        $ventap->delete();
        return redirect()->route('fservicio.show',$venta);
    }
}
