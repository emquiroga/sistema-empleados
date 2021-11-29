<!DOCTYPE html>
<html lang="es">
@include('partials/head')
<body>
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

    <div class="container-fluid">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Cargo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>
                    <img src="{{ asset('storage') . '/' . $empleado->foto }}" alt="{{ $empleado->foto }}" width="100">
                    </td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>
                        <div class="container">
                            <a href="{{ url('/empleado/' . $empleado->id . '/edit') }}" role="button"><button class="btn btn-warning btn-sm">Editar</button></a>
                            <form method="POST" action="{{url('/empleado/' . $empleado->id)}}">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button type="submit" value="Borrar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de querer borrar este registro?')" role="button">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
