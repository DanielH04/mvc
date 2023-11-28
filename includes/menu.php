<?php
$menuUsuario = usuariosController::ctrMenuUsuario($_SESSION["usuario"]->id_usuario);
//var_dump($menuUsuario);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh !important;">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="#" alt="AdminLTE" class="brand-image img elevation-4" style="opacity: .8">
    <span class="brand-text font-weight-light">Ferreaceros</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php foreach ($menuUsuario as $menu) : ?>
          <li class="nav-item">
            <a style="cursor: pointer;" 
               class="nav-link <?php if ($menu->vista_inicio == 1) : ?> 
                                  <?php echo 'active' ?> 
                               <?php endif ?>" 
              <?php if (!empty($menu->vista)) : ?> 
                onclick="CargarContenido('views/modulos/<?php echo $menu->vista; ?>', 'content-wrapper')" <?php endif; ?>>
              <i class="nav-icon <?php echo $menu->icon_menu; ?>"></i>
              <p>
                <?php echo $menu->modulo ?>
              </p>
            </a>
          </li>
        <?php endforeach; ?>

        <li class="nav-item">
          <a href="http://localhost/mvc?cerrar_sesion=1" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Cerrar Sesión
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $(document).ready(function() {
    $(".nav-link").removeClass('active');

    var currentUrl = window.location.href;

    // Itera a través de cada elemento de menú
    $(".nav-link").each(function() {
      var menuItemUrl = $(this).attr("href");

      // Verifica si la URL actual contiene la URL del elemento de menú
      if (currentUrl.includes(menuItemUrl)) {
        $(this).addClass('active');
        // Si el elemento de menú tiene un submenú, también resalta a su padre
        $(this).parents('.nav-item').addClass('menu-open');
      }
    });
  });
</script>