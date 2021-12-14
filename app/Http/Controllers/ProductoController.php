<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\modelo;
use App\Models\categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = producto::all();
        $categoria= categoria::all();
        $modelo = modelo::all();
        return view('productos.index',compact('producto','categoria','modelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria= categoria::all();
        $modelo = modelo::all();
        return view('productos.create',compact('categoria','modelo'));
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
            'nombre' => 'required|unique:productos'
        ]);
        $producto=new producto();
        $producto->nombre=$request->input('nombre');
        $producto->color=$request->input('color');
        $producto->precio=$request->input('precio');
        $producto->costo=$request->input('costo');
        $producto->stock=$request->input('stock');
        $producto->Id_categoria=$request->input('categoria');
        $producto->Id_modelo=$request->input('modelo');
        $producto->save();
        return redirect()->route('productos.index',$producto);
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
        $producto=producto::findOrFail($id);
        $categoria= categoria::all();
        $modelo = modelo::all();
        return view('productos.edit',compact('producto','categoria','modelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        $request->validate([
            'nombre' => "required|unique:productos,nombre,$producto->id"
        ]);
        $producto ->update($request->all());
        return redirect()->route('productos.index',$producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
