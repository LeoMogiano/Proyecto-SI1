<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'nombre' => 'required|unique:marcas'
        ]);
        $marca = marca::create($request->all());
        activity()->useLog('Marca')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $marca->id;
        $lastActivity->save();
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
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'nombre' => "required|unique:marcas,nombre,$marca->id"
        ]);
        $marca ->update($request->all());
        activity()->useLog('Marca')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $marca->id;
        $lastActivity->save();
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
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Marca')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $marca->id;
        $lastActivity->save();

        $marca->delete();
        return redirect()->route('marcas.index');
    }
}