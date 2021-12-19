<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = categoria::all();
        return view('categorias.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // es el boton para registrar
    {
        date_default_timezone_set("America/La_Paz");

        $request->validate([
            'nombre' => 'required|unique:categorias'
        ]);
        $categoria = categoria::create($request->all());
        activity()->useLog('Categoria')->log('Registró')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id=Categoria::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('categorias.index',$categoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria)
    {
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'nombre' => "required|unique:categorias,nombre,$categoria->id"
        ]);
        $categoria ->update($request->all());
        activity()->useLog('Categoria')->log('Editó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $categoria->id;
        $lastActivity->save();
        return redirect()->route('categorias.index',$categoria);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        date_default_timezone_set("America/La_Paz");
        activity()->useLog('Categoria')->log('Eliminó')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $categoria->id;
        $lastActivity->save();
        $categoria->delete();
        
        return redirect()->route('categorias.index');
    }
}
