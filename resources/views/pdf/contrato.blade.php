<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalle de Contrato</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 30px;
            /* Ajusta el margen superior según sea necesario */
        }

        .encabezado {
            text-align: center;
        }

        .encabezado2 {
            text-align: center;
            margin-left: 200px;
            /* Ajusta la separación entre los dos divs según sea necesario */
        }

        .encabezado3 {
            text-align: center;
            margin-top: 20px;
            /* Ajusta la separación entre los dos divs según sea necesario */
        }

        .encabezado p,
        .encabezado2 p,
        .encabezado3 p {
            margin: 0;
            padding: 0;
        }

        .info-box {
            border: 1px solid #000;
            padding: 10px;
            width: 200px;
            /* Ajusta el ancho del cuadro según sea necesario */
            margin: 0 auto;
            /* Centra el cuadro horizontalmente */
            margin-top: 10px;
            /* Espacio entre el cuadro y el texto superior */
        }

        .info-box p {
            margin: 5px 0;
            font-weight: bold;
            text-align: left;
            /* Ajusta el texto a la izquierda dentro del cuadro */
        }

        .linea {
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .detalle {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #000;
            width: 80%;
            margin: 0 auto;
        }

        .detalle p {
            margin: 5px 0;
            text-align: left;
        }

        .declaracion {
            margin-top: 20px;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            width: 80%;
            margin: 0 auto;
        }

        .declaracion p {
            margin: 5px 0;
            text-align: left;

        }

        .denunciante {
            margin-top: 20px;
            width: 80%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            /* Ajusta el espacio entre las columnas según sea necesario */
        }

        .denunciante p {
            font-size: 16px;
            font-weight: bold;
            background-color: lightgray;
            padding: 5px;
            /* Ajusta el relleno según sea necesario */
            grid-column: span 2;
            /* Hace que el título ocupe ambas columnas */
        }

        .denunciante .field {
            background-color: none;
            font-weight: normal;
        }

        .clausula {
            margin-top: 20px;
            width: 80%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            /* Ajusta el espacio entre las columnas según sea necesario */
        }

        .clausula p {
            font-size: 16px;
            padding: 5px;
            /* Ajusta el relleno según sea necesario */
            grid-column: span 2;
            /* Hace que el título ocupe ambas columnas */
        }

        .clausula .field {
            background-color: none;
            font-weight: normal;
        }

        .clausula ol {
            padding-left: 20px;
            list-style: none;
            counter-reset: list;
        }

        .clausula ol li {
            margin-bottom: 5px;
            position: relative;
            padding-left: 20px;
        }

        .clausula ol li::before {
            content: counter(list, lower-alpha) ")";
            counter-increment: list;
            position: absolute;
            left: 0;
        }


        .clausula span.title {
            font-weight: bold;
            text-decoration: underline;
        }


        .firma {
            margin-top: 20px;
            width: 80%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            /* Ajusta el espacio entre las columnas según sea necesario */
        }

        .firma p {
            font-size: 16px;


            padding: 5px;
            /* Ajusta el relleno según sea necesario */
            grid-column: span 2;
            /* Hace que el título ocupe ambas columnas */
        }

        .firma .field {
            background-color: none;
            font-weight: normal;
        }

        .firma1 {
            text-align: center;

        }

        .firma2 {
            text-align: center;
            margin-left: 100px;
            /* Ajusta la separación entre los dos divs según sea necesario */
        }

        .firma1 p,
        .firma2 p {
            margin: 0;
            padding: 0;
        }



        @media print {

            .denunciante p,
            .victima p,
            .denunciado p {
                background-color: lightgray !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }

        @page {
            margin: 20mm;

            @bottom-right {
                content: "Página " counter(page) " de " counter(pages);
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="encabezado">
            <p class="linea" style="font-size: 20px; font-weight: bold;">VIVIENDAS GM</p>
            <p class="linea" style="font-size: 16px;">DIR: B/URKUPIÑA C/SANTA BARBARA</p>

            <p class="linea">Montero Santa Cruz - Bolivia</p>
        </div>
        <div class="encabezado2">
            <img src="{{ asset('cuartos/lgo/logo (2).png') }}" alt="Logo GM" style="width: 35px;">


        </div>
    </div>

    <div class="encabezado3">
        <p style="font-size: 24px; font-weight: bold;">CONTRATO DE ALQUILER DE VIVIENDA</p>
    </div><br>

    <div class="declaracion">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify"></span>
            <span>Conste por el presente documento privado de contrato de ALQUILER DE VIVIENDA, que el mismo a solo reconocimiento de firmas y rúbricas entre partes suscribientes se podrá elevar a documento público; el mismo que es suscrito bajo las siguientes cláusulas: </span>
        </p>

    </div>


    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">PRIMERA.- (PROPIETARIO) </span>
            <span>Yo; {{ Auth::user()->nombre_completo ?? 'N/A' }} con C.I. {{ Auth::user()->ci ?? 'N/A' }}, mayor de edad y hábil por derecho, al presente declaro ser legítimo propietaria de un bien inmueble ubicado en el barrio Urkupiña calle Santa Barbara N° 471: , inmueble que está debidamente registrado en la Oficina de Derechos Reales. </span>
        </p>
    </div>
    <div class="clausula">
        <p>
            <span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">
                SEGUNDA.- (OBJETO),
            </span>
            <span>
                Al presente, por convenir a mis intereses, de mi libre y espontánea voluntad, DOY, en contrato de alquiler
                @php
                $cuartosCount = $contratos->cuartos->count();
                @endphp
                {{ $cuartosCount }}
                CUARTO{{ $cuartosCount > 1 ? 'S' : '' }}
                Nº @foreach ($contratos->cuartos as $index => $cuarto)
                {{ $cuarto->id }}{{ $index < $cuartosCount - 1 ? ',' : '' }}
                @endforeach
                con dimensiones de {{ $cuarto->dimension->ancho }} x {{ $cuarto->dimension->largo }}
                con baño compartido, del inmueble señalado en la cláusula primera, con servicio energía eléctrica,
                a favor del señor(a): {{ $contratos->inquilino->nombre_completo }}
                con C.I. {{ $contratos->inquilino->ci }},
                por acuerdo de partes el canon del alquiler es por la suma de Bs.
                {{ $contratos->monto_total ?? 'N/A' }}.
            </span>
        </p>
    </div>
    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">TERCERA.- FORMA DE PAGO.- </span>
            <span>El inquilino cancelará el alquiler de vivienda al momento de suscribir el presente contrato. </span>
        </p>
    </div>
    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">CUARTA.- PLAZO.- </span>
            <span>Por acuerdo libre de partes el contrato tendrá duración de {{ $contratos->duracion ?? 'N/A' }}, computable desde fecha de ingreso, contrato que se podrá renovar por acuerdo de partes, en consecuencia, a la finalización del presente contrato los inquilinos devolverán al propietario el objeto del presente contrato en las mismas condiciones que reciben.
                El Inquilino debe comunicar al Propietario, con treinta (30) días de antelación a la fecha de terminación del Contrato o de cualquiera de sus prórrogas, su voluntad de no renovar o desocupación del cuarto.
                El Inquilino podrá desistir del Contrato una vez que hayan transcurrido al menos 1 (un mes) a contar desde la fecha de entrada en vigor del Contrato, siempre que notifique verbalmente con treinta (30) días de antelación al Propietario, caso contrario no se aceptara la devolución de su pago de alquiler.
            </span>
        </p>
    </div>

    <div class="clausula">
        <p><span class="title" style="font-size: 16px; font-weight: bold; text-decoration: underline;">QUINTA.- </span>
            <span>
                El inquilino, se comprometen a cuidar, conservar en buen estado los ambientes que recibe en calidad de alquiler y a usar dicho inmueble exclusivamente como vivienda del inquilino; para el pago de servicio de:@foreach ($contratos->servicios as $servicio)
                {{ $servicio->nombre }},
                @endforeach
                será cancelado por el inquilino es decir conjuntamente con otros ocupantes del inmueble de acuerdo a la factura del servicio. Por otra parte, el inquilino es responsable de cualquier destrucción o deterioro que pudiera producirse durante la vigencia del contrato, salvo aquellos que por desgaste normal o por uso corriente que se hubieran producido.
                En relación con el uso del Inmueble, queda estrictamente prohibido:
            </span>

        <ol>
            <li>Cualquier otro tipo de uso distinto al descrito en el apartado anterior.</li>
            <li>La cesión del contrato sin el consentimiento previo y por escrito del Arrendador.</li>
            <li>Destinarla al hospedaje de carácter vacacional.</li>
            <li>Por las dimensiones del Inmueble, el número máximo de personas que podrán ocuparlo es de {{ $contratos->nro_personas ?? 'N/A' }} incluyendo al Inquilino.</li>
        </ol>
        <p>
            <span>
                El incumplimiento por el Inquilino de esta obligación esencial facultará al Propietario a resolver el presente Contrato.
                Se obliga al inquilino a cumplir y respetar en todo momento los estatutos y normas internas de la comunidad de propietarios a la que pertenece el Inmueble, que declara conocer y aceptar. Además, se compromete a no molestar ni perjudicar la pacífica convivencia del resto de vecinos de la comunidad.
                Se prohíbe expresamente al Inquilino tener en el Inmueble cualquier tipo de animal doméstico, salvo con el consentimiento del Propietario. El incumplimiento de la presente obligación será considerado causa suficiente para la resolución del Contrato.
            </span>
        </p>
    </div>

    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">SEXTA (USO Y DEVOLUCIÓN).- </span>
            <span>El inquilino recibe el inmueble en perfectas condiciones de habitabilidad, buen estado de conservación y funcionamientos de sus servicios y a la entera satisfacción para uso de vivienda quedando prohibido darle otro uso, o sub alquilar a terceras personas bajo alternativa de resolución de contrato.
                El propietario hace entrega al inquilino una llave del portón de ingreso y una del cuarto.

            </span>
        </p>
    </div>

    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify">SEPTIMA .- </span>
            <span>Yo, por un lado Sr(a). {{Auth::user()->nombre_completo}} como propietario, y por otra parte {{$contratos->inquilino->nombre_completo}}. calidad de inquilino(a), declaramos nuestra plena conformidad a cada una de las clausulas estipuladas en el presente documento, por lo que firmamos al pie del mismo.

            </span>
        </p>
    </div>
    <div class="clausula">
        <p><span style="font-size: 16px; font-weight: bold; text-decoration: underline;" text-align="justify"></span>
            <span>{{ \Carbon\Carbon::parse($contratos->created_at)->locale('es')->translatedFormat('d \d\e F \d\e Y') }}

            </span>
        </p>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="firma">
        <div class="firma1">
            <p>{{ $contratos->inquilino->nombre_completo }}</p>
            <p>INQUILINO(A)</p>

        </div>

        <div class="firma2">
            <p class="linea">{{ Auth::user()->nombre_completo ?? 'N/A' }}</p>
            <p class="linea">PROPIETARIO(A) INMUEBLE</p>
        </div>

    </div>
    <br>
    <br>

</body>

</html>