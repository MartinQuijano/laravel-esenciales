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
            <img src="/img/tienda_1.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Calidad</h5>
                    <p class="slider-subtitles">Nuestro principal objetivo</p>
                </div>
            </div>
        </div>
            <div class="carousel-item">
            <img src="/img/tienda_2.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Variedad</h5>
                    <p class="slider-subtitles">Gran cantidad de opciones</p>
                </div>
            </div>
        </div>
            <div class="carousel-item">
            <img src="/img/tienda_3.jpg" width="100%">
            <div class="carousel-caption d-none d-md-block">
                <div class="slider-contrast-background">
                    <h5 class="slider-titles">Third slide label</h5>
                    <p class="slider-subtitles">Some representative placeholder content for the third slide</p>
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

    <div class="bottom-bar">
    </div>

@endsection