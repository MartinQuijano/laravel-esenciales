@extends('productos.sidebar')
@section('content_area')

<div class="content">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        Editar producto
                    </div>
                    <form action="{{ route('producto.actualizar',['prod_id'=>$producto->id]) }}" method="POST" enctype="multipart/form-data" style="margin: 50px">
                        @csrf
                        <div class="form-group">
                        <label>Marca</label>
                        <input type="text" name="marca" class="form-control" value="{{ $producto['marca']}}">
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" name="categoria" class="form-control" value="{{ $producto['categoria']}}">
                        </div>
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="text" name="cantidad" class="form-control" value="{{ $producto['cantidad']}}">
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" name="precio" class="form-control" value="{{ $producto['precio']}}">
                        </div>
                        <div class="form-group">
                            <label>Unidad</label>
                            <input type="text" name="unidad" class="form-control" value="{{ $producto['unidad']}}">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea name="descripcion" rows="6" class="form-control" cols="60">{{ $producto['descripcion']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ingredientes</label>
                            <textarea name="ingredientes" rows="6" class="form-control" cols="60">{{ $producto['ingredientes']}}</textarea>
                        </div>
                        <div class="form-group">
                            <img id="imgUpdate" src="{{ asset('public/prodImgs/'.$producto->marca)}}">
                            <label>Cargar imagen</label>
                            <input type="file" name="prod_image">
                        </div>
                            <button id="boton_confirmar" type="submit" class="btn btn-primary">Actualizar datos</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection