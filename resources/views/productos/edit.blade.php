@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @extends('plantilla_base')
    @section('contenido')
@stop

@section('content')
    <h2>Editar Productos</h2>

<form action="{{route('productos.update', $producto->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$producto->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Stock</label>
        <input type="number" id="stok" name="stok" class="form-control" value="{{$producto->stok}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select class="form-select" aria-label="Default select example" name="estado">
            <option selected ">--Seleccione un estado--</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>

    <div class="mb-3 form-group">
        <label for="image" class="form-label">Imagen</label>

        <input type="file" id="imagen" name="image" class="form-control">

        <img src="{{asset('images')}}/{{$producto->image}}" width="200" id="previewImg" alt="">
    </div>


    <a href="/productos" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>

<script>
    function previewFile(input){
                var file=$("input[type=file]").get(0).files[0];
                if(file){
                    var reader = new FileReader();
                    reader.onload = function(){
                        $('#previewImg').attr("src", reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

