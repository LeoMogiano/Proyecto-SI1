<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Models\tipoServicio;
use Illuminate\Http\Request;

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
        $request->validate([
            'Id:tp' => 'required|unique:servicios'
        ]);
        $servicio=new servicio();
        $servicio->descripción=$request->input('descripción');
        $servicio->precio=$request->input('precio');
        $servicio->Id_tp=$request->input('Id_tp');
        $servicio->save();
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
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
}
