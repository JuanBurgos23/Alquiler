<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\OtroRecibo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class OtroReciboController extends Controller
{

    public function detalle($id)
    {
        $recibos = OtroRecibo::findOrFail($id);
        return view('recibo.detalle_Otrorecibo', compact('recibos'));
    }



    public function mostrarRecibos()
    {
        $recibos = OtroRecibo::all();
        return view('recibo.mostrar_Otrorecibos', compact('recibos'));
    }


    public function otroRecibo(Request $request)
    {
        $recibo = new OtroRecibo();
        $recibo->a_cuenta = $request->a_cuenta;
        $recibo->suma_de = $request->suma_de;
        $recibo->recibi_de = $request->recibi_de;
        $recibo->debe = $request->saldo;
        $recibo->descripcion = $request->descripcion;

        $recibo->fecha_pago = $request->fecha_pago;
        $recibo->metodo_pago = $request->metodo_pago;
        $recibo->monto_total = $request->monto_total;

        $recibo->estado = 'Activo';
        $recibo->save();

        return redirect()->route('mostrar_recibos')->with('success', 'Creado correctamente');
    }

    public function edit($id)
    {
        $recibo = OtroRecibo::findOrFail($id); // Cambié $fiscals a $fiscal para ser consistente
        return response()->json($recibo); // Devolvemos el fiscal como JSON
    }

    public function update(Request $request, $id)
    {
        $recibo = OtroRecibo::find($id);
        $recibo->a_cuenta = $request->a_cuenta;
        $recibo->suma_de = $request->suma_de;
        $recibo->recibi_de = $request->recibi_de;
        $recibo->debe = $request->saldo;
        $recibo->descripcion = $request->descripcion;

        $recibo->fecha_pago = $request->fecha_pago;
        $recibo->metodo_pago = $request->metodo_pago;
        $recibo->monto_total = $request->monto_total;

        $recibo->estado =  $request->estado;


        $recibo->update();
        return redirect()->route('mostrar_OtroRecibo')->with('success', 'Inquilino actualizado correctamente');
    }

    public function generarPDF($id)
    {
        $recibos = OtroRecibo::findOrFail($id);
        // Suponiendo que $recibo es tu objeto de datos
        $fechaPago = $recibos->fecha_pago;
        $fechaParts = explode('-', $fechaPago);
        $dia = $fechaParts[2];
        $mes = $fechaParts[1];
        $anio = $fechaParts[0];

        // Cargar la vista Blade en una variable con los datos necesarios
        $html = view('pdf.Otrorecibo_pdf', compact('recibos','dia','mes','anio'))->render();

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
        return view('pdf.Otrorecibo_pdf', compact('recibos','dia','mes','anio'));
    }
}
