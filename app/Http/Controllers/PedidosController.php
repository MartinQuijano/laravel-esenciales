<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Lista_pedido;

class PedidosController extends Controller
{
    /*function categoriasDeProductos(){
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();
        $pedidoSinConfirmar = $this->obtenerPedidoSinConfirmar();
        $productosEnPedido = null;
        if($this->existePedido($pedidoSinConfirmar)){
            $productosEnPedido = $pedidoSinConfirmar->productos;
        }

        return view('pedidos.catalogo', ['categorias'=> $categorias->pluck('categoria'), 'productos_pedido'=> $productosEnPedido]);
     }*/
 
    /* function productosPorCategoria($categoria){
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();
        $productos = Producto::where('categoria', '=', ucfirst($categoria))->get();
        $pedidoSinConfirmar = $this->obtenerPedidoSinConfirmar();
        $productosEnPedido = null;

        if($this->existePedido($pedidoSinConfirmar)){
            $this->descontarCantidadALosProductosQueAparecenEnPedido($productos, $pedidoSinConfirmar);
        }

        return view('pedidos.catalogo', ['categorias'=> $categorias->pluck('categoria'), 'productos'=> $productos, 'productos_pedido'=> $productosEnPedido]);
     }*/

     function pedidosView(){
         return view('pedidos/menu');
     }

     function agregarProductoPedido($prod_id, Request $request){
        $cliente_id = Auth::user()->cliente_id;              //obtengo id de cliente
        
        $pedido = null;                                       //creo pedido nulo
        $productosEnPedido = null;                            //productos en el pedido nulo

        $productoAgregado = Producto::where('id', $prod_id)->first();          // obtengo el producto que quiero agregar al pedido

        if($request->cantidad <= $productoAgregado->cantidad){               //si la cantidad pedida de producto es menor o igual que la cantidad disponible
        
            $pedido = Pedido::where('cliente_id', $cliente_id)->where('estado', 'sin confirmar')->first();         //obtengo el pedido 'sin confirmar' (en construccion)
            if(!$this->existePedido($pedido)){                                                                      //si el pedido no existe, lo creo con los datos correspondientes
                $pedido = new Pedido;
                $pedido->cliente_id = $cliente_id;
                $pedido->fecha = Carbon::now();
                $pedido->estado = 'sin confirmar';
                $pedido->save();
                $pedido = Pedido::where('cliente_id', $cliente_id)->where('estado', 'sin confirmar')->first();      //
            }
            $this->agregarListaPedidoDeProducto($pedido, $prod_id, $request->input('cantidad'));
        }
        
        if($this->existePedido($pedido))
            $productosEnPedido = $pedido->productos;
        
        return back()->with('message', 'El producto se agrego al pedido!');
     }

    function eliminarProductoPedido($prod_id, Request $request){
        $pedidoSinConfirmar = $this->obtenerPedidoSinConfirmar();
        $lista_pedido = Lista_pedido::where('pedido_id', $pedidoSinConfirmar->id)->where('producto_id', $prod_id)->first();

        $lista_pedido->delete();

        return back()->with('message', 'El producto fue eliminado del pedido.');
    }

    function confirmarPedido(){
        $pedidoSinConfirmar = $this->obtenerPedidoSinConfirmar();
        foreach($pedidoSinConfirmar->productos as $producto){
            if($producto->pivot->cantidad > $producto->cantidad){
                $error_msg = 'No se pudo confirmar el pedido, actualmente no hay stock de: '.$producto->marca;
                return back()->withErrors($error_msg);
            }
        }
        foreach($pedidoSinConfirmar->productos as $producto){
            $producto->cantidad = $producto->cantidad - $producto->pivot->cantidad;
            $producto->save();
        }
        $pedidoSinConfirmar->estado = 'procesando';
        $pedidoSinConfirmar->save();

        return back()->with('message', 'El pedido será procesado pronto! Muchas gracias!');
    }

    function consultarPedidosActivos(){
        $pedidos = Pedido::where('estado', 'procesando')->get();

        return view('/pedidos/activos', ['pedidos'=>$pedidos]);
    }

    function consultarMisPedidos(){
        $pedidos = Pedido::where('cliente_id', Auth::user()->cliente_id)->where('estado', '<>', 'sin confirmar')->get();

        return view('/pedidos/historial', ['pedidos'=>$pedidos]);
    }

    function consultarPedidosListos(){
        $pedidos = Pedido::where('estado', 'listo')->get();

        return view('/pedidos/historial', ['pedidos'=>$pedidos]);
    }

    function marcarListo($pedido_id){
        $pedido = Pedido::where('id', $pedido_id)->first();
        $pedido->estado = 'listo';
        $pedido->save();

        return redirect()->route('pedidos.activos')->with('message','Pedido marcado como listo.');
    }

    function consultarPedidoActual(){
        $pedidoSinConfirmar = null;
        $productosEnPedido = null;

        $pedidoSinConfirmar = $this->obtenerPedidoSinConfirmar();

        if(empty($pedidoSinConfirmar->productos))
            $pedidoSinConfirmar = null;
        elseif(empty($pedidoSinConfirmar->productos->first()))
            $pedidoSinConfirmar = null;     
        elseif($this->existePedido($pedidoSinConfirmar))
            $productosEnPedido = $pedidoSinConfirmar->productos;
        
        return view('pedidos/actual', ['productos_pedido'=> $productosEnPedido, 'pedido'=> $pedidoSinConfirmar]);
    }

    private function existePedido($pedido){
        if($pedido != null)
            return true;
        else 
            return false;
    }

    private function obtenerPedidoSinConfirmar(){
        return Pedido::where('cliente_id', Auth::user()->cliente_id)->where('estado', 'sin confirmar')->first();
    }

    private function descontarCantidadALosProductosQueAparecenEnPedido($productos, $pedido){
        $productosEnPedido = $pedido->productos;
        foreach($productosEnPedido as $producto_item){
            $productos->where('id', $producto_item->id)->first()->cantidad =  $productos->where('id', $producto_item->id)->first()->cantidad - $producto_item->pivot->cantidad;
        }
     }

     private function agregarListaPedidoDeProducto($pedido, $prod_id, $cantidadPedida){
        $lista_pedido = Lista_pedido::where('pedido_id', $pedido->id)->where('producto_id', $prod_id)->first();

        if($lista_pedido != null){                                                                  
            $lista_pedido->cantidad = $lista_pedido->cantidad + $cantidadPedida;
            $lista_pedido->save();
        }
        else {
            $lista_pedido = new Lista_pedido;
            $lista_pedido->pedido_id = $pedido->id;
            $lista_pedido->producto_id = $prod_id;
            $lista_pedido->cantidad = $cantidadPedida;
            $lista_pedido->save();
        }
     }

    function detallesPedido($pedido_id){
        $pedido = Pedido::where('id', $pedido_id)->first();

        return view('/pedidos/detalles', ['pedido' => $pedido]);
    }
}