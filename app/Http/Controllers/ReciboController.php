<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ReciboAlquiler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReciboController extends Controller
{
    public function create($id)
    {
        $contrato = Contrato::with('inquilino')->findOrFail($id);

        return view('recibo.reciboContrato', compact('contrato'), ['fecha' => now()->format('Y-m-d')]);
    }
    public function detalle($id)
    {
        $recibos = ReciboAlquiler::with(['contrato'])->findOrFail($id);
        return view('recibo.detalle', compact('recibos'));
    }

    public function index()
    {
        $recibo = ReciboAlquiler::all();
        return view('recibo.recibo', compact('recibo'));
    }

    public function mostrarRecibos()
    {
        $recibos = ReciboAlquiler::all();
        return view('recibo.mostrar_recibos', compact('recibos'));
    }

    public function store(Request $request)
    {
        $recibo = new ReciboAlquiler();
        $recibo->a_cuenta = $request->a_cuenta;
        $recibo->suma_de = $request->suma_de;
        $recibo->debe = $request->saldo;
        $recibo->descripcion = $request->descripcion;
        $recibo->fecha_alquiler = $request->fecha_alquiler;
        $recibo->fecha_pago = $request->fecha_pago;
        $recibo->metodo_pago = $request->metodo_pago;
        $recibo->monto_total = $request->monto_total;
        $recibo->id_contrato = $request->id_contrato;
        $recibo->estado = 'Activo';
        $recibo->save();

        return redirect()->route('mostrar_recibos')->with('success', 'Creado correctamente');
    }


    public function edit($id)
    {
        $inquilino = ReciboAlquiler::findOrFail($id); // Cambié $fiscals a $fiscal para ser consistente
        return response()->json($inquilino); // Devolvemos el fiscal como JSON
    }

    public function update(Request $request, $id)
    {
        $recibo = ReciboAlquiler::find($id);
        $recibo->a_cuenta = $request->a_cuenta;
        $recibo->suma_de = $request->suma_de;
        $recibo->debe = $request->saldo;
        $recibo->descripcion = $request->descripcion;
        $recibo->fecha_alquiler = $request->fecha_alquiler;
        $recibo->fecha_pago = $request->fecha_pago;
        $recibo->metodo_pago = $request->metodo_pago;
        $recibo->monto_total = $request->monto_total;
        $recibo->id_contrato = $request->id_contrato;
        $recibo->estado = 'Activo';


        $recibo->update();
        return redirect()->route('mostrar_inquilino')->with('success', 'Inquilino actualizado correctamente');
    }

    public function generarPDF($id)
    {
        $recibos = ReciboAlquiler::with(['contrato'])->findOrFail($id);
        // Suponiendo que $recibo es tu objeto de datos
        $fechaPago = $recibos->fecha_pago;
        $fechaParts = explode('-', $fechaPago);
        $dia = $fechaParts[2];
        $mes = $fechaParts[1];
        $anio = $fechaParts[0];

        // Cargar la vista Blade en una variable con los datos necesarios
        $html = view('pdf.recibo_pdf', compact('recibos', 'dia', 'mes', 'anio'))->render();

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
        return view('pdf.recibo_pdf', compact('recibos', 'dia', 'mes', 'anio'));
    }
}
