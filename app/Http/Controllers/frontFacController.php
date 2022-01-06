<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\producto;
use App\Models\servicio;
use App\Models\tipoServicio;
use App\Models\User;
use App\Models\venta;
use App\Models\venta_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class frontFacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $User = Auth::user()->id;
        $venta=venta::where('Id_us',$User)->get();
        $factura=factura::all();
        
        /* $venta=venta::where('Id_us',$User->id)->first();
        $factura=factura::where('Id_venta',$venta->id)->first(); */
        return view('pay.index',compact('User','venta','factura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = venta::all();
        $User = User::all();
        $servicios=servicio::all();
        $tservicios=tipoServicio::all();
        return view('fserv.index',compact('servicios','tservicios','venta','User'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta=venta::findOrFail($request->venta_id);
        $factura= new factura();
        $factura->Nro_aut=Rand(1,100000);
        $factura->Fecha_f= $venta->Fecha_v;
        $factura->nit= $request->nit;
        $factura->monTotal=$venta->montoTotal;
        $factura->Id_venta=$venta->id;
        $factura->save();
        activity()->useLog('Factura')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $factura->id;
        $lastActivity->save();
        $producto=producto::all();
        $factura=factura::all();
        $servicio=servicio::all();
       /*  añadir los models y mandarle a welcome */
        return view('welcome', compact('producto','factura','servicio'));
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
        //
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
        $ventap=venta_producto::where('id',$id)->first();
        $venta=venta::where('id',$ventap->venta_id)->first();
        $venta->montoTotal-=$ventap->precio_tot;
        $venta->save();
        $ventap->delete();
        return redirect()->route('front.show',$venta);
    }
}
