@extends('pedidos.sidebar')
@section('content_area')

    <!-- Mostrar el pedido actual con los items, un boton para remover cada item y un boton de confirmar pedido -->
    <div class="content">
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                        <div class="card">
                            <div class="card-header text-center">
                              Pedido actual
                            </div>
                            @if(isset($productos_pedido))
                            <ul class="list-group list-group-flush">
                                @foreach ($productos_pedido as $producto)
                                <li class="list-group-item" style="line-height: 37px">
                                    <form action="{{ route ('pedidos.eliminarproducto',['prod_id'=>$producto->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf 
                                        {{ $producto->marca}} x{{ $producto->pivot->cantidad}} = {{ ($producto->precio * $producto->pivot->cantidad) }}
                                        <button type="submit" id="boton_eliminar" class="btn btn-small btn-info">Eliminar</button>
                                    </form>
                                </li>  
                                @endforeach   
                            @else
                                <li class="list-group-item" style="line-height: 37px">
                                    {{ 'Aun no hay productos en el pedido.' }}
                                </li>
                            @endif
                            @if(isset($pedido))
                                <li class="list-group-item" style="line-height: 37px">
                                    Precio total: ${{ $pedido->precioTotal() }}
                                </li>
                                <li class="list-group-item" style="line-height: 37px">
                                    <form action="{{ route ('pedidos.confirmar') }}" method="POST">
                                        @csrf 
                                        <button type="submit" id="boton_confirmar" class="btn btn-small btn-info">Confirmar pedido</button>
                                    </form>
                                </li>
                            @endif
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection