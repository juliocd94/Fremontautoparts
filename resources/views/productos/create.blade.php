@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
        @extends('plantilla_base')
        @section('contenido')
@stop

@section('content')
        <h3>Crear Nuevo Producto</h3>

        <form action="/productos" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 form-group">
                <label for="" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="mb-3 form-group">
                <label for="" class="form-label">Stock</label>
                <input type="number" id="stok" name="stok" class="form-control" max="99" >
            </div>

            <div class="mb-3 form-group">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" aria-label="Default select example" name="estado">
                    <option selected>--Seleccione un estado--</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <div class="mb-3 form-group">
                <label for="image" class="form-label">Imagen</label>
                <input type="file" id="imagen" name="image" class="form-control" onchange="previewFile(this)">
                <img id="previewImg" style="max-whidth:20px;margin-top:20px" alt="profile image"/>
            </div>

            <a href="/productos" class="btn btn-secondary" tabindex="4">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
        </form>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            // $(document).ready(function(e){
            //     $('#imagen').change(function(){
            //         let reader = new FileReader();
            //         reader.onload = (e) => {
            //             $('#imagenSeleccionada').attr('src', e.target.result);
            //         }
            //         reader.readAsDataURL(this.files[0]);
            //     });
            // });
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





















        
    












