<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use App\Models\Inquilino;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {

        $reservas = Reserva::all();
        $cuartosDisponibles = Cuarto::whereIn('estado', ['Disponible', 'Reservado'])
            ->with(['dimension', 'imagenes'])
            ->get();

        return view('reserva.reserva', compact('reservas', 'cuartosDisponibles'));
    }
    public function detalle($id)
    {
        $reservas = Reserva::with(['inquilino', 'cuartos.imagenes'])->findOrFail($id);
        return view('reserva.detalle', compact('reservas'));
    }
        
    public function mostrar()
    {

        $reservas = Reserva::with('inquilino')->get();
        return view('reserva.mostrar_reserva', compact('reservas'));
    }

    public function store(Request $request)
    {

        // Buscar el inquilino por el número de CI o crear uno nuevo si no existe
        $inquilino = Inquilino::firstOrCreate(
            ['ci' => $request->ci],
            [
                'nombre' => $request->nombre,
                'paterno' => $request->paterno,
                'materno' => $request->materno,
                'domicilio' => $request->domicilio,
                'telefono' => $request->telefono,
                'telefono_referencia' => $request->telefono_referencia,
                'correo' => $request->correo,
                'fecha_nac' => $request->fecha_nac,
            ]
        );

        // Crear y guardar la reserva
        $reserva = new Reserva();
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->hora_reserva = $request->hora_reserva;
        $reserva->descripcion = $request->descripcion;
        $reserva->forma_pago = $request->forma_pago;
        $reserva->estado = "Pendiente";
        $reserva->monto = $request->monto;
        $reserva->id_inquilino = $inquilino->id;
        $reserva->id_user = Auth::id(); // Asigna el ID del usuario autenticado
        $reserva->save();

        // Asociar los cuartos seleccionados con la reserva
        if ($request->has('cuartosSeleccionados') && !empty($request->cuartosSeleccionados)) {
            $cuartosSeleccionados = explode(',', $request->input('cuartosSeleccionados'));
            $reserva->cuartos()->attach($cuartosSeleccionados); // Asociar cuartos usando la relación muchos a muchos
            // Actualizar el estado de los cuartos a "Reservado"
            Cuarto::whereIn('id', $cuartosSeleccionados)->update(['estado' => 'Reservado']);
        }


        return redirect()->route('mostrar_reservas')->with('success', 'Reserva creado correctamente');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->fecha_inicio = $request->fecha_inicio;
        $reserva->fecha_fin = $request->fecha_fin;
        $reserva->hora_reserva = $request->hora_reserva;
        $reserva->descripcion = $request->descripcion;
        $reserva->forma_pago = $request->forma_pago;
        $reserva->estado = $request->estado;;


        $reserva->update();
        return redirect()->route('mostrar_reservas')->with('success', 'Reserva actualizado correctamente');
    }
}
