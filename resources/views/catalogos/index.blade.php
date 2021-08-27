@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
        @extends('plantilla_base')
        @section('contenido')
@stop

@section('content')
    <h1>Registro de Catalogos</h1>
    @if ($usuario_logueado == 12345678)
    <a href="catalogos/create" class="btn btn-primary">CREAR</a>
    @endif

    <table class="table table-dark table-striped mt-4">
        <thead>
          <tr>
             <th scope="col">ID</th>
             <th scope="col">Nombre</th>
             <th scope="col">Estado</th>
             <th scope="col">Fecha de creacion</th>
             <th scope="col">Fecha de actualizacion</th>
             <th scope="col">Acciones</th>
          </tr>
     </thead>
      <tbody>
          @foreach ($catalogos as $catalogo)
            <tr>
                <td>{{$catalogo->id}}</td>
                <td>{{$catalogo->nombre}}</td>
                <td>{{$catalogo->estado}}</td>
                <td>{{$catalogo->created_at}}</td>
                <td>{{$catalogo->updated_at}}</td>
                <td>
                    <form action="{{route ('catalogos.destroy', $catalogo->id)}}" method="POST">
                        <a href="/catalogos/{{$catalogo->id}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                       @method('DELETE')
                       @if ($usuario_logueado == 12345678)
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                       @endif
                    </form>
                </td>
            </tr>
         @endforeach
        </tbody>
 </table>

@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



    
    