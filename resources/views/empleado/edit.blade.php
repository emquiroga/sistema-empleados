@extends('layouts.app')
@section('content')
<div class="container">
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
            @include('empleado.form', ['mode'=>'Editar'])
        </form>
    </div>
</div>
@endsection

