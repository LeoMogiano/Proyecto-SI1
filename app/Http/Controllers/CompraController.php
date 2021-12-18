<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = compra::all();
        $proveedor = proveedor::all();
        return view('compras.index',compact('compra','proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $compra=new compra();
        /* $compra->Nro_c=$request->input('Nro_c'); */
        $compra->Fecha_c=$request->input('Fecha_c');
        $compra->costoTotal=$request->input('costoTotal');
        $compra->Id_prov=$request->input('Id_prov');
        $compra->save();
        return redirect()->route('compras.index',$compra);
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
        $compra=compra::findOrFail($id);
        return view('compras.edit',compact('compra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compra $compra)
    {
        
        $compra ->update($request->all());
        return redirect()->route('compras.index',$compra);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra=compra ::findOrFail($id);
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
