<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venta = venta::all();
        return view('ventas.index',compact('venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nro_v' => 'required|unique:ventas',
            'Fecha_v' => 'required:ventas',
            'montoTotal' => 'required:ventas',
            'Id_us' => 'required'
        ]);
        $venta = venta::create($request->all());
        return redirect()->route('ventas.index',$venta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(venta $venta)
    {
        return view('ventas.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(venta $venta)
    {
        return view('ventas.edit',compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venta $venta)
    {
        $request->validate([
            'nombre' => "required|unique:ventas,nombre,$venta->id"
        ]);
        $venta ->update($request->all());
        return redirect()->route('ventas.index',$venta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}