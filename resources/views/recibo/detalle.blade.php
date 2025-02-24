<!-- resources/views/inquilinos.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</head>


<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
            <!-- Navbar content -->
        </nav>
        <!-- End Navbar -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="container-fluid py-4">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <h2>Listado de Recibos</h2>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h3>Detalle del Recibo #{{ $recibos->id }}</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Datos del Recibo</h5>
                                <p><strong>Fecha:</strong> {{ $recibos->fecha_pago }}</p>
                                <p><strong>Descripción:</strong> {{ $recibos->descripcion }}</p>
                                <p><strong>Metodo de Pago:</strong> {{ $recibos->metodo_pago }}</p>
                                <p><strong>Estado:</strong> {{ $recibos->estado }}</p>
                                <p><strong>Monto:</strong> Bs {{ $recibos->monto_total }}</p>

                                <h5 class="card-title">Datos del Inquilino</h5>
                                <p><strong>Nombre:</strong> {{ $recibos->contrato->inquilino->nombre_completo}}</p>
                                <p><strong>Domicilio:</strong> {{ $recibos->contrato->inquilino->domicilio }}</p>
                                <p><strong>Teléfono:</strong> {{ $recibos->contrato->inquilino->telefono }}</p>
                                <p><strong>Teléfono de Referencia:</strong> {{ $recibos->contrato->inquilino->telefono_referencia }}</p>
                                <p><strong>Correo:</strong> {{ $recibos->contrato->inquilino->correo }}</p>
                                <p><strong>Fecha de Nacimiento:</strong> {{ $recibos->contrato->inquilino->fecha_nac }}</p>



                                <a href="{{route('mostrar_recibos')}}" class="btn btn-primary">Volver</a>
                                <a href="{{ route('recibo.pdf', ['id' => $recibos->id]) }}" target="_blank"
                                class="btn btn-success">Generar PDF</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- Scripts -->
        <script>

        </script>
    </main>
</x-layout>


<style>
    .bg-light-gray {
        background-color: #d6d8db;
        /* Puedes ajustar este color a un gris más claro si prefieres */
    }
</style>

</html>