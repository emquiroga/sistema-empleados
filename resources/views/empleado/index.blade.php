@extends('layouts.app')
@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="navbar-brand">{{$title}}</h3>
            <a href="{{url('/empleado/create')}}" class="btn btn-success">Crear entrada</a>
        </div>
    </nav>
    @if(Session::has('message'))
        <div class="alert alert-warning" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <table class="table table-light caption-top">
        <caption>Lista de Empleados</caption>
        <thead class="thead-light">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cargo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->cargo }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ url('/empleado/' . $empleado->id ) }}" role="button"><button class="btn btn-warning w-100">Ver</button></a>
                        <form method="POST" action="{{url('/empleado/' . $empleado->id)}}">
                            @csrf
                            {{ method_field('DELETE')}}
                            <button type="submit" value="Borrar" class="btn btn-danger w-100" onclick="return confirm('¿Estás seguro de querer borrar este registro?')" role="button">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
