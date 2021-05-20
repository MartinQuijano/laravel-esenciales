@extends('layouts.app')
@section('content')

    <div class="sidebar">
        <div class="header"><h2>Categorias<h2></div>
        @if(Auth::user() != null)
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('productos.completar') }}">{{ __('Agregar producto') }}</a> 
            @endif
        @endif
        @if(isset($categorias))
            @foreach ($categorias as $categoria_item)  
                <a href="{{ route('productos.categoria', ['categoria'=>$categoria_item]) }}">{{ $categoria_item}}</a>
            @endforeach
        @endif       
    </div>

    <main>
        @yield('content_area')
    </main>

@endsection