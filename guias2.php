<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Guías | MAUI</title>

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
                <section>
                    <div class="row">
                        <div class="col-lg-12 my-3">
                            <div class="card shadow-sm px-2">
                                <div class="card-header bg-white border-0 py-3 align-items-center justify-content-start d-flex flex-row">
                                    <h1 class="h3 text-start m-0 fw-bold text-mprimary-100">Guías</h1>

                                    <div class=" align-items-center ms-auto d-flex">

                                        <form class="mx-2">
                                            <div class="input-group my-2">
                                                <input class="form-control" type="search" aria-label="Search" />
                                                <button class="btn btn-mprimary-100" type="submit">
                                                    <i class="fa-solid fa-magnifying-glass text-light"></i>
                                                </button>
                                            </div>
                                        </form>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-mprimary-100 mx-2 text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                En progreso
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row border border-1 rounded p-1">

                                        <div class="col-sm-2 my-2">
                                            <h6 class="small m-0 fw-bold">022D4356FD6X</h6>
                                            <span class="badge bg-mprimary-100">En Ruta</span>

                                            <span class="d-block small text-muted my-2">Ultima
                                                actualización:
                                                16-02-22, 07:28 PM</span>
                                        </div>
                                        <div class="col-sm-2 my-2">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <img class="icon-guia" src="assets/icons/iconos--15.png" alt="icon">
                                                </div>
                                                <div class="col-sm-10">
                                                    <p class="small mb-0 text-muted text-uppercase">Origen</p>
                                                    <h6 class="fw-bold small mb-0">Guadalajara, Jalisco, MX</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 my-2">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <img class="icon-guia" src="assets/icons/iconos--14.png" alt="icon">
                                                </div>
                                                <div class="col-sm-10">
                                                    <p class="small mb-0 text-muted text-uppercase">Origen</p>
                                                    <h6 class="fw-bold small mb-0">Ciudad de México, MX</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 my-2">
                                            <p class="small mb-0 text-muted text-uppercase">FECHA DE ENTREGA
                                                ESTIMADA</p>
                                            <h6 class="fw-bold small mb-0">20 FEB 2022</h6>
                                        </div>
                                        <div class="col-sm-2 my-2">
                                            <p class="small mb-0 text-muted text-uppercase">TIPO</p>
                                            <h6 class="fw-bold small mb-0">Envío Terrestre</h6>
                                        </div>
                                        <div class="col-sm-2 my-2">
                                            <button class="btn btn-mprimary-100 text-light guia-btn">Ver
                                                Detalles <i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->


    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  Toggle -->
    <script src="js/dashboard.js"></script>

    <!-- Datatables -->
    <script src="js/datatables/datatables.js"></script>

</body>

</html>