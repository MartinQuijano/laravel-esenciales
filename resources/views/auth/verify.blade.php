@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificá tu dirección de E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link de verificación fue enviado a su dirección de E-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor revise su email por un link de verificación.') }}
                    {{ __('Si no recibió el email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clickear aquí para pedir otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
