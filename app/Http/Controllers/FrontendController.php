<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use App\Models\modelo;
use App\Models\producto;
use App\Models\servicio;
use App\Models\User;
use App\Models\venta;
use App\Models\venta_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

// index() --> boton para mogiWelcome
// create() --> boton producto del welcome (Vista donde se ve para registrar un pedido de producto)
//store() --> boton registrar pedido del producto ( el cual registra a la base de datos)
//show() --> boton de carrito de PRODUCTOS (VISTO, NO AÑADIR)

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // boton para mogiWelcome
    {
        return view('front.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // boton producto del welcome (Vista donde se ve para registrar un pedido de producto)
    {
        $venta = venta::all();
        $User = User::all();
        $productos=producto::all();
        $modelos=modelo::all();
        $marcas=marca::all();
        $categorias=categoria::all();
        return view('front.edit',compact('productos','modelos','marcas','categorias','venta','User'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // boton registrar pedido del producto ( el cual registra a la base de datos)
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

        return redirect()->route('front.edit',$venta); // RECORDAR que luego de registrar un producto se nos redirige a la
                                                      //funcion front.edit que esta abajo
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

        return view('front.show',compact('venta','productos','productoos','categorias','modelos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //  boton de carrito de PRODUCTOS (Vista)
    {
        $productos=producto::all();
        $modelos=modelo::all();
        $marcas=marca::all();
        $categorias=categoria::all();
        $venta=venta::findOrFail($id);
        $venta_id=$id;
         return view('front.create',compact('productos','venta_id','modelos','marcas','categorias','venta')); 
        /* return redirect()->route('front.create',compact('productos','modelos','marcas','categorias','venta')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
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
