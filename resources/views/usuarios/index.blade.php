@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
        @extends('plantilla_base')
        @section('contenido')
@stop

@section('content')
    <h1>Registro de Usuarios</h1>

    <table class="table table-dark table-striped mt-4">
        <thead>
          <tr>
             <th scope="col">ID</th>
             <th scope="col">Estado</th>
             <th scope="col">Tipo de Usuario</th>
             <th scope="col">Correo</th>
            
             <th scope="col">Acciones</th>
          </tr>
     </thead>
      <tbody>
          @foreach ($usuarios as $usuario)

            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->estado}}</td>
                @if ($usuario->name == 12345678)

                <td>{{'administrador'}}</td>
                @endif
                @if ($usuario->name != 12345678)
                <td>{{'editor'}}</td>
                @endif
                <td>{{$usuario->email}}</td>
                
                <td>
                    @if ($usuario_logueado == 12345678)
                    <form action="{{route ('usuarios.destroy', $usuario->id)}}" method="POST">
                        <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger" id="btn-eliminar">Eliminar</button>
                    </form>
                    @endif
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
    <script>
        
    </script>
@stop
