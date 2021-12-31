<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\factura;
use App\Models\modelo;
use App\Models\producto;
use App\Models\servicio;
use App\Models\servicio_venta;
use App\Models\tipoServicio;
use App\Models\User;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;


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
        $producto = producto::all();
        $servicios=servicio::all();
        return view('ventas.create',compact('producto','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $venta=new venta();  
        $venta->Fecha_v=$request->input('Fecha_v');
        $venta->montoTotal=0;
        $venta->Id_us=$request->input('Id_us');
        $venta->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Ventas')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $venta->id;
        $lastActivity->save();

        
        
        return redirect()->route('dventas.show',$venta);
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
        $productos=producto::all();
        $productoos=DB::table('producto_venta')->where('venta_id',$venta->id)->get();
        $categorias=categoria::all();
        $modelos=modelo::all();

        $servicios=servicio::all();
        $dservicios=servicio_venta::where('venta_id',$venta->id)->get();
        $tservicios=tipoServicio::all();

        return view('ventas.show',compact('venta','productos','productoos','categorias','modelos','servicios','dservicios','tservicios'));
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
       
        $venta ->update($request->all());
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Ventas')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $venta->id;
        $lastActivity->save();
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

        
        /* $factura=DB::find($venta->id)->first(); */
         $factura=factura::where('Id_venta',$venta->id)->first();
        /* $material = Material::select('material.id', 'material.nombre')
        ->where('material.id', $id)
        ->first(); */
       
        if ($factura != null) {
            $factura->delete();
        }

        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Ventas')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $venta->id;
        $lastActivity->save();
        $venta->delete();
        
        
        return redirect()->route('ventas.index');
    }
}