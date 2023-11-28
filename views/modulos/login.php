<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferreaceros el Mirador</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 class="h1">Ferreaceros el Mirador</h1>
            </div>

            <div class="card-body">
                <!-- FORMULARIO DE INICIO DE SESION -->
                <form method="post" class="needs-validation-login" novalidate>

                    <!-- INGRESAR USUARIO -->
                    <div class="input-group mb-3">

                        <input class="form-control" type="text" placeholder="Usuario" name="loginUsuario" required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                        <div class="invalid-feedback">Debe ingresar un Usuario!</div>

                    </div>

                    <!-- INGRESAR CONTRASEÑA -->
                    <div class="input-group mb-3">

                        <input class="form-control" type="password" placeholder="Contraseña" name="loginPassword" required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <div class="invalid-feedback">Debe ingresar una Contraseña!</div>

                    </div>

                    <!-- BOTON INICIAR SESIÓN -->
                    <div class="row">
                        <?php 
                            $login = new usuariosController();
                            $login->login();
                        ?>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info">Ingresar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/dist/js/adminlte.min.js"></script>
</body>

</html>