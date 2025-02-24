<?php

namespace App\Http\Controllers;

use App\Models\Inquilino;
use Illuminate\Http\Request;

class InquilinoController extends Controller
{
    public function index()
    {
        $inquilinos = Inquilino::all();
        return view('inquilinos.inquilino', compact('inquilinos'));
    }

   

    public function store(Request $request)
    {
        $inquilino = new Inquilino();
        $inquilino->nombre = $request->nombre;
        $inquilino->paterno = $request->paterno;
        $inquilino->materno = $request->materno;
        $inquilino->ci = $request->ci;
        $inquilino->telefono = $request->telefono;
        $inquilino->correo = $request->correo;
        $inquilino->telefono_referencia = $request->telefono_referencia;
        $inquilino->save();

        return redirect()->route('mostrar_inquilino')->with('success', 'Creado correctamente');
    }

    public function edit($id)
    {
        $inquilino = Inquilino::findOrFail($id); // Cambié $fiscals a $fiscal para ser consistente
        return response()->json($inquilino); // Devolvemos el fiscal como JSON
    }

    public function update(Request $request, $id)
    {
        $inquilino = Inquilino::find($id);
        $inquilino->nombre = $request->nombre;
        $inquilino->paterno = $request->paterno;
        $inquilino->materno = $request->materno;
        $inquilino->ci = $request->ci;
        $inquilino->telefono = $request->telefono;
        $inquilino->correo = $request->correo;
        $inquilino->telefono_referencia = $request->telefono_referencia;
        
        
        $inquilino->update();
        return redirect()->route('mostrar_inquilino')->with('success', 'Inquilino actualizado correctamente');
    }
}
