<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            .watermark {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('{{asset('cuartos/lgo/logo\ \(2\).png')}}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                opacity: 0.1;
                pointer-events: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .recibo {
            position: relative;
            width: 800px;
            height: 470px;
            /* Ajusta la altura si es necesario */
            border: 2px solid #000;
            padding: 30px;
            background-color: #fff;
        }

        .recibo .watermark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{asset('cuartos/lgo/logo\ \(2\).png')}}') !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            pointer-events: none;
        }

        .recibo h1 {
            text-align: center;
            margin: 0;
            font-size: 36px;
            color: #020202;
            display: inline-block;
        }

        .recibo .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .recibo .fecha-container {
            width: 200px;
        }

        .recibo .fecha-container table {
            border-collapse: collapse;
            width: 100%;
        }

        .recibo .fecha-container th,
        .recibo .fecha-container td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        .recibo .fecha-container th {
            background-color: #dcdcdc;
        }

        .recibo .fecha-container input {
            border: none;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }

        .recibo .fecha-container input:focus {
            outline: none;
        }

        .recibo .empresa-info {
            text-align: right;
        }

        .recibo .empresa-info img {
            width: 100px;
            height: auto;
        }

        .recibo .empresa-info .direccion,
        .recibo .empresa-info .telefono {
            font-size: 12px;
            margin: 0;
        }

        .recibo .content {
            margin-bottom: 20px;
        }

        .recibo .content div {
            margin-bottom: 10px;
        }

        .recibo .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            position: auto;
            bottom: 20px;
            width: 100%;
        }

        .recibo .footer .footer-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .recibo .footer .footer-left .cuentas {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .recibo .footer .footer-left .cuentas div {
            margin-right: 100px;
        }

        .recibo .footer .footer-left .entregue-conforme {
            margin-top: 70px;
        }

        .recibo .footer .footer-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-left: 10px;
        }

        .recibo .footer .footer-right .recibi-conforme {
            margin-top: 0;
        }

        .print-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .print-button i {
            margin-right: 10px;
        }

        .print-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <button onclick="printReceipt()" class="print-button no-print">
        <i class="fas fa-print no-print"></i> Imprimir Recibo
    </button>
    <div class="recibo">
        <div class="watermark"></div>
        <div class="header">
            <div class="fecha-container">
                <table>
                    <tr>
                        <th>DÍA</th>
                        <th>MES</th>
                        <th>AÑO</th>
                    </tr>
                    <tr>
                        <td><input type="text" value="{{ $dia }}" readonly></td>
                        <td><input type="text" value="{{ $mes }}" readonly></td>
                        <td><input type="text" value="{{ $anio }}" readonly></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1>RECIBO</h1>
            </div>
            <div class="empresa-info">
                <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="Logo de la empresa">
                <p class="direccion">B/Urkupiña C/Santa Bárbara N° 471</p>
                <p class="telefono">Cel: 76095949-78538094</p>
            </div>
        </div><br><br>
        <div class="content">
            <div>Recibí de: <span class="line">{{$recibos->contrato->inquilino->nombre_completo ?? 'n/a '}}</span></div><br>
            <div>La suma de: <span class="line">{{$recibos->suma_de}}</span></div><br>
            <div>Por concepto de: <span class="line">{{$recibos->descripcion}}</span></div>
        </div><br><br>
        <div class="footer">
            <div class="footer-left">
                <div class="cuentas">
                    <div>A cuenta: <span>{{$recibos->a_cuenta}}</span></div>
                    <div>Saldo: <span>{{$recibos->debe}}</span></div>
                    <div>Total: <span>{{$recibos->monto_total}}</span></div>
                </div>
                <div class="entregue-conforme">ENTREGUE CONFORME</div>
                <label>{{$recibos->contrato->inquilino->nombre_completo ?? 'n/a '}}</label>
            </div>
            <div class="footer-right">
                <div class="recibi-conforme">RECIBÍ CONFORME</div>
                <label>{{Auth::user()->name}}</label>
            </div>
        </div>
    </div>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</body>

</html>