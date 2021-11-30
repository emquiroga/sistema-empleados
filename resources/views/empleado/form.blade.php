@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
    <label for="nombre"class="" >Nombre: </label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($empleado) ? $empleado->nombre : old('nombre') }}">
</div>
<div class="form-group">
    <label for="apellido" class="">Apellido: </label>
    <input class="form-control" type="text" name="apellido" id="apellido" value="{{isset($empleado) ? $empleado->apellido : old('apellido') }}">
</div>
<div class="form-group">
    <label for="dni" class="">DNI: </label>
    <input class="form-control" type="text" name="dni" id="dni" value="{{isset($empleado) ? $empleado->dni : old('dni') }}">
</div>
<div class="form-group">
    <label for="direccion" class="">Dirección: </label>
    <input class="form-control" type="text" name="direccion" id="direccion" value="{{isset($empleado) ? $empleado->direccion : old('direccion')}}">
</div>
<div class="form-group">
    <label for="telefono" class="">Teléfono: </label>
    <input class="form-control" type="text" name="telefono" id="telefono" value="{{isset($empleado) ? $empleado->telefono : old('telefono')}}">
</div>
<div class="form-group">
    <label for="email" class="">Email: </label>
    <input class="form-control" type="text" name="email" id="email" value="{{isset($empleado) ? $empleado->email : old('email')}}">
</div>
<div class="form-group">
    <label for="cargo" class="">Cargo: </label>
    <input class="form-control" type="text" name="cargo" id="cargo" value="{{isset($empleado) ? $empleado->cargo : old('cargo')}}">
</div>
<div class="form-group">
    <label for="foto" class="">Foto: </label>
    <br>
    @isset($empleado)
    <img class="img-fluid img-thumbnail" src="{{ asset('storage') . '/' . $empleado->foto }}" alt={{$empleado->nombre . " " . $empleado->apellido}}>
    @endisset
    <input class="mt-3" type="file" name="foto" id="foto" value="{{isset($empleado) ? $empleado->foto : old('foto')}}">
</div>
<button class="btn btn-primary mt-3 w-100">{{$mode}} entrada</button>

