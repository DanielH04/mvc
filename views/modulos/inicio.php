<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Inicio</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Página Principal</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Targeta Total Usuarios -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="totalUsuarios"></h3>

                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="usuarios" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Targeta Total Proveedores -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="totalProveedores"></h3>

                        <p>Proveedores Registados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <a href="proveedores" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Targeta Total Productos -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="totalProductos"></h3>

                        <p>Productos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="productos" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Targeta Total categorias -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3 id="totalCategorias"></h3>

                        <p>Categorías Registradas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="categorias" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Targeta Total Pedidos -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="totalPedidos"></h3>

                        <p>Pedidos Pendientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="pedidos" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Targeta Total Libre -->
            <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="">44</h3>

                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Más info. <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
    $(document).ready(function() {
        $.ajax({
            url: "ajax/template.ajax.php",
            dataType: 'json',
            success: function(respuesta) {
                console.log("respuesta", respuesta);
                $("#totalProveedores").html(respuesta[0]['totalProveedores']);
                $("#totalUsuarios").html(respuesta[0]['totalUsuarios']);
                $("#totalProductos").html(respuesta[0]['totalProductos']);
                $("#totalCategorias").html(respuesta[0]['totalCategorias']);
                $("#totalPedidos").html(respuesta[0]['totalPedidos']);
            }
        });
    })
</script>