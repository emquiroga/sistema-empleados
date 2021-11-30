@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-warning" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="container-fluid mx-auto">
        <div class="card mx-auto" style="width: 18rem;">
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->foto }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-tittle">{{$empleado->apellido}},</h4>
              <h5 class="card-title">{{ $empleado->nombre }}</h5>
              <p class="card-text">{{ $empleado->cargo }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $empleado->dni }}</li>
              <li class="list-group-item">{{ $empleado->direccion }}</li>
              <li class="list-group-item">{{ $empleado->telefono }}</li>
              <li class="list-group-item">{{ $empleado->email }}</li>
            </ul>
            <div class="card-body">
              <a href="{{url('/empleado/' . $empleado->id . '/edit')}}"><button class="btn btn-warning w-100">Editar</button></a>
              <a href="{{url('/empleado')}}"><button class="btn btn-primary w-100">Volver</button></a>
            </div>
          </div>
    </div>
</div>
@endsection



