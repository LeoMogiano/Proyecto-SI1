<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\modelo;
use App\Models\producto;
use App\Models\User;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        return view('ventas.create',compact('producto'));
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
        $venta->montoTotal=$request->input('montoTotal');
        $venta->Id_us=$request->input('Id_us');
        $venta->save();
        return redirect()->route('ventas.index',$venta);
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
        return view('ventas.show',compact('venta','productos','productoos','categorias','modelos'));
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
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}