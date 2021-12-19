<?php

namespace App\Http\Controllers;

use App\Models\tipoServicio;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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
        $request->validate([
            'nombre' => 'required|unique:tipo_servicios'
        ]);
        $tipoServicio=new TipoServicio();
        $tipoServicio->nombre=$request->input('nombre');
        $tipoServicio->descripción=$request->input('descripción'); 
        $tipoServicio->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Tipo de Servicios')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $tipoServicio->id;
        $lastActivity->save();
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
    public function update(Request $request, tipoServicio $tipoServicio)
    {
        $request->validate([
            'nombre' => "required|unique:tipo_servicios,nombre,$tipoServicio->id"
        ]);
        $tipoServicio ->update($request->all());
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Tipo de Servicios')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $tipoServicio->id;
        $lastActivity->save();
        return redirect()->route('tipoServicios.index',$tipoServicio);
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
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Tipo de Servicios')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $tipoServicio->id;
        $lastActivity->save();
        $tipoServicio->delete();

        return redirect()->route('tipoServicios.index');
    }
}
