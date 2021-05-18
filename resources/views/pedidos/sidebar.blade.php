@extends('layouts.app')
@section('content')

    <div class="sidebar">
        <div class="header"><h2>Pedidos<h2></div>  
        @if(Auth::user()->role == 'cliente') 
            <a class="fas" href="{{ route('pedidos.actual') }}">{{ __('Actual') }}</a> 
            <a class="fas" href="{{ route('pedidos.historial') }}">{{ __('Historial') }}</a>  
        @endif
        @if(Auth::user()->role == 'admin')
            <a class="fas" href="{{ route('pedidos.activos') }}">{{ __('Activos') }}</a> 
            <a class="fas" href="{{ route('pedidos.listos') }}">{{ __('Listos') }}</a> 
        @endif
    </div>

    <main>
        @yield('content_area')
    </main>

@endsection