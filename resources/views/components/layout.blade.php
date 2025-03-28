@props(['bodyClass'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Alquiler</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{asset('cuartos/lgo/logo (2).png')}}" type="image/x-icon" />


    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{asset('assets/css/fonts.min.css')}}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <style>
        .bg-light-gray {
            background-color: #d6d8db;
            /* Puedes ajustar este color a un gris más claro si prefieres */
        }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
</head>

<body class="{{ $bodyClass }}">

    <div class="wrapper">
        <!-- Sidebar -->

        <div class="sidebar" data-background-color="dark">

            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="{{route('principal')}}" class="logo ">
                        <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="navbar brand" class="navbar-brand" height="20" />
                        <p style="color:white">Alquiler</p>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ request()->routeIs('principal') ? 'active' : '' }}">
                            <a href="{{route('principal')}}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>

                            </a>

                        </li>
                        <li class="nav-section active">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Registro</h4>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_cuarto') ? 'active' : '' }}">
                            <a href="{{route('mostrar_cuarto')}}">
                                <i class="fas fa-warehouse"></i>

                                <p>Cuarto</p>
                            </a>

                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_inquilino') ? 'active' : '' }}">
                            <a href="{{route('mostrar_inquilino')}}">
                                <i class="fas fa-user-plus"></i>
                                <p>Inquilino</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_servicio') ? 'active' : '' }}">
                            <a href="{{route('mostrar_servicio')}}">
                                <i class="fas fa-tint"></i>
                                <p>Servicio</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_contratos') ? 'active' : '' }}">
                            <a href="{{route('mostrar_contratos')}}">
                                <i class="fas fa-file-alt"></i>
                                <p>Contratos</p>
                            </a>
                        </li>


                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#charts" aria-expanded="{{ request()->routeIs('mostrar_contrato') || request()->routeIs('mostrar_recibo') ? 'true' : 'false' }}" class="{{ request()->routeIs('mostrar_contrato') || request()->routeIs('mostrar_recibo') ? '' : 'collapsed' }}">
                                <i class="far fa-chart-bar"></i>
                                <p>Registrar Contrato</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ request()->routeIs('mostrar_contrato') || request()->routeIs('mostrar_reserva') || request()->routeIs('mostrar_recibo') ? 'show' : '' }}" id="charts">
                                <ul class="nav nav-collapse">
                                    <li class="nav-item {{ request()->routeIs('mostrar_contrato') ? 'active' : '' }}">
                                        <a href="{{ route('mostrar_contrato') }}">
                                            <span class="sub-item">Contrato Alquiler</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('mostrar_recibo') ? 'active' : '' }}">
                                        <a href="{{ route('mostrar_recibo') }}">
                                            <span class="sub-item">Recibo Pago</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('mostrar_reserva') ? 'active' : '' }}">
                                        <a href="{{ route('mostrar_reserva') }}">
                                            <span class="sub-item">Registrar Reserva</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_reservas') ? 'active' : '' }}">
                            <a href="{{route('mostrar_reservas')}}">
                                <i class="fas fa-file-alt"></i>
                                <p>Reservas</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_recibos') ? 'active' : '' }}">
                            <a href="{{route('mostrar_recibos')}}">
                                <i class="fas fa-file-alt"></i>
                                <p>Recibos Alquiler</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mostrar_Otrosrecibos') ? 'active' : '' }}">
                            <a href="{{route('mostrar_Otrosrecibos')}}">
                                <i class="fas fa-file-alt"></i>
                                <p>Otros Recibos</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Contenido -->


        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Messages
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/jm_denis.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/chadengle.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Chad</span>
                                                        <span class="block"> Ok, Thanks ! </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/mlane.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jhon Doe</span>
                                                        <span class="block">
                                                            Ready for the meeting today...
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Talha</span>
                                                        <span class="block"> Hi, Apa Kabar ? </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            You have 4 new notification
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> New user registered </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-success">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Rahmad commented on Admin
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/profile2.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Reza send messages to you
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-danger">
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> Farrah liked Admin </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-7">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="{{route('mostrar_calendario')}}">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-danger rounded-circle">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </div>
                                                        <span class="text">Calendar</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-warning rounded-circle">
                                                            <i class="fas fa-map"></i>
                                                        </div>
                                                        <span class="text">Maps</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-info rounded-circle">
                                                            <i class="fas fa-file-excel"></i>
                                                        </div>
                                                        <span class="text">Reports</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-success rounded-circle">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <span class="text">Emails</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-primary rounded-circle">
                                                            <i class="fas fa-file-invoice-dollar"></i>
                                                        </div>
                                                        <span class="text">Invoice</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-secondary rounded-circle">
                                                            <i class="fas fa-credit-card"></i>
                                                        </div>
                                                        <span class="text">Payments</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="Profile Picture" class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{asset('cuartos/lgo/logo (2).png')}}" alt="Profile Picture" class="avatar-img rounded" />
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                                <a href="{{route ('mostrar_perfil')}}" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
                <!-- End Navbar -->
                <div class="main-content">
                    {{ $slot }}
                </div>
            </div>

            <div class="container">




            </div>

            <!-- Custom template | don't include it in your project! -->
            <div class="custom-template">
                <div class="title">Settings</div>
                <div class="custom-content">
                    <div class="switcher">
                        <div class="switch-block">
                            <h4>Logo Header</h4>
                            <div class="btnSwitch">
                                <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                                <br />
                                <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                                <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Navbar Header</h4>
                            <div class="btnSwitch">
                                <button type="button" class="changeTopBarColor" data-color="dark"></button>
                                <button type="button" class="changeTopBarColor" data-color="blue"></button>
                                <button type="button" class="changeTopBarColor" data-color="purple"></button>
                                <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                                <button type="button" class="changeTopBarColor" data-color="green"></button>
                                <button type="button" class="changeTopBarColor" data-color="orange"></button>
                                <button type="button" class="changeTopBarColor" data-color="red"></button>
                                <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                                <br />
                                <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                                <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                                <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                                <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                                <button type="button" class="changeTopBarColor" data-color="green2"></button>
                                <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                                <button type="button" class="changeTopBarColor" data-color="red2"></button>
                            </div>
                        </div>
                        <div class="switch-block">
                            <h4>Sidebar</h4>
                            <div class="btnSwitch">
                                <button type="button" class="changeSideBarColor" data-color="white"></button>
                                <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                                <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-toggle">
                    <i class="icon-settings"></i>
                </div>
            </div>
            <!-- End Custom template -->

        </div>
        <!--   Core JS Files   -->
        <script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

        <!-- Chart JS -->
        <script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Chart Circle -->
        <script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

        <!-- Datatables -->
        <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

        <!-- jQuery Vector Maps -->
        <script src="{{asset('assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugin/jsvectormap/world.js')}}"></script>

        <!-- Sweet Alert -->
        <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

        <!-- Kaiadmin JS -->
        <script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>

        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="{{asset('assets/js/setting-demo.js')}}"></script>
        <script src="{{asset('assets/js/demo.js')}}"></script>

        <script>
            let inactivityTime = 60 * 1000; // 1 minuto en milisegundos
            let timer;

            function resetTimer() {
                clearTimeout(timer);
                timer = setTimeout(lockScreen, inactivityTime);
            }

            function lockScreen() {
                window.location.href = "{{ route('lockscreen') }}"; // Redirigir a la pantalla de bloqueo
            }

            // Detectar actividad del usuario
            document.addEventListener("mousemove", resetTimer);
            document.addEventListener("keypress", resetTimer);
            document.addEventListener("click", resetTimer);
            document.addEventListener("scroll", resetTimer);

            resetTimer(); // Iniciar el temporizador cuando se carga la página
        </script>
        @stack('js')
</body>

<style>
    .navbar-brand {
        height: 65px;
        /* Ajusta la altura según sea necesario */
        width: 65px;
        /* Asegura que la proporción se mantenga */
        object-fit: contain;
    }
</style>

</html>