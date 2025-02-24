<!-- resources/views/inquilinos.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Inquilinos</title>
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
                            <h2>Listado de Inquilinos</h2>
                        </div>
                        <div class="me-3 my-3 text-end">
                            <button type="button" class="btn btn-primary" onclick="openAddModalInquilino()">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                                Agregar Inquilino
                            </button>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paterno</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Materno</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CI</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Correo</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono de Referencia</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($inquilinos as $inquilino)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $inquilino->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->nombre }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->paterno }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->materno }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->ci }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->telefono }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->correo }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $inquilino->telefono_referencia }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-success btn-sm" onclick="openModalEditInquilino({{ $inquilino->id }})">
                                                    <i class="far fa-edit" style="font-size: 20px"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No hay inquilinos registrados.</td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Inquilino</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddInquilino" action="/inquilino-register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nombre_add_inquilino">Nombre:</label>
                                    <input type="text" id="nombre_add_inquilino" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="paterno_add_inquilino">Paterno:</label>
                                    <input type="text" id="paterno_add_inquilino" name="paterno" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="materno_add_inquilino">Materno:</label>
                                    <input type="text" id="materno_add_inquilino" name="materno" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ci_add_inquilino">CI:</label>
                                    <input type="text" id="ci_add_inquilino" name="ci" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_add_inquilino">Teléfono:</label>
                                    <input type="text" id="telefono_add_inquilino" name="telefono" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo_add_inquilino">Correo:</label>
                                    <input type="email" id="correo_add_inquilino" name="correo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_referencia_add_inquilino">Teléfono de Referencia:</label>
                                    <input type="text" id="telefono_referencia_add_inquilino" name="telefono_referencia" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Agregar Inquilino</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal flotante editar inquilinos -->
            <div class="modal fade" id="myModalEditInquilino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Inquilino</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFormInquilino" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nombre_edit_inquilino">Nombre:</label>
                                    <input type="text" id="nombre_edit_inquilino" name="nombre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="paterno_edit_inquilino">Paterno:</label>
                                    <input type="text" id="paterno_edit_inquilino" name="paterno" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="materno_edit_inquilino">Materno:</label>
                                    <input type="text" id="materno_edit_inquilino" name="materno" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ci_edit_inquilino">CI:</label>
                                    <input type="text" id="ci_edit_inquilino" name="ci" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_edit_inquilino">Teléfono:</label>
                                    <input type="text" id="telefono_edit_inquilino" name="telefono" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo_edit_inquilino">Correo:</label>
                                    <input type="email" id="correo_edit_inquilino" name="correo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono_referencia_edit_inquilino">Teléfono de Referencia:</label>
                                    <input type="text" id="telefono_referencia_edit_inquilino" name="telefono_referencia" class="form-control" required>
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
                function openModalEditInquilino(id) {
                    fetch(`/inquilinos/edit/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('nombre_edit_inquilino').value = data.nombre;
                            document.getElementById('paterno_edit_inquilino').value = data.paterno;
                            document.getElementById('materno_edit_inquilino').value = data.materno;
                            document.getElementById('ci_edit_inquilino').value = data.ci;
                            document.getElementById('telefono_edit_inquilino').value = data.telefono;
                            document.getElementById('correo_edit_inquilino').value = data.correo;
                            document.getElementById('telefono_referencia_edit_inquilino').value = data.telefono_referencia;
                            document.getElementById('editFormInquilino').action = `/inquilin-update/${id}`;
                            $('#myModalEditInquilino').modal('show'); // Utiliza el método de Bootstrap para mostrar el modal
                        });
                }

                // Función para abrir el modal de agregar
                function openAddModalInquilino() {
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