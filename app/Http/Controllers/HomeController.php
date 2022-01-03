<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\producto;
use App\Models\servicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        /* return view('home'); */
        $producto=producto::all();
        $factura=factura::all();
        $servicio=servicio::all();
        return view('welcome',compact('producto','factura','servicio'));
    }
}
