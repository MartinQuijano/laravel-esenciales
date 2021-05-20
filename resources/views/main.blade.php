@extends('layouts.app')
@section('content')
   
    <!--  Mi Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="/img/tienda_1.jpg" width="100%"  height="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Calidad</h5>
                    <p class="slider-subtitles">Nuestro principal objetivo</p>
                </div>
            </div>
        </div>
            <div class="carousel-item">
            <img src="/img/tienda_2.jpg" width="100%"  height="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Variedad</h5>
                    <p class="slider-subtitles">Gran cantidad de opciones</p>
                </div>
            </div>
        </div>
            <div class="carousel-item">
            <img src="/img/tienda_3.jpg" width="100%"  height="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Conveniencia</h5>
                    <p class="slider-subtitles">Precios bajos</p>
                </div>
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="bottom-bar" style="text-align: center">
        <br>
        <div style="color: rgba(255, 255, 255, 0.5); text-transform: uppercase; font-weight: 400; letter-spacing: .86px;">Seguinos en la web</span>
        <br>
        <br>
        <div>
            <a href="#" style="text-decoration: none; color: rgba(255, 255, 255, 0.5);"><i class="fab fa-facebook-f fa-2x mr-3"></i></a>
            <a href="#" style="text-decoration: none; color: rgba(255, 255, 255, 0.5);"><i class="fab fa-twitter fa-2x mr-3"></i></a>
            <a href="#" style="text-decoration: none; color: rgba(255, 255, 255, 0.5);"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <br>
        <div style="color: rgba(255, 255, 255, 0.5); text-transform: uppercase; font-weight: 400; letter-spacing: .86px;">© 2021 Empresa Esenciales. Todos los derechos reservados.</span>
    </div>
        
@endsection