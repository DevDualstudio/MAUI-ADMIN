<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Dashboard | MAUI</title>

    <link rel="stylesheet" href="css/main.css">

    <!-- Fonts - Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon/favicon.ico">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!--Session-->
        <?php include "php/session.php"; ?>
        <!-- Sidebar -->
        <?php include 'handlers/nav.php'; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-mgrey" id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-bars fs-5 text-mprimary-100" id="menu-toggle"></i>
                </div>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-mprimary-100"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <form class="d-flex mx-2">
                            <div class="input-group my-2">
                                <input class="form-control" type="search" aria-label="Search" />
                                <button class="btn btn-mprimary-100" type="submit">
                                    <i class="fa-solid fa-magnifying-glass text-light"></i>
                                </button>
                            </div>
                        </form>

                        <li class="nav-item dropdown mx-2" style="">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-bell fa-lg mt-3 text-mprimary-100"></i>
                                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Notificación #1</a></li>
                                <li><a class="dropdown-item" href="#">Notificación #2</a></li>
                                <li><a class="dropdown-item" href="#">Notificación #3</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/avatars/Active Men.png" class="img-fluid rounded-circle avatar mr-2 bg-mprimary-030" alt="Avatar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Mi perfil</a>
                                <a class="dropdown-item" href="#">Configuración</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php">Cerrar sesión</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="h2 fw-bold my-2">Bienvenido <span class="text-mprimary-100">USUARIO</span>
                                </h1>
                                <!-- <p class="lead text-muted">Revisa la última información</p> -->
                            </div>
                            <!-- <div class="col-lg-3 col-md-4 d-flex">
                      <button class="btn btn-mprimary-100 w-100 align-self-center text-light">Descargar reporte</button>
                    </div> -->


                        </div>
                    </div>
                </section>

            
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/dashboard.js"></script>

    <!-- Charts -->
    <script src="node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/charts/analiticaVentas.js"></script>
    <script src="js/charts/estadisticas.js"></script>
    <script src="js/charts/ventasAnual.js"></script>
    <script src="js/charts/ventasSemanal.js"></script>
    <script src="js/charts/guiasProceso.js"></script>
</body>

</html>