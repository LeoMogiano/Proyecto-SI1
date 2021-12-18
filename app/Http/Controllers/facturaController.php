<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\venta;
use Illuminate\Http\Request;

class facturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factura= factura::all();
        $venta = venta::all();
        return view('facturas.index',compact('factura','venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura=new factura();
        $factura->Nro_aut=$request->input('Nro_aut');
        $factura->Fecha_f=$request->input('Fecha_f');
        $factura->nit=$request->input('nit');
        $factura->monTotal=$request->input('monTotal');
        $factura->Id_venta=$request->input('Id_venta');
        $factura->save();
        return redirect()->route('facturas.index',$factura);
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
        $factura=factura::findOrFail($id);
        return view('facturas.edit',compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura $factura)
    {
        $factura ->update($request->all());
        return redirect()->route('facturas.index',$factura);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura=factura ::findOrFail($id);
        $factura->delete();
        return redirect()->route('facturas.index');
    }
}
