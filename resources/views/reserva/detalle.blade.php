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
                        <h2>Listado de Reservas</h2>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h3>Detalle de la Reserva #{{ $reservas->id }}</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Datos de la Reserva</h5>
                                <p><strong>Fecha de Inicio:</strong> {{ $reservas->fecha_inicio }}</p>
                                <p><strong>Fecha de Fin:</strong> {{ $reservas->fecha_fin }}</p>
                                <p><strong>Hora de Reserva:</strong> {{ $reservas->hora_reserva }}</p>
                                <p><strong>Descripción:</strong> {{ $reservas->descripcion }}</p>
                                <p><strong>Forma de Pago:</strong> {{ $reservas->forma_pago }}</p>
                                <p><strong>Estado:</strong> {{ $reservas->estado }}</p>
                                <p><strong>Monto:</strong> Bs {{ $reservas->monto }}</p>

                                <h5 class="card-title">Datos del Inquilino</h5>
                                <p><strong>Nombre:</strong> {{ $reservas->inquilino->nombre }} {{ $reservas->inquilino->paterno }} {{ $reservas->inquilino->materno }}</p>
                                <p><strong>Domicilio:</strong> {{ $reservas->inquilino->domicilio }}</p>
                                <p><strong>Teléfono:</strong> {{ $reservas->inquilino->telefono }}</p>
                                <p><strong>Teléfono de Referencia:</strong> {{ $reservas->inquilino->telefono_referencia }}</p>
                                <p><strong>Correo:</strong> {{ $reservas->inquilino->correo }}</p>
                                <p><strong>Fecha de Nacimiento:</strong> {{ $reservas->inquilino->fecha_nac }}</p>

                                <h5 class="card-title">Datos del Cuarto</h5>
                                @foreach ($reservas->cuartos as $cuarto)
                                <p><strong>Cuarto #{{ $cuarto->id }}</strong></p>
                                <p><strong>Dimensiones:</strong> {{ $cuarto->dimension->ancho }} x {{ $cuarto->dimension->largo }}</p>
                                <p><strong>Precio:</strong> Bs {{ $cuarto->precio }}</p>
                                <p><strong>Estado:</strong> {{ $cuarto->estado }}</p>

                                <h6>Imágenes del Cuarto</h6>
                                <div class="row">
                                    @foreach ($cuarto->imagenes as $imagen)
                                    <div class="col-md-4 mb-4">
                                        <a href="{{ asset($imagen->nombre) }}" target="_blank">
                                            <img src="{{ asset($imagen->nombre) }}" class="img-fluid img-thumbnail" style="max-width: 100%;" alt="Imagen del Cuarto">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach


                                <a href="{{route('mostrar_reservas')}}" class="btn btn-primary">Volver</a>
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