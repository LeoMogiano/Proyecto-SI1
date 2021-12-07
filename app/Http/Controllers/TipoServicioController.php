<?php

namespace App\Http\Controllers;

use App\Models\tipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoServicio=TipoServicio::all();
        return view('tipoServicios.index',['tipoServicios'=>$tipoServicio]);
        //Uno define el "tipoServicios" en routes y creo que el que esta entre corchete es el de la base
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoServicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //es el boton de registrar
    {
        $tipoServicio=new TipoServicio();
        $tipoServicio->nombre=$request->input('nombre');
        $tipoServicio->descripción=$request->input('descripción'); 
        $tipoServicio->save();

        return redirect()->route('tipoServicios.index');
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
        $tipoServicio=TipoServicio::findOrFail($id);
        return view('tipoServicios.edit',compact('tipoServicio'));
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
        $tipoServicio=TipoServicio::findOrFail($id);
    
        $tipoServicio->nombre=$request->input('nombre');
        $tipoServicio->descripción=$request->input('descripción');
        $tipoServicio->save();
        
        return redirect()->route('tipoServicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoServicio=TipoServicio ::findOrFail($id);
        $tipoServicio->delete();

        return redirect()->route('tipoServicios.index');
    }
}
