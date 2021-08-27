@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @extends('plantilla_base')
    @section('contenido')
@stop

@section('content')
    <h2>Editar Catalogo</h2>
        <form action="/catalogos/{{$catalogo->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre del Catalogo</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{$catalogo->nombre}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estado</label>
                <select class="form-select" aria-label="Default select example" name="estado">
                    <option selected ">--Seleccione un estado--</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <a href="/catalogos" class="btn btn-secondary" tabindex="4">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        </form>

    @stop
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
        