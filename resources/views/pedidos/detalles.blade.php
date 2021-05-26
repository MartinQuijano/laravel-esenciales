@extends('pedidos.sidebar')
@section('content_area')

    <!-- Detalles de un pedido en particular -->
    <div class="content">
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-center">
                            Fecha del pedido: {{ $pedido->fecha }}
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($pedido->productos as $producto)
                            <li class="list-group-item" style="line-height: 37px">
                                {{ $producto->marca}} x{{ $producto->pivot->cantidad}} = ${{ ($producto->precio * $producto->pivot->cantidad) }}
                            </li>  
                            @endforeach   
                            <li class="list-group-item" style="line-height: 37px">
                                Precio total: ${{ $pedido->precioTotal() }}
                            </li>
                            @if(Auth::user()->role == 'admin')
                                @if($pedido->estado != 'listo')
                                    <li class="list-group-item" style="line-height: 37px">
                                        <form action="{{ route ('marcar_listo', ['pedido_id'=>$pedido->id]) }}" method="POST">
                                            @csrf 
                                            <button id="boton_confirmar" type="submit" class="btn btn-small btn-info">{{ __('Marcar como listo') }}</button>
                                        </form>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
    </div>

@endsection