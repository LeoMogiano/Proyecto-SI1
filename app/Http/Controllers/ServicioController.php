<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Models\tipoServicio;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicio = servicio::all();
        $tservicio = tipoServicio::all();
        return view('servicios.index',compact('servicio','tservicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tservicio = tipoServicio::all();
        return view('servicios.create',compact('tservicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $servicio=new servicio();
        $servicio->descripción=$request->input('descripción');
        $servicio->precio=$request->input('precio');
        $servicio->url=$request->input('url');
        $servicio->Id_tp=$request->input('Id_tp');
        $servicio->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Servicios')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $servicio->id;
        $lastActivity->save();
        return redirect()->route('servicios.index',$servicio);
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
        $servicio=servicio::findOrFail($id);
        $tservicio = tipoServicio::all();
        return view('servicios.edit',compact('servicio','tservicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicio $servicio)
    {
       
        $servicio ->update($request->all());
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Servicios')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $servicio->id;
        $lastActivity->save();
        return redirect()->route('servicios.index',$servicio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio=servicio::findOrFail($id);
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Servicios')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $servicio->id;
        $lastActivity->save();
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
