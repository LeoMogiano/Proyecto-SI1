<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class marcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = marca::all();
        return view('marcas.index',compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
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
            'nombre' => 'required|unique:marcas'
        ]);
        $marca = marca::create($request->all());
        return redirect()->route('marcas.index',$marca);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(marca $marca)
    {
        return view('marcas.show',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(marca $marca)
    {
        return view('marcas.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marca $marca)
    {
        $request->validate([
            'nombre' => "required|unique:marcas,nombre,$marca->id"
        ]);
        $marca ->update($request->all());
        return redirect()->route('marcas.index',$marca);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}