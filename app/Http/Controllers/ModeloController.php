<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Models\modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelo = modelo::all();
        $marca = marca::all();
        return view('modelos.index',compact('modelo','marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = marca::all();
        return view('modelos.create',compact('marca'));
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
            'nombre' => 'required|unique:modelos'
        ]);
        $modelo=new modelo();
        $modelo->nombre=$request->input('nombre');
        $modelo->Id_marca=$request->input('marca');
        $modelo->save();
        return redirect()->route('modelos.index',$modelo);
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
        $modelo=modelo::findOrFail($id);
        $marca = marca::all();
        return view('modelos.edit',compact('modelo','marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelo $modelo)
    {
        $request->validate([
            'nombre' => "required|unique:modelos,nombre,$modelo->id"
        ]);
        $modelo ->update($request->all());
        return redirect()->route('modelos.index',$modelo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelo=modelo::findOrFail($id);
        $modelo->delete();
        return redirect()->route('modelos.index');
    }
}
