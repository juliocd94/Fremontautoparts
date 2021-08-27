@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
        @extends('plantilla_base')
        @section('contenido')
        
@stop

@section('content')
<h1>Registro de Productos</h1>

@if ($usuario_logueado == 12345678)
<a href="productos/create" class="btn btn-primary mt-3">CREAR</a>
@endif

<table class="table table-dark table-striped mt-2">
  <thead>
    <tr>
       <th scope="col">ID</th>
       <th scope="col">Nombre</th>
       <th scope="col">Stock</th>
       <th scope="col">Estado</th>
       <th scope="col">Imagen</th>
       <th scope="col">Fecha de creacion</th>
       <th scope="col">Fecha de actualizacion</th>
       <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
        @foreach ($productos as $producto)
          <tr>
              <td>{{$producto->id}}</td>
              <td>{{$producto->name}}</td>
              <td>{{$producto->stok}}</td>
              <td>{{$producto->estado}}</td>
              <td>
                  <img src="{{asset('images')}}/{{$producto->image}}" style="max-width: 70px" alt="">
              </td>
              <td>{{$producto->created_at}}</td>
              <td>{{$producto->updated_at}}</td>
              <td>
                  <form action="{{route ('productos.destroy', $producto->id)}}" method="POST">
                      {{-- <a href="/productos/{{$producto->id}}/edit" class="btn btn-info">Editar</a> --}}
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

    <div class="card-body">
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop





        

@endsection
























