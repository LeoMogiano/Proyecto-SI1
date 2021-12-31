<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Models\servicio_venta;
use App\Models\tipoServicio;
use App\Models\venta;
use Illuminate\Http\Request;

class dservicioController extends Controller
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
        /* servicio=servicio::find($request->servicio_id); */
        
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
        $venta->montoTotal+=$dservicio->precio_tot;
        $venta->save();

        /* $factura=factura::find($request->venta_id);
        $factura->monTotal=$venta->montoTotal;
        $factura->save(); */
        
        return redirect()->route('ventas.show',$request->venta_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios=servicio::all();
        $tservicios=tipoServicio::all();
        $venta_id=$id;
        return view('dservicios.create',compact('servicios','venta_id','tservicios'));
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
