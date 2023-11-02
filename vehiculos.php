<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Vehículos | MAUI</title>

    <link rel="stylesheet" href="css/main.css">

    <!-- Fonts - Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon/favicon.ico">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
</head>

<body onload="listado_choferes()">
    <style>
        thead input {
            width: 100%;
        }
    </style>
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

                        <!-- <li class="nav-item dropdown mx-2" style="">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-bell fa-lg mt-3 text-mprimary-100"></i>
                                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Notificación #1</a></li>
                                <li><a class="dropdown-item" href="#">Notificación #2</a></li>
                                <li><a class="dropdown-item" href="#">Notificación #3</a></li>
                            </ul>
                        </li> -->


                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/avatars/Active Men.png" class="img-fluid rounded-circle avatar mr-2 bg-mprimary-030" alt="Avatar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="#">Mi perfil</a>
                                <a class="dropdown-item" href="#">Configuración</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="login.php">Cerrar sesión</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <section>
                    <div class="row">
                        <div class="col-lg-12 my-3">
                            <div class="card shadow-sm px-2">
                                <div class="card-header bg-white border-0 py-3 align-items-center justify-content-start d-flex flex-row">

                                    <h1 class="h3 m-0 font-weight-bold text-mprimary-100"> Vehículos</h1>

                                    <button class="btn btn-mprimary-100 mx-4 text-light" data-bs-toggle="modal" data-bs-target="#insertVehiculo">Agregar
                                        <i class="fa-solid fa-plus mr-2"></i></button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="vehiculostable" class="table datatable-basic table-hover display " style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Placas</th>
                                                    <th>No. Serie</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Año</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha Alta</th>
                                                    <th>Estatus</th>
                                                    <th>ID Chofer</th>
                                                    <th>Chofer</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th class="filterhead">ID</th>
                                                    <th class="filterhead">Placas</th>
                                                    <th class="filterhead">No. Serie</th>
                                                    <th class="filterhead">Marca</th>
                                                    <th class="filterhead">Modelo</th>
                                                    <th class="filterhead">Año</th>
                                                    <th class="filterhead">Tipo</th>
                                                    <th class="filterhead">Fecha Alta</th>
                                                    <th class="filterhead">Estatus</th>
                                                    <th class="filterhead">ID Chofer</th>
                                                    <th class="filterhead">Chofer</th>
                                                    <th class="filterhead"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </section>
                <!-- Modal -->
                <?php include 'modal/insert-vehiculo.php'; ?>
                <?php include 'modal/edit-vehiculo.php'; ?>
                <!-- /modal -->
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  Toggle -->
    <script src="js/dashboard.js"></script>

    <!--  Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/jquery/codificandomx.js"></script>

    <!-- Datatables JavaScript-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>

    <!--  Vehiculos -->
    <script src="js/vehiculos.js?v=1"></script>
    <script src="js/datatables/datatables_vehiculos.js"></script>
    <script src="js/notificaciones.js"></script>
</body>

</html>