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
    public function index() // categorias.index, te lista de la base de datos, las categorias que hay
    {
        $categoria = categoria::all();// llama al model "categoria" y te trae todas las categorias de la base de datos
        return view('categorias.index',compact('categoria')); // te muestra la vista "categorias.index", pero antes de eso
    }                                                         // manda la variable categoria que contiene la inf de todas las categorias

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()// categorias.create,, solo te lleva a la vista create
    {
        return view('categorias.create'); //la vista create es usada antes de registrar una categoria
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // es el boton para registrar a la base de datos una categoria
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia

        $request->validate([
            'nombre' => 'required|unique:categorias' //Se valida el nombre en categoria para que no se repitan antes de registrar una nueva
        ]);
        $categoria = categoria::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos
        activity()->useLog('Categoria')->log('Registró')->subject(); // BITACORA
        $lastActivity=Activity::all()->last();                                      
        $lastActivity->subject_id=Categoria::all()->last()->id;
        $lastActivity->save();                                                                  

        return redirect()->route('categorias.index',$categoria); // Se redirige a la vista categoria.index
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
        return view('categorias.edit',compact('categoria')); // se retorna a la vista categorias.edit, usando como parametro una categoria
    }                                                        // para editar, pero SOLO te lleva a la vista, no lo Editá

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoria $categoria) // boton registrar
    {
        date_default_timezone_set("America/La_Paz"); // Se define zona horaria de bolivia
        $request->validate([
            'nombre' => "required|unique:categorias,nombre,$categoria->id" //se valida que no haya mas con el mismo nombre
        ]);
        $categoria ->update($request->all());           // se usa una funcion de laravel para actualizar directo mediante paramestros del model
        activity()->useLog('Categoria')->log('Editó')->subject(); // Bitacora
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $categoria->id;
        $lastActivity->save();                                   // BITACORA GUARDADA
        return redirect()->route('categorias.index',$categoria); // Te retorna a la vista categorias.index

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria) // boton eliminar
    {
        date_default_timezone_set("America/La_Paz");            //se define la zona horaria que usa Bolivia
        activity()->useLog('Categoria')->log('Eliminó')->subject(); // bitacora
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $categoria->id;
        $lastActivity->save();
        $categoria->delete();                                   // elimina categoria seleccionada por la base de datos
        
        return redirect()->route('categorias.index');           // te retorna a la vita categoria.index
    }
}
