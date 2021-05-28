<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

        if(Auth::check()){
            $pedidoSinConfirmar = Pedido::where('cliente_id', Auth::user()->cliente_id)->where('estado', 'sin confirmar')->first();
            $productosEnPedido = null;

            if($pedidoSinConfirmar != null){
                $this->descontarCantidadALosProductosQueAparecenEnPedido($productos, $pedidoSinConfirmar);
            }
        }

        return view('productos.catalogo', ['categorias'=>$categorias->pluck('categoria'),'productos'=> $productos]);
    }

    function agregarProducto(Request $request){
        $this->validarDatosFormularioProducto($request);

        $producto = new Producto;
        $this->setearYGuardarProducto($producto, $request);

        return back()->with('message', 'Producto agregado.');
    }
      
    function actualizarProducto($prod_id, Request $request){
        $this->validarDatosFormularioProducto($request);

        $producto = Producto::find($prod_id);
        $this->setearYGuardarProducto($producto, $request);

        return redirect()->route('productos.catalogo')->with('message','Producto actualizado.');
    }

    function borrarProducto($prod_id){

        $producto = Producto::find($prod_id);
        $producto->delete();
        
        return back()->with('message', 'Producto eliminado.');;
    }

    function habilitarProducto($prod_id){
        $producto = Producto::find($prod_id);
        $producto->estado = 'activo';
        $producto->save();

        return back()->with('message','Producto habilitado.');
    }

    function deshabilitarProducto($prod_id){
        $producto = Producto::find($prod_id);
        
        $producto->estado = 'inactivo';
        $producto->save();

        return back()->with('message','Producto deshabilitado.');
    }
    
    function mostrarProducto($prod_id){
        $producto = Producto::find($prod_id);
        $this->singleImageToFile($producto);

        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

        return view('productos/editar', ['categorias'=>$categorias->pluck('categoria'),'producto'=>$producto]);
    }

    function completarDatosProductoAgregar(){
        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

        return view('productos.completar', ['categorias'=> $categorias->pluck('categoria')]);
    }

    function productoDetalles($prod_marca){

        $texto_pedido_nutricion = generarTextoEnInglesParaConsulta($prod_marca);

        $info = Http::get('https://api.edamam.com/api/nutrition-data?app_id=441e6b70&app_key=a1b49f28a25111af90e2ed3ad87ff3ba&ingr='.$texto_pedido_nutricion)->json();

        $categorias = Producto::orderBy('categoria','asc')->distinct('categoria')->get();

        return view('productos/detalles', ['informacion'=>$info, 'categorias'=>$categorias->pluck('categoria')]);
    }

    private function generarTextoEnInglesParaConsulta($prod_marca){
        $textoJSON = Http::get('https://api.mymemory.translated.net/get?q='.$prod_marca.'&langpair=es-ES|en-US')->json();
 
        $higherUsageCount = 0;
        $indexToUse = 0;
        for ($i=0; $i < sizeof($textoJSON['matches']); $i++) { 
            if($textoJSON['matches'][$i]['usage-count'] > $higherUsageCount){
                $higherUsageCount = $textoJSON['matches'][$i]['usage-count'];
                $indexToUse = $i;
            }
        }
        
        $texto_en = $textoJSON['matches'][$indexToUse]['translation'];

        return '1 '.$texto_en;
    }
    
    private function validarDatosFormularioProducto(Request $request){
        $request->validate([
            'marca' => 'required | string | max:50',
            'categoria' => 'required | string | max:30',
            'cantidad' => 'required | numeric',
            'precio' => 'required | numeric',
            'unidad' => 'required | string | max:10',
            'descripcion' => 'required | string',
            'ingredientes' => 'required | string',
        ]);
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
        $imgFolder = "prodImgs/";

        if(!file_exists($imgFolder)){
            mkdir($imgFolder, 0777, true);
        }

        $nombreArchivo = $producto->marca;
        $dir = $imgFolder.$nombreArchivo;

        if(!empty($producto->imagen)){
            $imagenCodificada = $producto->imagen;
            $archivo = fopen(public_path($dir), "w");
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

    private function prodEncodeToImgFile($productos){
        $imgFolder = "prodImgs/";

        if(!file_exists($imgFolder)){
            mkdir($imgFolder, 0777, true);
        }

        foreach($productos as $producto){
            $nombreArchivo = $producto->marca;
            $dir = $imgFolder.$nombreArchivo;

            if(!empty($producto->imagen)){
                $imagenCodificada = $producto->imagen;
                $archivo = fopen(public_path($dir), "w");
                fwrite($archivo, base64_decode(stream_get_contents($imagenCodificada)));
            }
        }
    }
}