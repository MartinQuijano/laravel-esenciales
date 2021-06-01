<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/pedidos/menu', 'App\Http\Controllers\PedidosController@pedidosView')->name('pedidos');
    Route::post('/pedidos/actual/{prod_id}', 'App\Http\Controllers\PedidosController@agregarProductoPedido')->name('pedidos.agregarproducto');
    Route::delete('/pedidos/actual/{prod_id}', 'App\Http\Controllers\PedidosController@eliminarProductoPedido')->name('pedidos.eliminarproducto');
    Route::post('/pedidos/confirmar', 'App\Http\Controllers\PedidosController@confirmarpedido')->name('pedidos.confirmar');
    Route::get('/pedidos/historial', 'App\Http\Controllers\PedidosController@consultarMisPedidos')->name('pedidos.historial');
    Route::get('/pedidos/actual', 'App\Http\Controllers\PedidosController@consultarPedidoActual')->name('pedidos.actual');
    Route::get('pedidos/detalles/{pedido_id}', 'App\Http\Controllers\PedidosController@detallesPedido')->name('pedidos.detalles');
    
    Route::group(['middleware' => ['admin']], function(){

        Route::get('/productos/completar','App\Http\Controllers\ProductosController@completarDatosProductoAgregar')->name('productos.completar');
        Route::post('/productos/submit', 'App\Http\Controllers\ProductosController@agregarProducto')->name('producto.agregar');
        Route::delete('/productos/borrar/{prod_id}','App\Http\Controllers\ProductosController@borrarProducto')->name('producto.borrar');
        Route::get('/productos/editar/{prod_id}','App\Http\Controllers\ProductosController@mostrarProducto')->name('producto.editar');
        Route::put('/productos/editar/habilitar/{prod_id}','App\Http\Controllers\ProductosController@habilitarProducto')->name('producto.habilitar');
        Route::put('/productos/editar/deshabilitar/{prod_id}','App\Http\Controllers\ProductosController@deshabilitarProducto')->name('producto.deshabilitar');
        Route::put('/productos/actualizar/{prod_id}','App\Http\Controllers\ProductosController@actualizarProducto')->name('producto.actualizar');
        Route::get('/pedidos/activos', 'App\Http\Controllers\PedidosController@consultarPedidosActivos')->name('pedidos.activos');
        Route::get('/pedidos/listos', 'App\Http\Controllers\PedidosController@consultarPedidosListos')->name('pedidos.listos');
        Route::post('/pedidos/gestionar/{pedido_id}', 'App\Http\Controllers\PedidosController@marcarListo')->name('marcar_listo');

    });
   
});

Route::get('/productos/catalogo','App\Http\Controllers\ProductosController@categoriasDeProductos')->name('productos.catalogo');
Route::get('/productos/catalogo/{categoria}','App\Http\Controllers\ProductosController@productosPorCategoria')->name('productos.categoria');

Route::get('/productos/detalles/{prod_marca}','App\Http\Controllers\ProductosController@productoDetalles')->name('productos.detalles');