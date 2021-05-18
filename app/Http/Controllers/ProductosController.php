<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    function categoriasDeProductos(){
       $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

       return view('productos.catalogo', ['categorias'=> $categorias->pluck('categoria')]);
    }

    function productosPorCategoria($categoria){
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();
        $productos = Producto::where('categoria', '=', ucfirst($categoria))->get();
        $this->prodEncodeToImgFile($productos);

        // CONSULTAR ESTO!
        if(Auth::check()){
            $pedidoSinConfirmar = Pedido::where('cliente_id', Auth::user()->cliente_id)->where('estado', 'sin confirmar')->first();
            $productosEnPedido = null;

            if($pedidoSinConfirmar != null){
                $this->descontarCantidadALosProductosQueAparecenEnPedido($productos, $pedidoSinConfirmar);
            }
        }
        
        //
        return view('productos.catalogo', ['categorias'=>$categorias->pluck('categoria'),'productos'=> $productos]);
    }

    private function prodEncodeToImgFile($productos){
        $imgFolder = "public/prodImgs/";

        if(!file_exists($imgFolder)){
            mkdir($imgFolder, 0777, true);
        }

        foreach($productos as $producto){
            $nombreArchivo = $producto->marca;
            $dir = $imgFolder.$nombreArchivo;

            if(!empty($producto->imagen)){
                $imagenCodificada = $producto->imagen;
                $archivo = fopen($dir, "w");
                fwrite($archivo, base64_decode(stream_get_contents($imagenCodificada)));
            }
        }
    }

    function agregarProducto(Request $request){
        $producto = new Producto;
        $this->setearYGuardarProducto($producto, $request);

        return back()->with('message', 'Producto agregado.');
    }
        
    function borrarProducto($id){
        $producto = Producto::find($id);
        $producto->delete();
        
        error_log('Si wacho, aca entro!');
        return back()->with('message', 'Producto eliminado.');;
    }

    function actualizarProducto($id, Request $request){
        $producto = Producto::find($id);
        $this->setearYGuardarProducto($producto, $request);

        return redirect()->route('productos.catalogo')->with('message','Producto actualizado.');;
    }

    function mostrarProducto($id){
        $producto = Producto::find($id);
        $this->singleImageToFile($producto);

        // Esto lo agrego para poder rellenar el sidebar cuando estoy actualizando un prod en particular. Redundancia?
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

        return view('productos/editar', ['categorias'=>$categorias->pluck('categoria'),'producto'=>$producto]);
    }

    private function setearYGuardarProducto($producto, Request $request){

        $producto->marca = $request->marca;
        $producto->categoria = $request->categoria;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->unidad = $request->unidad;
        $producto->descripcion = $request->descripcion;
        $producto->ingredientes = $request->ingredientes;

        if ($request->hasFile('prod_image')) {
            $image = base64_encode(file_get_contents($request->file('prod_image')));
            $producto->imagen = $image;
        }

        $producto->save();
    }

    private function singleImageToFile($producto){
        $imgFolder = "public/prodImgs/";

        if(!file_exists($imgFolder)){
            mkdir($imgFolder, 0777, true);
        }

        $nombreArchivo = $producto->marca;
        $dir = $imgFolder.$nombreArchivo;

        if(!empty($producto->imagen)){
            $imagenCodificada = $producto->imagen;
            $archivo = fopen($dir, "w");
            fwrite($archivo, base64_decode(stream_get_contents($imagenCodificada)));
        }
    }

    private function descontarCantidadALosProductosQueAparecenEnPedido($productos, $pedido){
        $productosEnPedido = $pedido->productos;
        
        foreach($productosEnPedido as $producto_item){
            $productoADescontarCantidad = $productos->where('id', $producto_item->id)->first();
            if(!empty($productoADescontarCantidad))
                $productoADescontarCantidad->cantidad =  $productoADescontarCantidad->cantidad - $producto_item->pivot->cantidad;
                
        }
     }

     function completarDatosProductoAgregar(){
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

        return view('productos.completar', ['categorias'=> $categorias->pluck('categoria')]);
     }
}