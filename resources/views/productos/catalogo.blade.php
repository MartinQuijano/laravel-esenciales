@extends('productos.sidebar')
@section('content_area')
    <div class="content">
        <div class="container mt-5 mb-5">
            @if(session()->has('message'))
            <div class="d-flex justify-content-center row">
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    @if (isset($productos))
                    @foreach ($productos as $producto_item)
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="col-md-3 mt-1">
                                @if($producto_item->imagen != null)
                                    <img id="card_image" class="img-fluid img-responsive rounded product-image" src="{{ asset('prodImgs/'.$producto_item->marca)}}">
                                @else
                                    <img id="card_image" class="img-fluid img-responsive rounded product-image" src="{{ asset('img/placeholder.jpg')}}">
                                @endif
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>{{ $producto_item->marca }}</h5>
                                <p class="text-justify text-truncate para mb-0">{{ $producto_item->descripcion }}<br><br></p>
                                @if(($producto_item->categoria == 'Fruta') || ($producto_item->categoria == 'Frutas') || ($producto_item->categoria == 'Verdura') || ($producto_item->categoria == 'Verduras'))
                                    <a href="{{ route ('productos.detalles',['prod_marca'=> $producto_item->marca]) }}">Información nutricional</a>
                                @endif
                            </div> 
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">${{ $producto_item->precio }} ({{ $producto_item->unidad }})</h4>
                                </div>
                                <div class="d-flex flex-column mt-3">
                                    @if(Auth::user() == null)
                                        <a href="{{ route('login') }}">
                                            <button class="btn btn-small btn-info"><i class="fas fa-cart-plus"></i> {{__('Loguear para hacer pedido') }}</button>
                                        </a>
                                    @else
                                        @if(Auth::user()->role == 'cliente')
                                            @if($producto_item->cantidad > 0)
                                                <form action="{{ route ('pedidos.agregarproducto',['prod_id'=>$producto_item->id]) }}" method="POST">
                                                    @csrf 
                                                    @if($producto_item->estado == 'activo')
                                                        <input type="number" name="cantidad" min="1" max="{{$producto_item->cantidad}}">
                                                        <button type="submit" class="btn btn-small btn-info mt-1"><i class="fas fa-cart-plus"></i>{{ __('Agregar al pedido') }}</button>
                                                    @else
                                                        <button type="submit" class="btn btn-small btn-info mt-1" disabled="disabled"><i class="fas fa-cart-plus"></i>{{ __('No hay stock') }}</button>
                                                    @endif
                                                </form>
                                            @else 
                                                <button class="btn btn-small btn-info mt-1" disabled="disabled"><i class="fas fa-cart-plus"></i>{{ __('No hay stock') }}</button>
                                            @endif
                                        @endif
                                        @if(Auth::user()->role == 'admin')
                                            <a href="{{ route ('producto.editar',['prod_id'=>$producto_item->id]) }}">
                                                <button class="btn btn-small btn-info mt-1" >{{ __('Editar') }}</button>
                                            </a> 
                                            <form action="{{ route ('producto.borrar',['prod_id'=>$producto_item->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf 
                                                @if($producto_item->pedidos->where('estado', '<>', 'listo')->first() == null)
                                                    <button type="submit" class="btn btn-small btn-info mt-1">{{ __('Eliminar') }}</button>   
                                                @else
                                                    <button type="submit" disabled="disables" class="btn btn-small btn-info mt-1">{{ __('Eliminar') }}</button>
                                                @endif
                                            </form>
                                            @if($producto_item->estado == 'activo')
                                                <form action="{{ route ('producto.deshabilitar',['prod_id'=>$producto_item->id]) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf 
                                                    <button type="submit" class="btn btn-small btn-info mt-1">{{ __('Deshabilitar') }}</button>   
                                                </form>
                                            @else
                                                <form action="{{ route ('producto.habilitar',['prod_id'=>$producto_item->id]) }}" method="POST">
                                                    @csrf 
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-small btn-info mt-1">{{ __('Habilitar') }}</button>   
                                                </form>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection