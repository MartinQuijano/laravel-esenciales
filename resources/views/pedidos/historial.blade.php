@extends('pedidos.sidebar')
@section('content_area')

    <!-- Lista de los pedidos propios -->
    <div class="content">
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-center">
                            Pedidos asd
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($pedidos as $pedido)
                                <li class="list-group-item" style="line-height: 37px">       
                                        @csrf
                                        {{ $pedido->fecha}} - Estado: {{ $pedido->estado}}  
                                        <a href="{{ route('pedidos.detalles', ['pedido_id'=>$pedido->id]) }}">
                                            <button id="boton_eliminar" class="btn btn-small btn-info" >{{ __('Detalles') }}</button>
                                        </a>  
                                    </form>
                                </li>
                            @endforeach   
                        </ul>
                    </div>    
                </div>
            </div>
        </div>
    </div>
@endsection