<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'title' => 'Listado de Empleados'
        ];
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index', $params, $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Alta de Empleado'
        ];
        return view('empleado.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'cargo' => 'required',
            'foto' => 'required',
        ]);
        $datosEmpleado = request()->except('_token');

        if($request->hasFile('foto')) {
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);

        return redirect('empleado')->with('message', 'Registro generado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        $params = [
            'title' => 'Detalle de Empleado',
            'empleado' => $empleado
        ];
        return view('empleado.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrFail($id);
        $params = [
            'title' => 'Editar datos',
            'empleado' => $empleado
        ];
        return view('empleado.edit', $params, compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'cargo' => 'required',
            'foto' => 'required',
        ]);
        $datosEmpleado = request()->except(['_token', '_method']);

        if($request->hasFile('foto')) {
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'. $empleado->foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datosEmpleado);

        $empleado=Empleado::findOrFail($id);
        $params = [
            'title' => 'Editar datos',
            'empleado' => $empleado
        ];
        return view('empleado.edit', $params, compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=Empleado::findOrFail($id);
        if(Storage::delete('public/'. $empleado->foto)) {
            Empleado::destroy($id);
        }
        return redirect('empleado')->with('message', 'Registro eliminado con éxito');
    }
}
