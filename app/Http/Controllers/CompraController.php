<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\compra;
use App\Models\modelo;
use App\Models\producto;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

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
        $proveedor = proveedor::all();
        return view('compras.create',compact('proveedor'));
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
        $compra->costoTotal=0;
        $compra->Id_prov=$request->input('Id_prov');
        $compra->save();
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Compras')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $compra->id;
        $lastActivity->save();

       
        return redirect()->route('dcompras.show',$compra);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra=compra::findOrFail($id);
        $productos=producto::all();
        $productoos=DB::table('producto_compras')->where('compra_id',$compra->id)->get();
        $categorias=categoria::all();
        $modelos=modelo::all();
        return view('compras.show',compact('compra','productos','productoos','categorias','modelos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = proveedor::all();
        $compra=compra::findOrFail($id);
        return view('compras.edit',compact('compra','proveedor'));
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
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Compras')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $compra->id;
        $lastActivity->save();
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
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Compras')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $compra->id;
        $lastActivity->save();
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
