<label for="nombre"class="col-sm-2 col-form-label" >Nombre: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($empleado) ? $empleado->nombre : '' }}">
</div>
<label for="apellido" class="col-sm-2 col-form-label">Apellido: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="apellido" id="apellido" value="{{isset($empleado) ? $empleado->apellido : '' }}">
</div>
<label for="dni" class="col-sm-2 col-form-label">DNI: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="dni" id="dni" value="{{isset($empleado) ? $empleado->dni : '' }}">
</div>
<label for="direccion" class="col-sm-2 col-form-label">Dirección: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="direccion" id="direccion" value="{{isset($empleado) ? $empleado->direccion : ''}}">
</div>
<label for="telefono" class="col-sm-2 col-form-label">Teléfono: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="telefono" id="telefono" value="{{isset($empleado) ? $empleado->telefono : ''}}">
</div>
<label for="email" class="col-sm-2 col-form-label">email: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="email" id="email" value="{{isset($empleado) ? $empleado->email : ''}}">
</div>
<label for="cargo" class="col-sm-2 col-form-label">Cargo: </label>
<div class="col-sm-10">
    <input class="form-control" type="text" name="cargo" id="cargo" value="{{isset($empleado) ? $empleado->cargo : ''}}">
</div>
<label for="foto" class="col-sm-2 col-form-label">Foto: </label>
<div class="col-sm-8">
    @isset($empleado)
    <img width="60%"src="{{ asset('storage') . '/' . $empleado->foto }}" alt="">
    @endisset
    <input class="form-control" type="file" name="foto" id="foto" value="{{isset($empleado) ? $empleado->foto : ''}}">
</div>
