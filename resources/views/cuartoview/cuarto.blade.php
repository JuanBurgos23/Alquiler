<!-- resources/views/otra-vista.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Listado de Cuartos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
            @if(session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
            @endif
            <div class="container-fluid py-4">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <h2>Listado de Cuartos</h2>
                        </div>
                        <div class="me-3 my-3 text-end">
                            <button type="button" class="btn btn-primary" onclick="openAddModalCuarto()">
                                <i class="fas fa-plus" style="font-size: 20px"></i>
                                Agregar Cuarto
                            </button>
                            <i clas="fas fa-plus"></i>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PRECIO</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ESTADO</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LARGO</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ANCHO</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IMAGENES</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cuartos as $cuarto)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $cuarto->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cuarto->precio }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cuarto->estado }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cuarto->dimension->largo }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $cuarto->dimension->ancho }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($cuarto->imagenes->count() > 0)
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEvidencias" onclick="loadImages({{ $cuarto->id }})">
                                                    Mostrar Imágenes
                                                </button>
                                                @else
                                                No hay Imagenes disponibles.
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-success btn-sm" onclick="openModalEditCuarto({{ $cuarto->id }})">
                                                    <i class="far fa-edit" style="font-size: 20px"></i>
                                                </button>
                                            </td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No hay cuartos registrados.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal flotante agregar cuartos -->
            <div class="modal fade" id="myModalAddCuarto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Cuarto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAddCuarto" action="cuarto-register" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="precio_add_cuarto">Precio:</label>
                                    <input type="text" id="precio_add_cuarto" name="precio" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado_add_cuarto">Estado:</label>
                                    <input type="text" id="estado_add_cuarto" name="estado" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="largo_add_cuarto">Largo:</label>
                                    <input type="text" id="largo_add_cuarto" name="largo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ancho_add_cuarto">Ancho:</label>
                                    <input type="text" id="ancho_add_cuarto" name="ancho" class="form-control" required>
                                </div>
                                <!-- Subir Imágenes de Evidencia -->
                                <div style="flex: 0 0 auto; width: 20%;">
                                    <label for="imagenes" class="form-label">Subir Imágenes del Cuarto</label>
                                    <div id="imagenes_container"></div>
                                    <input type="file" id="imagenes" name="imagenes[]" multiple class="form-control" onchange="previsualizarImagenes()">
                                    <input type="hidden" id="imagenes_ids_hidden" name="imagenes_ids" value="">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Agregar Cuarto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal para editar cuarto -->
            <div class="modal fade" id="myModalEditCuarto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Cuarto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFormCuarto" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Campos del formulario -->
                                <div class="form-group">
                                    <label for="precio_edit_cuarto">Precio:</label>
                                    <input type="text" id="precio_edit_cuarto" name="precio" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado_edit_cuarto">Estado:</label>
                                    <input type="text" id="estado_edit_cuarto" name="estado" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="largo_edit_cuarto">Largo:</label>
                                    <input type="text" id="largo_edit_cuarto" name="largo" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="ancho_edit_cuarto">Ancho:</label>
                                    <input type="text" id="ancho_edit_cuarto" name="ancho" class="form-control" required>
                                </div>
                                <div id="imagenes_edit_container" class="d-flex flex-wrap">
                                    <!-- Imágenes existentes se cargarán aquí -->
                                </div>
                                <div class="form-group">
                                    <label for="nuevas_imagenes">Agregar nuevas imágenes</label>
                                    <input type="file" id="nuevas_imagenes" name="imagenes[]" multiple class="form-control" onchange="previsualizarImagenes()">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal para mostrar imagenes -->
            <div class="modal fade" id="modalEvidencias" tabindex="-1" aria-labelledby="modalEvidenciasLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-light-gray">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEvidenciasLabel">Imagenes del
                                Cuarto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($cuarto->imagenes as $imagen)
                                <div class="col-md-4 mb-4">
                                    <a href="{{ asset($imagen->nombre) }}" target="_blank">
                                        <img src="{{ asset($imagen->nombre) }}" class="img-fluid img-thumbnail" style="max-width: 100%;" alt="Evidencia">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                function openModalEditCuarto(id) {
                    fetch(`/cuartos/edit/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            if (!data) {
                                throw new Error('No se recibieron datos del servidor');
                            }

                            // Asignar los valores a los campos del formulario
                            document.getElementById('precio_edit_cuarto').value = data.precio;
                            document.getElementById('estado_edit_cuarto').value = data.estado;
                            document.getElementById('largo_edit_cuarto').value = data.dimension.largo;
                            document.getElementById('ancho_edit_cuarto').value = data.dimension.ancho;
                            document.getElementById('editFormCuarto').action = `/cuarto-update/${id}`;

                            // Cargar las imágenes existentes en el modal
                            var imagenesEditContainer = document.getElementById('imagenes_edit_container');
                            imagenesEditContainer.innerHTML = ''; // Limpia imágenes previas

                            // Verificar que data.imagenes es un array
                            if (Array.isArray(data.imagenes)) {
                                data.imagenes.forEach(imagen => {
                                    var imageContainer = document.createElement('div');
                                    imageContainer.classList.add('imagen-container', 'm-2');

                                    var image = document.createElement('img');
                                    image.src = `${window.location.origin}/${imagen.nombre}`;
                                    image.classList.add('img-thumbnail');
                                    image.style.maxWidth = '100px';
                                    image.style.maxHeight = '100px';

                                    var deleteButton = document.createElement('button');
                                    deleteButton.textContent = 'Eliminar';
                                    deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-2');
                                    deleteButton.onclick = function(event) {
                                        event.preventDefault();
                                        deleteImage(imagen.id, imageContainer);
                                    };

                                    imageContainer.appendChild(image);
                                    imageContainer.appendChild(deleteButton);
                                    imagenesEditContainer.appendChild(imageContainer);
                                });
                            }

                            // Mostrar el modal
                            var myModal = new bootstrap.Modal(document.getElementById('myModalEditCuarto'));
                            myModal.show();
                        })
                        .catch(error => {
                            console.error('Error al abrir el modal:', error);
                        });
                }

                function deleteImage(imagenId, imageContainer) {
                    fetch(`/imagenes/delete/${imagenId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.text().then(text => {
                                    throw new Error(text)
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                imageContainer.remove(); // Eliminar la imagen del modal
                            } else {
                                alert('Error al eliminar la imagen');
                            }
                        })
                        .catch(error => {
                            console.error('Error al eliminar la imagen:', error);
                            alert('Error al eliminar la imagen: ' + error.message);
                        });
                }

                // Función para abrir el modal de agregar
                function openAddModalCuarto() {
                    $('#myModalAddCuarto').modal('show'); // Utiliza el método de Bootstrap para mostrar el modal
                }

                // Cerrar modal al hacer clic en el botón de cerrar (x)
                var spanEditCuarto = document.querySelector('#myModalEditCuarto .btn-close');
                if (spanEditCuarto) {
                    spanEditCuarto.onclick = function() {
                        $('#myModalEditCuarto').modal('hide');
                    }
                }

                // Cerrar modal al hacer clic fuera del mismo
                window.onclick = function(event) {
                    if (event.target === document.querySelector('#myModalEditCuarto')) {
                        $('#myModalEditCuarto').modal('hide');
                    }
                }


                //imagenes    
                function previsualizarImagenes() {
                    var input = document.getElementById('imagenes');
                    var imagenesContainer = document.getElementById('imagenes_container');

                    if (input.files && input.files.length) {
                        for (var i = 0; i < input.files.length; i++) {
                            var reader = new FileReader(); // Crear un objeto FileReader para leer archivos

                            reader.onload = function(e) {
                                var imageContainer = document.createElement('div'); // Contenedor para cada imagen
                                imageContainer.classList.add('imagen-container'); // Añadir clase CSS al contenedor

                                var image = document.createElement('img'); // Elemento de imagen
                                image.src = e.target.result; // Asignar la URL de la imagen al atributo src

                                var deleteButton = document.createElement('button'); // Botón para eliminar la imagen
                                deleteButton.textContent = 'Eliminar'; // Texto del botón

                                deleteButton.onclick = function() {
                                    imageContainer.remove(); // Eliminar el contenedor de imagen al hacer clic en el botón
                                };

                                imageContainer.appendChild(image); // Agregar la imagen al contenedor
                                imageContainer.appendChild(deleteButton); // Agregar el botón al contenedor
                                imagenesContainer.appendChild(imageContainer); // Agregar el contenedor al contenedor principal
                            };

                            reader.readAsDataURL(input.files[i]); // Leer el archivo como una URL de datos
                        }
                    }
                }


                //boton imagenes
                function loadImages(cuartoId) {
                    fetch(`/cuartos/${cuartoId}/imagenes`)
                        .then(response => response.json())
                        .then(data => {
                            const modalBody = document.querySelector('#modalEvidencias .modal-body .row');
                            modalBody.innerHTML = ''; // Limpia las imágenes existentes

                            data.imagenes.forEach(imagen => {
                                const col = document.createElement('div');
                                col.className = 'col-md-4 mb-4';

                                const link = document.createElement('a');
                                link.href = `${window.location.origin}/${imagen.nombre}`;
                                link.target = '_blank';

                                const img = document.createElement('img');
                                img.src = `${window.location.origin}/${imagen.nombre}`;
                                img.className = 'img-fluid img-thumbnail';
                                img.style.maxWidth = '100%';

                                link.appendChild(img);
                                col.appendChild(link);
                                modalBody.appendChild(col);
                            });

                            var myModal = new bootstrap.Modal(document.getElementById('modalEvidencias'));
                            myModal.show();
                        })
                        .catch(error => {
                            console.error('Error al cargar las imágenes:', error);
                        });
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