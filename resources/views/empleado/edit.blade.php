<!DOCTYPE html>
<html lang="es">
@include('partials.head')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="navbar-brand">{{$title}}</h3>
            <a href="{{url('/empleado/')}}" class="btn btn-info">Volver al listado</a>
        </div>
    </nav>
     <div class="row container-fluid">
         <form action="{{url('/empleado/' . $empleado->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            @include('empleado.form', ['mode'=>'edit'])
            <button class="btn btn-primary mt-3">Actualizar Datos</button>
        </form>
    </div>
</body>
</html>
