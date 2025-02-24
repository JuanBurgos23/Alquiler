<!-- resources/views/inquilinos.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cotrato</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">





    <style type="text/css">
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            .form-section {
                display: inline !important
            }

            .form-pagebreak {
                display: none !important
            }

            .form-section-closed {
                height: auto !important
            }

            .page-section {
                position: initial !important
            }
        }
    </style>
    <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.55595&themeRevisionID=65660e4b326633110492e01a" />
    <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/css/styles/payment/payment_styles.css?3.3.55595" />
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/css/styles/payment/payment_feature.css?3.3.55595" />
    <link href="https://cdn02.jotfor.ms/js/vendor/widearea/widearea.css?v=3.3.55595" type="text/css" rel="stylesheet" />
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

                <form action="{{route('contrato_register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div role="main" class="form-all">
                        <div class="form-section page-section">
                            <li id="cid_1" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group  header-large">
                                    <div class="header-text httac htvam">
                                        <h1 id="header_1" class="form-header" data-component="header">CONTRATO</h1>

                                    </div>
                                </div>
                            </li>

                            <li id="cid_3" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group  header-default">
                                    <div class="header-text httal htvam">
                                        <h2 id="header_3" class="form-header" data-component="header">Datos del Inqulino</h2>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_4" data-compound-hint=",,">
                                <div id="cid_4" class="form-input-wide" data-layout="full">
                                    <div data-wrapper-react="true" class="extended">
                                        <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                                            <input type="text" id="nombre" name="nombre" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" data-component="first" aria-labelledby="label_4 sublabel_4_first" value="" />
                                            <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px">Nombre</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="text" id="paterno" name="paterno" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Paterno</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="text" id="materno" name="materno" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Materno</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="text" id="ci" name="ci" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">CI</label>

                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_4" data-compound-hint=",,">
                                <div id="cid_4" class="form-input-wide" data-layout="full">
                                    <div data-wrapper-react="true" class="extended">

                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="middle">
                                            <input type="text" id="telefono" name="telefono" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 additional-name" size="10" data-component="middle" aria-labelledby="label_4 sublabel_4_middle" value="" />
                                            <label class="form-sub-label" for="middle_4" id="sublabel_4_middle" style="min-height:13px">Telefono</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="email" id="correo" name="correo" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Correo</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                                            <input type="text" id="telefono_referencia" name="telefono_referencia" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" data-component="first" aria-labelledby="label_4 sublabel_4_first" value="" />
                                            <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px">Telefono Referencia</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                                            <input type="text" id="domicilio" name="domicilio" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" data-component="first" aria-labelledby="label_4 sublabel_4_first" value="" />
                                            <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px">Domicilio</label>

                                        </span><span>

                                    </div>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_4" data-compound-hint=",,">
                                <div id="cid_4" class="form-input-wide" data-layout="full">
                                    <div data-wrapper-react="true" class="extended">

                                        <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                                            <input type="date" id="fecha_nac" name="fecha_nac" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" data-component="first" aria-labelledby="label_4 sublabel_4_first" value="" />
                                            <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px">Fecha de Nacimiento</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">

                                    </div>
                                </div>
                            </li>
                            <li id="cid_3" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group  header-default">
                                    <div class="header-text httal htvam">
                                        <h2 id="header_3" class="form-header" data-component="header">Datos del Contrato</h2>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_4" data-compound-hint=",,">
                                <div id="cid_4" class="form-input-wide" data-layout="full">
                                    <div data-wrapper-react="true" class="extended">
                                        <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                                            <input type="date" id="fecha_contrato" name="fecha_contrato" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 given-name" size="10" data-component="first" aria-labelledby="label_4 sublabel_4_first" value="" />
                                            <label class="form-sub-label" for="first_4" id="sublabel_4_first" style="min-height:13px">Fecha de Contrato</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="time" id="hora_contrato" name="hora_contrato" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Hora de Contrato</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="text" id="descripcion" name="descripcion" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Descripcion</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="text" id="forma_pago" name="forma_pago" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">Forma de Pago</label>

                                        </span>

                                    </div>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_fullname" id="id_4" data-compound-hint=",,">
                                <div id="cid_4" class="form-input-wide" data-layout="full">
                                    <div data-wrapper-react="true" class="extended">

                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="middle">
                                            <input type="text" id="duracion" name="duracion" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 additional-name" size="10" data-component="middle" aria-labelledby="label_4 sublabel_4_middle" value="" />
                                            <label class="form-sub-label" for="middle_4" id="sublabel_4_middle" style="min-height:13px">Duracion</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                                            <input type="number" id="nro_personas" name="nro_personas" class="form-textbox" data-defaultvalue="" autoComplete="section-input_4 family-name" size="15" data-component="last" aria-labelledby="label_4 sublabel_4_last" value="" />
                                            <label class="form-sub-label" for="last_4" id="sublabel_4_last" style="min-height:13px">N° Personas</label>
                                        </span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last"></span>
                                    </div>
                                </div>
                            </li>
                            <div class="container mt-5">
                                <!-- Sección para seleccionar cuartos -->
                                <li id="cid_3" class="form-input-wide" data-type="control_head">
                                    <div class="form-header-group header-default">
                                        <div class="header-text httal htvam">
                                            <h2 id="header_3" class="form-header" data-component="header">Seleccionar Cuarto</h2>
                                        </div>
                                    </div>
                                </li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuartosModal">
                                    Seleccionar Cuarto
                                </button>
                                <div id="cuartosSeleccionados" class="mt-4">
                                    <h5>Cuartos Seleccionados:</h5>
                                    <!-- Campo oculto para almacenar los IDs de los cuartos seleccionados -->
                                    <input type="hidden" id="cuartosSeleccionadosInput" name="cuartosSeleccionados">
                                    <ul id="listaCuartosSeleccionados" class="list-group">
                                        <!-- Cuartos seleccionados se añadirán aquí -->
                                    </ul>
                                </div>
                                <br>

                                <!-- Modal -->
                                <div class="modal fade" id="cuartosModal" tabindex="-1" role="dialog" aria-labelledby="cuartosModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-light-gray">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cuartosModalLabel">Seleccionar Cuarto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach($cuartosDisponibles as $cuarto)
                                                    <div class="col-md-4">
                                                        <div class="card mb-4">
                                                            @if($cuarto->imagenes->isNotEmpty())
                                                            <img src="{{ asset('' . $cuarto->imagenes->first()->nombre) }}" class="card-img-top" alt="Imagen del cuarto">
                                                            @endif
                                                            <div class="card-body">
                                                                <h5 class="card-title">Cuarto #{{ $cuarto->id }}</h5>
                                                                <p class="card-text">Dimensiones: {{ $cuarto->dimension->ancho }} x {{ $cuarto->dimension->largo }}</p>
                                                                <p class="card-text">Precio: Bs {{ $cuarto->precio }}</p>
                                                                <button type="button" class="btn btn-success" onclick="seleccionarCuarto({{ $cuarto->id }}, '{{ $cuarto->dimension->ancho }} x {{ $cuarto->dimension->largo }}', {{ $cuarto->precio }}, '{{ $cuarto->imagenes->isNotEmpty() ? asset('' . $cuarto->imagenes->first()->nombre) : asset('path/to/default-image.jpg') }}')">Seleccionar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Servicios-->
                            <div class="container mt-5">
                                <!-- Sección para seleccionar servicios -->
                                <li id="cid_3" class="form-input-wide" data-type="control_head">
                                    <div class="form-header-group header-default">
                                        <div class="header-text httal htvam">
                                            <h2 id="header_3" class="form-header" data-component="header">Seleccionar Servicio</h2>
                                        </div>
                                    </div>
                                </li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#serviciosModal">
                                    Seleccionar Servicio
                                </button>
                                <div id="serviciosSeleccionados" class="mt-4">
                                    <h5>Servicios Seleccionados:</h5>
                                    <!-- Campo oculto para almacenar los IDs de los servicios seleccionados -->
                                    <input type="hidden" id="serviciosSeleccionadosInput" name="serviciosSeleccionados">
                                    <ul id="listaServiciosSeleccionados" class="list-group">
                                        <!-- Servicios seleccionados se añadirán aquí -->
                                    </ul>
                                </div>
                                <!-- Campo para mostrar el monto total -->
                                <div class="form-group">
                                    <label for="monto_total">Monto Total:</label>
                                    <input type="text" class="form-control" id="monto_total" name="monto_total" readonly>
                                </div>
                                <!-- Campo para aplicar descuento -->
                                <div class="form-group">
                                    <label for="descuento">Descuento (Bs):</label>
                                    <input type="number" class="form-control" id="descuento" name="descuento" value="0" onchange="actualizarMontoTotal()">
                                </div>

                                <!-- Campo para mostrar el monto total con descuento -->
                                <div class="form-group">
                                    <label for="monto_total_descuento">Monto Total con Descuento:</label>
                                    <input type="text" class="form-control" id="monto_total_descuento" name="monto_total_descuento" readonly>
                                </div>
                                <br>

                                <!-- Modal -->
                                <div class="modal fade" id="serviciosModal" tabindex="-1" role="dialog" aria-labelledby="serviciosModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-light-gray">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="serviciosModalLabel">Seleccionar Servicio</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach($servicios as $servicio)
                                                    <div class="col-md-4">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $servicio->nombre }}</h5>
                                                                <p class="card-text">Precio: Bs {{ $servicio->precio }}</p>
                                                                <button type="button" class="btn btn-success" onclick="seleccionarServicio({{ $servicio->id }}, '{{ $servicio->nombre }}', {{ $servicio->precio }})">Seleccionar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-header-group  header-default">
                                <div class="header-text httal htvam">
                                    <button type="submit" class="btn btn-success">Registrar Contrato</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </ul>

                <script>
                    JotForm.showJotFormPowered = "new_footer";
                </script>
                <script>
                    JotForm.poweredByText = "Powered by Jotform";
                </script><input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="242068710060649" />
                <script type="text/javascript">
                    var all_spc = document.querySelectorAll("form[id='242068710060649'] .si" + "mple" + "_spc");
                    for (var i = 0; i < all_spc.length; i++) {
                        all_spc[i].value = "242068710060649-242068710060649";
                    }
                </script>
                </form>
                <script type="text/javascript">
                    JotForm.ownerView = true;
                </script>
                <script type="text/javascript">
                    JotForm.isNewSACL = true;
                </script>

                <!-- jQuery y Bootstrap JS -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <script>
                    function seleccionarCuarto(id, dimension, precio, imagenUrl) {
                        let existe = false;
                        $('#listaCuartosSeleccionados li').each(function() {
                            if ($(this).data('id') === id) {
                                existe = true;
                            }
                        });

                        if (!existe) {
                            // Crear un nuevo elemento de lista para el cuarto seleccionado
                            let li = document.createElement('li');
                            li.className = 'list-group-item';
                            li.setAttribute('data-id', id);
                            li.setAttribute('data-precio', precio); // Guardar el precio en el atributo data
                            li.innerHTML = `
                <div class="d-flex align-items-center">
                    <img src="${imagenUrl}" alt="Imagen del cuarto" class="img-thumbnail mr-3" style="width: 100px; height: 75px; object-fit: cover;">
                    <div>
                        Cuarto #${id} - Dimensión: ${dimension} - Precio: Bs ${precio}
                        <button type="button" class="btn btn-danger btn-sm float-right ml-2" onclick="eliminarCuarto(${id})">Eliminar</button>
                    </div>
                </div>
            `;
                            document.getElementById('listaCuartosSeleccionados').appendChild(li);
                            actualizarCuartosSeleccionados(); // Actualizar la lista de cuartos seleccionados
                            actualizarMontoTotal(); // Actualizar el monto total
                        } else {
                            alert('Este cuarto ya está seleccionado.');
                        }
                    }

                    // Función para eliminar un cuarto de la lista
                    function eliminarCuarto(id) {
                        $('#listaCuartosSeleccionados li').each(function() {
                            if ($(this).data('id') === id) {
                                $(this).remove();
                            }
                        });
                        actualizarCuartosSeleccionados(); // Actualizar la lista de cuartos seleccionados
                        actualizarMontoTotal(); // Actualizar el monto total
                    }

                    // Actualizar el campo oculto con los IDs de los cuartos seleccionados
                    function actualizarCuartosSeleccionados() {
                        let cuartosSeleccionados = [];
                        $('#listaCuartosSeleccionados li').each(function() {
                            cuartosSeleccionados.push($(this).data('id'));
                        });
                        $('#cuartosSeleccionadosInput').val(cuartosSeleccionados.join(','));
                    }

                    function seleccionarServicio(id, nombre, precio) {
                        let existe = false;
                        $('#listaServiciosSeleccionados li').each(function() {
                            if ($(this).data('id') === id) {
                                existe = true;
                            }
                        });

                        if (!existe) {
                            // Crear un nuevo elemento de lista para el servicio seleccionado
                            let li = document.createElement('li');
                            li.className = 'list-group-item';
                            li.setAttribute('data-id', id);
                            li.setAttribute('data-precio', precio); // Guardar el precio en el atributo data
                            li.innerHTML = `
                <div class="d-flex align-items-center">
                    <div>
                        Servicio: ${nombre} - Precio: Bs ${precio}
                        <button type="button" class="btn btn-danger btn-sm float-right ml-2" onclick="eliminarServicio(${id})">Eliminar</button>
                    </div>
                </div>
            `;
                            document.getElementById('listaServiciosSeleccionados').appendChild(li);
                            actualizarServiciosSeleccionados(); // Actualizar la lista de servicios seleccionados
                            actualizarMontoTotal(); // Actualizar el monto total
                        } else {
                            alert('Este servicio ya está seleccionado.');
                        }
                    }

                    // Función para eliminar un servicio de la lista
                    function eliminarServicio(id) {
                        $('#listaServiciosSeleccionados li').each(function() {
                            if ($(this).data('id') === id) {
                                $(this).remove();
                            }
                        });
                        actualizarServiciosSeleccionados(); // Actualizar la lista de servicios seleccionados
                        actualizarMontoTotal(); // Actualizar el monto total
                    }

                    // Actualizar el campo oculto con los IDs de los servicios seleccionados
                    function actualizarServiciosSeleccionados() {
                        let serviciosSeleccionados = [];
                        $('#listaServiciosSeleccionados li').each(function() {
                            serviciosSeleccionados.push($(this).data('id'));
                        });
                        $('#serviciosSeleccionadosInput').val(serviciosSeleccionados.join(','));
                    }

                    // Llamar a la función para actualizar el campo oculto antes de enviar el formulario
                    $('#formAddInquilino').on('submit', function() {
                        actualizarCuartosSeleccionados();
                        actualizarServiciosSeleccionados();
                    });

                    // Función para actualizar el monto total
                    function actualizarMontoTotal() {
                        let total = 0;
                        $('#listaCuartosSeleccionados li').each(function() {
                            total += parseFloat($(this).data('precio'));
                        });
                        $('#listaServiciosSeleccionados li').each(function() {
                            total += parseFloat($(this).data('precio'));
                        });
                        let descuento = parseFloat($('#descuento').val()) || 0; // Obtener el valor del descuento
                        let totalConDescuento = total - descuento;

                        $('#monto_total').val(total.toFixed(2));
                        $('#monto_total_descuento').val(totalConDescuento.toFixed(2));
                    }
                </script>

            </div>
        </div>



    </main>
</x-layout>



<style>
    .bg-light-gray {
        background-color: #d6d8db;
        /* Puedes ajustar este color a un gris más claro si prefieres */
    }
</style>

</html>