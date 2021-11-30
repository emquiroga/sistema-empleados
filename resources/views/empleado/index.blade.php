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
    <table class="table table-success table-striped">
        <thead class="table-success">
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
                <td scope="col">{{ $empleado->nombre }}</td>
                <td scope="col">{{ $empleado->apellido }}</td>
                <td scope="col">{{ $empleado->cargo }}</td>
                <td scope="col" class="d-flex">
                        <a href="{{ url('/empleado/' . $empleado->id ) }}" role="button"><button class="btn btn-warning btn-sm"><i class="fas fa-search-plus"></i></button></a>
                        <form class="d-inline" method="POST" action="{{url('/empleado/' . $empleado->id)}}">
                            @csrf
                            {{ method_field('DELETE')}}
                            <button type="submit" value="Borrar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer borrar este registro?')" role="button"><i class="fas fa-trash"></i></button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $empleados->links() !!}
</div>
@endsection
