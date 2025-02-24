<!-- resources/views/inquilinos.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Servicios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
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
                            <h2>Listado de Servicios</h2>
                        </div>
                        <div class="me-3 my-3 text-end">
                            <button type="button" class="btn btn-primary" onclick="openAddModalServicio()">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                                Agregar Servicio
                            </button>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($servicios as $servicio)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $servicio->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $servicio->nombre }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $servicio->precio }}</h6>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center">
                                                <button class="btn btn-success btn-sm" onclick="openModalEditServicio({{ $servicio->id }})">
                                                    <i class="far fa-edit" style="font-size: 20px"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No hay servicios registrados.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal flotante agregar inquilinos -->
            <div class="modal fade" id="myModalAddInquilino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddInquilino" action="/agregar-servicio" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre_add_inquilino">Nombre:</label>
                                    <input type="text" id="nombre_add_servicio" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="paterno_add_inquilino">Precio:</label>
                                    <input type="text" id="precio_add_servicio" name="precio" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Agregar Servicio</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal flotante editar inquilinos -->
            <div class="modal fade" id="myModalEditInquilino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Servicio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFormInquilino" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nombre_edit_inquilino">Nombre:</label>
                                    <input type="text" id="nombre_edit_servicio" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="paterno_edit_inquilino">Precio:</label>
                                    <input type="text" id="precio_edit_servicio" name="precio" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripts -->
            <script>
                // Función para abrir el modal de edición
                function openModalEditServicio(id) {
                    fetch(`/servicio/edit/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('nombre_edit_servicio').value = data.nombre;
                            document.getElementById('precio_edit_servicio').value = data.precio;
                            document.getElementById('editFormInquilino').action = `/servicio/update/${id}`;
                            $('#myModalEditInquilino').modal('show'); // Utiliza el método de Bootstrap para mostrar el modal
                        });
                }

                // Función para abrir el modal de agregar
                function openAddModalServicio() {
                    $('#myModalAddInquilino').modal('show'); // Utiliza el método de Bootstrap para mostrar el modal
                }

                // Cerrar modal al hacer clic en el botón de cerrar (x)
                var spanEditInquilino = document.querySelector('#myModalEditInquilino .btn-close');
                if (spanEditInquilino) {
                    spanEditInquilino.onclick = function() {
                        $('#myModalEditInquilino').modal('hide');
                    }
                }

                // Cerrar modal al hacer clic fuera del mismo
                window.onclick = function(event) {
                    if (event.target === document.querySelector('#myModalEditInquilino')) {
                        $('#myModalEditInquilino').modal('hide');
                    }
                }
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