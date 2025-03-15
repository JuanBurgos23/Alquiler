<!-- resources/views/inquilinos.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Recibos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre Inquilino</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CI</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Monto Total</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recibos as $recibo)
                                    <tr>
                                        <td class="align-middle text-center">{{ $recibo->id }}</td>
                                        <td class="align-middle text-center">{{ $recibo->fecha_pago }}</td>
                                        <td class="align-middle text-center">{{ $recibo->contrato->inquilino->nombre_completo ?? 'N/A' }}</td>
                                        <td class="align-middle text-center">{{ $recibo->contrato->inquilino->telefono ?? 'N/A' }}</td>
                                        <td class="align-middle text-center">{{ $recibo->contrato->inquilino->ci ?? 'N/A' }}</td>
                                        <td class="align-middle text-center">{{ $recibo->monto_total }}</td>

                                        <!-- Estado -->
                                        <td class="align-middle text-center">
                                            <span class="badge {{ $recibo->estado == 'Deuda' ? 'bg-danger' : 'bg-success' }}">
                                                {{ $recibo->estado }}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <a class="btn btn-success btn-sm" href="{{ route('Detalle_recibo', ['id' => $recibo->id]) }}">Ver</a>

                                            <!-- Botón para pagar si hay deuda -->
                                            @if($recibo->debe > 0)
                                            <button class="btn btn-warning btn-sm pagar-btn"
                                                data-id="{{ $recibo->id }}"
                                                data-total="{{ $recibo->monto_total }}"
                                                data-debe="{{ $recibo->debe }}"
                                                data-toggle="modal" data-target="#modalPago">
                                                Pagar
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No hay Recibos registrados.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Pagar Recibo -->
        <div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="modalPagoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPagoLabel">Realizar Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formPago" method="POST" action="{{ route('actualizar_pago') }}">
                            @csrf
                            <input type="hidden" id="recibo_id" name="id">

                            <div class="form-group">
                                <label>Monto Total</label>
                                <input type="text" class="form-control" id="monto_total" readonly>
                            </div>

                            <div class="form-group">
                                <label>Pagado Anteriormente</label>
                                <input type="text" class="form-control" id="pagado_anteriormente" readonly>
                            </div>

                            <div class="form-group">
                                <label>Saldo Pendiente</label>
                                <input type="text" class="form-control" id="saldo_pendiente" readonly>
                            </div>

                            <div class="form-group">
                                <label>Monto a Pagar</label>
                                <input type="number" class="form-control" id="pago_realizado" name="pago_realizado" min="1" required>
                            </div>

                            <div class="form-group">
                                <label>Método de Pago</label>
                                <select class="form-control" id="metodo_pago" name="metodo_pago">
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Pagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {
                $('.pagar-btn').click(function() {
                    let id = $(this).data('id');
                    let total = $(this).data('total');
                    let debe = $(this).data('debe');

                    $('#recibo_id').val(id);
                    $('#monto_total').val(total);
                    $('#saldo_pendiente').val(debe);
                    $('#pagado_anteriormente').val(total - debe); // Calcula lo pagado previamente
                    $('#pago_realizado').val(''); // Limpiar el campo de pago al abrir el modal

                    // Guardar el valor original de la deuda para cálculos
                    $('#pago_realizado').data('deuda-original', debe);

                    $('#modalPago').modal('show');
                });

                // Evento para actualizar el saldo pendiente cuando el usuario ingresa un monto de pago
                $('#pago_realizado').on('input', function() {
                    let montoPago = parseFloat($(this).val()) || 0; // Obtener el monto ingresado o 0 si está vacío
                    let deudaOriginal = parseFloat($('#pago_realizado').data('deuda-original')) || 0; // Obtener la deuda original

                    let nuevoSaldo = deudaOriginal - montoPago; // Calcular nuevo saldo pendiente

                    $('#saldo_pendiente').val(nuevoSaldo < 0 ? 0 : nuevoSaldo); // Evitar valores negativos
                });


            });
        </script>
    </main>
</x-layout>

<style>
    .bg-light-gray {
        background-color: #d6d8db;
    }
</style>

</html>