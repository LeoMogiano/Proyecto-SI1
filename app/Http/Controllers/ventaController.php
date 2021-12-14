<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $User = User::all();
        return view('ventas.index',compact('venta','User'));
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
            'Nro_v' => "required|unique:ventas"
        ]);
        $venta=new venta();
        $venta->Nro_v=$request->input('Nro_v');
        $venta->Fecha_v=$request->input('Fecha_v');
        $venta->montoTotal=$request->input('montoTotal');
        $venta->Id_us=$request->input('Id_us');
        $venta->save();
        return redirect()->route('ventas.index',$venta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta=venta::findOrFail($id);
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
            'Nro_v' => "required|unique:ventas,Nro_v,$venta->id"
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
    public function destroy($id)
    {
        $venta=venta ::findOrFail($id);
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}