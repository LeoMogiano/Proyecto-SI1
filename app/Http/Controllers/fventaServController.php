<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use App\Models\tipoServicio;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

//store()--> boton registrar reserva de servicio
//show()--> carrito de servicio
class fventaServController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //boton registrar reserva de servicio
    {
        $current_user= Auth::user();
        $venta=new venta();  
        $venta->Fecha_v=$request->input('Fecha_v');
        $venta->montoTotal=0;
        $venta->Id_us=$current_user->id;
        $venta->save();
        activity()->useLog('Ventas')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $venta->id;
        $lastActivity->save();

        return redirect()->route('fservicio.edit',$venta); // RECORDAR QUE TE REDIRIGE a Fservicio.edit funcion
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=venta::findOrFail($id);
        $servicios=servicio::all();
        $dservicios=DB::table('servicio_ventas')->where('venta_id',$venta->id)->get();
        $tservicios=tipoServicio::all();
       

        return view('fserv.show',compact('venta','dservicios','servicios','tservicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios=servicio::all();
        $tservicios=tipoServicio::all();
        $venta=venta::findOrFail($id);
        $venta_id=$id;
        return view('fserv.create',compact('servicios','venta_id','tservicios','venta')); 
         
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
