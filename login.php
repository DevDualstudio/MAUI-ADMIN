<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | MAUI</title>

    <!-- custom CSS should come after Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Fonts - Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/favicon/favicon.ico">


    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 px-0 d-none d-sm-block">
                    <img src="assets/images/imagen-login-01.jpg" alt="Login imagen" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>

                <div class="col-sm-4">
                    <div class="px-5 ms-xl-4">
                        <img src="assets/images/logo-04.png" alt="Logo MAUI" class="mt-5" style="width: 75%; display: block; margin-left: auto; margin-right: auto;">
                    </div>

                    <div class="d-flex align-items-center px-5 ms-xl-4 mt-5 pt-2 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" id="formlogin">
                            <h2 class="mb-3 pb-3 fw-bold text-center text-mprimary-100">Ingresa a tu cuenta</h2>
                            <div class="form-outline mb-4">
                                <label class="form-label">Email o ID<span>*</span></label>
                                <input type="text" class="form-control bg-light" placeholder="yourname@company.com" id="email" name="email">

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label">Contraseña<span>*</span></label>
                                <input type="password" class="form-control bg-light" id="pwd" name="pwd" autocomplete="none">
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input border-mprimary-100" type="checkbox" value="" checked>
                                    <label class="form-check-label small text-muted"> Recordar mi contraseña </label>
                                </div>
                                <a class="text-decoration-none small" href="#!">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="pt-1 mb-4 text-center">
                                <!--button class="btn btn-msecondary-100 rounded-5 px-5 text-uppercase mt-3" type="submit">Iniciar sesión</button-->
                                <input type="submit" class="btn btn-msecondary-100 rounded-5 px-5 text-uppercase mt-3" value="Iniciar sesión">
                            </div>
                        </form>
                    </div>

                    <div class="align-items-center mx-auto">
                        <p class="small text-muted mt-4 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Copyright &copy; <a class="text-decoration-none" href="#!"> MAUI Paquetería</a> - Desarrollado por DualStudioMx
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /#page-content-wrapper -->
    <script src=" node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="js/datatables/datatables.js"></script>

    <!--  Login -->
    <script src="js/login.js"></script>
    <script src="js/notificaciones.js"></script>

    <!--  Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>