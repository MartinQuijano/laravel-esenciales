@extends('productos.sidebar')
@section('content_area')

<div class="content">
    <div class="container mt-5 mb-5">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif  
        <!-- Formulario de creacion de producto-->  
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        Agregar producto
                    </div>
                    <form action="{{ route('producto.agregar')}}" method="POST" enctype="multipart/form-data" style="margin: 50px">
                      @csrf
                      <div class="form-group">
                        <label>Marca</label>
                        <input type="text" name="marca" class="form-control" value="{{old('marca')}}">
                        <span style="color: red">@error('marca'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Categoria</label>
                        <input type="text" name="categoria" class="form-control" value="{{old('categoria')}}">
                        <span style="color: red">@error('categoria'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" value="{{old('cantidad')}}">
                        <span style="color: red">@error('cantidad'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Precio</label>
                        <input type="text" name="precio" class="form-control" value="{{old('precio')}}">
                        <span style="color: red">@error('precio'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Unidad</label>
                        <input type="text" name="unidad" class="form-control" value="{{old('unidad')}}">
                        <span style="color: red">@error('unidad'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="descripcion" rows="6" class="form-control" cols="60" value="{{old('descripcion')}}"></textarea>
                        <span style="color: red">@error('descripcion'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Ingredientes</label>
                        <textarea name="ingredientes" rows="6" class="form-control" cols="60" value="{{old('ingredientes')}}"></textarea>
                        <span style="color: red">@error('ingredientes'){{$message}}@enderror</span>
                      </div>
                      <div class="form-group">
                        <label>Cargar imagen</label>
                        <input type="file" name="prod_image">
                      </div>
                      <button id="boton_confirmar" type="submit" class="btn btn-primary">Cargar datos</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
@endsection