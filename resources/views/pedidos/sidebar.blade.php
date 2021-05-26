@extends('layouts.app')
@section('content')

    <div class="sidebar">
        <div class="header"><h2>Pedidos<h2></div>  
        @if(Auth::user() != null)
            @if(Auth::user()->role == 'cliente') 
                <a href="{{ route('pedidos.actual') }}">{{ __('Actual') }}</a> 
                <a href="{{ route('pedidos.historial') }}">{{ __('Historial') }}</a>  
            @endif
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('pedidos.activos') }}">{{ __('Activos') }}</a> 
                <a href="{{ route('pedidos.listos') }}">{{ __('Listos') }}</a> 
            @endif
        @endif
    </div>

    <main>
        @yield('content_area')
    </main>

@endsection