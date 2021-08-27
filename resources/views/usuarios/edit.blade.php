@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
        @extends('plantilla_base')
        @section('contenido')
@stop

@section('content')    
<h3 class="pt-3" >Editar Catalogo</h3>
<form action="/usuarios/{{$usuario->id}}" method="POST">
    @method('PUT');
    @csrf
    {{-- <div class="mb-3">
        <label for="" class="form-label">Tipo de Usuario</label>
        @if($usuario->name == 12345678)
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{'administrador'}}">
        @endif
        @if($usuario->name == !12345678)
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{'editor'}}">
        @endif
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo Electronico</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$usuario->email}}">
    </div> --}}
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <input type="text" id="estado" name="estado" class="form-control" value="{{$usuario->estado}}" placeholder="Ejemplo: activo | inactivo">
    </div>
    {{-- <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select class="form-select" aria-label="Default select example" name="estado">
            <option selected ">--Seleccione un estado--</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div> --}}

    <a href="/usuarios" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
@endsection

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
