<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function store(Request $request)
    {
        $servicio = new Servicio;
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        
        $servicio->save();
        return redirect()->route('mostrar_servicio')->with('success', 'Creado correctamente');
    }

    public function index()
    {
        $servicios = Servicio::all();
        return view('servicio.servicio', compact('servicios'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->precio = $request->precio;
        $servicio->update();

        return redirect()->route('mostrar_servicio')->with('success', 'Servicio actualizado correctamente');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id); // Cambié $fiscals a $fiscal para ser consistente
        return response()->json($servicio); // Devolvemos el fiscal como JSON
    }
}
