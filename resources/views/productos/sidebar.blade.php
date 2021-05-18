@extends('layouts.app')
@section('content')

    <div class="sidebar">
        <div class="header"><h2>Categorias<h2></div>
        @if(Auth::user()->role == 'admin')
            <a class="fas" href="{{ route('productos.completar') }}">{{ __('Agregar producto') }}</a> 
        @endif
        @if(isset($categorias))
            @foreach ($categorias as $categoria_item)  
                <a class="fas" href="{{ route('productos.categoria', ['categoria'=>$categoria_item]) }}">{{ $categoria_item}}</a>
            @endforeach
        @endif       
    </div>

    <main>
        @yield('content_area')
    </main>

@endsection