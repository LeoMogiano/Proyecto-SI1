<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = proveedor::all();
        return view('proveedores.index',['proveedores'=>$proveedors]);
        //Uno define el "tipoServicios" en routes y creo que el que esta entre corchete es el de la base
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
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
            'nombre' => 'required|unique:proveedores'
        ]);
        $proveedors=new proveedor();
        $proveedors->nombre=$request->input('nombre');
        $proveedors->email=$request->input('email');
        $proveedors->telefono=$request->input('telefono');
        $proveedors->ubicación=$request->input('ubicación');
        $proveedors->tiempoEstimado=$request->input('tiempoEstimado'); 
        $proveedors->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Proveedores')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $proveedors->id;
        $lastActivity->save();
        return redirect()->route('proveedores.index');
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
        $proveedors=proveedor::findOrFail($id);
        return view('proveedores.edit',['proveedores'=>$proveedors]);
    
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
        
        $proveedors=proveedor::findOrFail($id);
        
        $proveedors->nombre=$request->input('nombre');
        $proveedors->email=$request->input('email');
        $proveedors->telefono=$request->input('telefono');
        $proveedors->ubicación=$request->input('ubicación');
        $proveedors->tiempoEstimado=$request->input('tiempoEstimado'); 
        $proveedors->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Proveedores')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $proveedors->id;
        $lastActivity->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedors=proveedor::findOrFail($id);
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Proveedores')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $proveedors->id;
        $lastActivity->save();
        $proveedors->delete();

        return redirect()->route('proveedores.index');
    }
}

