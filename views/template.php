<?php
session_start();

$routeArray = explode("/", $_SERVER['REQUEST_URI']);
$routeArray = array_filter($routeArray);

if (count(array_filter($routeArray)) > 1) {
  echo '
  <script>
      window.location = "http://localhost/mvc/"
  </script>';
}

if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {
  echo '
      <script>
          window.location = "http://localhost/mvc/"
      </script>';

  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Centro Comercial El Mirador</title>

  <!-- SERVICE WORKER -->
  <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register('sw.js')
        .then(function(registration) {
          console.log("service worker registrado con exito:", registration);
        })
        .catch(function(error) {
          console.log("Error al registrar el service worker:", error);
        });
    }
  </script>

  <!-- ARCHIVO MANIFIESTO -->
  <link rel="manifest" href="manifest.json">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">

  <!-- REQUIRED SCRIPTS -->

  <!-- Incluir SweetAlert2 (usando un CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- JS Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JSTREE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

  <!-- ESTILOS PARA USO DE DATATABLES JS-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

  <!-- LIBRERIAS PARA USO DE DATATABLES JS-->
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


  <!-- LIBRERIAS PARA EXPORTAR A ARCHIVOS-->
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>



  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <script src="views/dist/js/plantilla.js"></script>

  <!-- JSTREE JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

</head>

<?php if (isset($_SESSION["usuario"])) : ?>

  <body class="hold-transition sidebar-mini">

    <div class="wrapper">
      <?php
      include "includes/menu.php";
      //include 'includes/navbar.php'
      ?>

      <div class="content-wrapper">
        <?php include "views/modulos/" . $_SESSION['usuario']->vista ?>
      </div>
      <!-- /.content-wrapper -->
    </div>

    <script>
      function CargarContenido(pagina_php, contenedor, id_rol, id_modulo) {
        $("." + contenedor).load(pagina_php);
      }
    </script>

  </body>

<?php else : ?>

  <body>

    <?php include "views/modulos/login.php" ?>

  </body>

<?php endif; ?>

</html>