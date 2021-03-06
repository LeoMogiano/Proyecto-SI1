<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\dcompraController;
use App\Http\Controllers\dservicioController;
use App\Http\Controllers\dventaController;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\frontFacController;
use App\Http\Controllers\frontVentaController;
use App\Http\Controllers\fventaServController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ventaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\pagoServController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Models\factura;
use App\Models\producto;
use App\Models\servicio;
use App\Models\tipoServicio;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { //get-obtener una vista
   // return view('auth/register');
   /* return view('welcome'); */ /* por defecto 5/1/2021 */
   $producto=producto::all();
        $factura=factura::all();
        $servicio=servicio::all();
        $tservicio=tipoServicio::all();
        return view('welcome',compact('producto','factura','servicio','tservicio'));
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categorias',CategoriaController::class)->names('categorias');
Route::resource('marcas',MarcaController::class)->names('marcas');
Route::resource('users',UserController::class)->names('users');
Route::resource('tipoServicios',TipoServicioController::class)->names('tipoServicios');
Route::resource('proveedores',ProveedorController::class)->names('proveedores');
Route::resource('ventas',ventaController::class)->names('ventas');
Route::resource('modelos',ModeloController::class)->names('modelos');
Route::resource('productos',ProductoController::class)->names('productos');
Route::resource('compras',CompraController::class)->names('compras');
Route::resource('facturas',facturaController::class)->names('facturas');
Route::resource('servicios',ServicioController::class)->names('servicios');
Route::resource('Bitacora',BitacoraController::class)->names('Bitacora');
Route::resource('dventas',dventaController::class)->names('dventas');
Route::resource('dcompras',dcompraController::class)->names('dcompras');
Route::resource('perfil',PerfilController::class)->names('perfil');
Route::resource('front',FrontendController::class)->names('front');
Route::resource('homex',HomeController::class)->names('homex');
Route::resource('dservicios',dservicioController::class)->names('dservicios');
Route::resource('pago',frontVentaController::class)->names('pago');
Route::resource('payment',frontFacController::class)->names('payment');
Route::resource('fservicio',fventaServController::class)->names('fservicio');
Route::resource('pagoserv',pagoServController::class)->names('pagoserv');
Route::resource('roles', RoleController::class)->names('roles');

Route::get('ventas/pdf/{venta}', 'App\Http\Controllers\ventaController@pdf')->name('ventas.pdf');