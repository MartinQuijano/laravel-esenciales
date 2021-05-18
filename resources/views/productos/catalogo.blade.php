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
                            <div class="col-md-3 mt-1"><img id="card_image" class="img-fluid img-responsive rounded product-image" src="{{ asset('public/prodImgs/'.$producto_item->marca)}}"></div>
                            <div class="col-md-6 mt-1">
                                <h5>{{ $producto_item->marca }}</h5>
                                <p class="text-justify text-truncate para mb-0">{{ $producto_item->descripcion }}<br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">${{ $producto_item->precio }}</h4>
                                </div>
                                <div class="d-flex flex-column mt-3">
                                    @if(Auth::user()->role == 'cliente')
                                        <form action="{{ route ('pedidos.agregarproducto',['prod_id'=>$producto_item->id]) }}" method="POST">
                                            @csrf 
                                            <input type="number" name="cantidad" min="0" max="{{$producto_item->cantidad}}"
                                            onKeyUp="if(this.value>{{ $producto_item->cantidad }}){this.value={{ $producto_item->cantidad }};}else if(this.value<1){this.value='1';}">
                                            <button type="submit" class="btn btn-small btn-info mt-1">Agregar al pedido</button>
                                        </form>
                                    @endif
                                    @if(Auth::user()->role == 'admin')
                                        <a href="{{ route ('producto.editar',['prod_id'=>$producto_item->id]) }}">
                                            <button class="btn btn-small btn-info mt-1" >{{ __('Editar') }}</button>
                                        </a> 
                                        <form action="{{ route ('producto.borrar',['prod_id'=>$producto_item->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf 
                                            <button type="submit" class="btn btn-small btn-info mt-1">{{ __('Eliminar') }}</button>
                                        </form>
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