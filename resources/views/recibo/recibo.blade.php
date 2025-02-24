<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <link rel="icon" href="{{asset('cuartos/cuarto1.jpg')}}" type="image/png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
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
        <div class="container">
            <div class="receipt">
                <h1 class="text-center">Recibo</h1>
                <hr>
                <form action="{{ route('Otro_Recibo') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <p><strong>Fecha de Pago:</strong>
                                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago">
                            </p>
                            <label class="img-fluid qr-image1" id="qr_image1" style="display: none;" for="qr_code">Código QR:</label>
                            <div id="qr_image" class="form-group" style="display: none;">
                                <img src="{{ asset('cuartos/QR.jpg') }}" alt="Código QR" class="img-fluid qr-image">
                            </div>
                            <p><strong>Recibi de:</strong> <input type="text" class="form-control" id="recibi_de" name="recibi_de" ></p>
                            <div class="form-group">
                                <label for="suma_de">La Suma de:</label>
                                <input type="text" class="form-control" id="suma_de" name="suma_de">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="descripcion">Por Concepto de:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="a_cuenta">A cuenta:</label>
                                <input type="text" class="form-control" id="a_cuenta" name="a_cuenta" oninput="calculateTotal()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="saldo">Saldo:</label>
                                <input type="text" class="form-control" id="saldo" name="saldo" oninput="calculateTotal()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monto_total">Monto Total:</label>
                                <input type="text" class="form-control" id="monto_total" name="monto_total" value="{{ $total ?? 'n/a' }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="metodo_pago">Método de Pago:</label>
                                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="QR">QR</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <button type="submit" class="btn btn-primary btn-block no-print">Guardar Recibo</button>

                </form>
            </div>
        </div>

        <script>
            function calculateTotal() {
                var aCuenta = parseFloat(document.getElementById('a_cuenta').value) || 0;
                var saldo = parseFloat(document.getElementById('saldo').value) || 0;
                var montoTotal = aCuenta + saldo;
                document.getElementById('monto_total').value = montoTotal.toFixed(2);
            }

            $(document).ready(function() {
                $('#metodo_pago').on('change', function() {
                    if ($(this).val() == 'QR') {
                        $('#qr_image').show();
                        $('#qr_image1').show();
                    } else {
                        $('#qr_image').hide();
                        $('#qr_image1').hide();
                    }
                });
            });
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