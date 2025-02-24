<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cuarto;
use App\Models\Inquilino;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class ContratoController extends Controller
{
    public function index()
    {

        $contratos = Contrato::with('inquilino');
        $servicios = Servicio::all();
        $cuartosDisponibles = Cuarto::where('estado', 'Disponible','Reservado')
            ->with(['dimension', 'imagenes'])
            ->get();

        return view('contrato.contrato', compact('contratos', 'cuartosDisponibles', 'servicios'));
    }

    public function store(Request $request)
    {


        dd($request->all());
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
                'estado_civil' => $request->estado_civil,
                'correo' => $request->correo,
                'fecha_nac' => $request->fecha_nac,
            ]
        );

        // Crear y guardar el contrato
        $contrato = new Contrato();
        $contrato->fecha_contrato = $request->fecha_contrato;
        $contrato->hora_contrato = $request->hora_contrato;
        $contrato->descripcion = $request->descripcion;
        $contrato->forma_pago = $request->forma_pago;
        $contrato->monto_total = $request->monto_total_descuento;
        $contrato->duracion = $request->duracion;
        $contrato->nro_personas = $request->nro_personas;
        $contrato->estado = "Activo";
        $contrato->id_inquilino = $inquilino->id;
        $contrato->id_user = Auth::id(); // Asigna el ID del usuario autenticado
        $contrato->save();

        // Asociar los cuartos seleccionados con el contrato
        if ($request->has('cuartosSeleccionados') && !empty($request->cuartosSeleccionados)) {
            $cuartosSeleccionados = explode(',', $request->input('cuartosSeleccionados'));
            $contrato->cuartos()->attach($cuartosSeleccionados); // Asociar cuartos usando la relación muchos a muchos

            // Actualizar el estado de los cuartos a "Ocuoadi"
            Cuarto::whereIn('id', $cuartosSeleccionados)->update(['estado' => 'Ocupado']);
        }

        // Asociar los servicios seleccionados con el contrato
        if ($request->has('serviciosSeleccionados') && !empty($request->serviciosSeleccionados)) {
            $serviciosSeleccionados = explode(',', $request->input('serviciosSeleccionados'));
            $contrato->servicios()->attach($serviciosSeleccionados); // Asociar servicios usando la relación muchos a muchos
        }

        return redirect()->route('mostrar_contrato')->with('success', 'Contrato creado correctamente');
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrFail($id);
        return response()->json($contrato);
    }

    public function update(Request $request, $id)
    {
        $contrato = Contrato::find($id);
        $contrato->fecha_contrato = $request->fecha_contrato;
        $contrato->hora_contrato = $request->hora_contrato;
        $contrato->descripcion = $request->descripcion;
        $contrato->forma_pago = $request->forma_pago;
        $contrato->estado = $request->estado;;


        $contrato->update();
        return redirect()->route('mostrar_contrato')->with('success', 'Contrato actualizado correctamente');
    }

    //mostrar cuarts dispooninles
    public function mostrarContratos()
    {
        $contratos = Contrato::with('inquilino')->get();
        return view('contrato.mostrar_contrato', compact('contratos'));
    }

    public function generarPDF($id)
    {
        $contratos = Contrato::with(['inquilino','cuartos'])->findOrFail($id);
        

        // Cargar la vista Blade en una variable con los datos necesarios
        $html = view('pdf.contrato', compact('contratos'))->render();

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Obtener el contenido del PDF como una cadena
        $output = $dompdf->output();

        // Mostrar la vista previa del PDF en una página web
        return view('pdf.contrato', compact('contratos'));
    }
}
