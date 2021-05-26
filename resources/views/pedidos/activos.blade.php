@extends('pedidos.sidebar')
@section('content_area')

    <!--  Lista de los pedidos activos -->
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
                    <div class="card">
                        <div class="card-header text-center">
                            Pedidos activos
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