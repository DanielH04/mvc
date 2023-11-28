<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Carga de Productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Carga de Productos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!--FILA PARA INPUT FILE-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Seleccionar Archivo de Carga</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="form_cargaproductos">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input type="file" name="file_productos" id="file_productos" class="form-control" accept=".xls, .xlsx">
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" value="Cargar Productos" class="btn btn-primary" id="btnCargar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--FILA PARA IMAGEN GIF-->
        <div class="row">
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <img src="views/img/loading.gif" id="imgCargar" style="display:none;">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form_cargaproductos").on('submit', function(e) {
            e.preventDefault();

            // VALIDAR QUE SE SUBA UN ARCHIVO
            if ($("#file_productos").get(0).files.length == 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Debes seleccionar un archivo (Excel).',
                    showConfirmButton: false,
                    timer: 2500
                });
            } else { // VALIDAR QUE EL ARCHIVO TENGA EXTENSION XLS - XLSX
                var extensiones_permitidas = [".xlsx", ".xls"];
                var input_file_productos = $("#file_productos");
                var exp_reg = new RegExp("([a-zA-Z0-9\s\\-.\:])+(" + extensiones_permitidas.join('|') + ")$");

                if (!exp_reg.test(input_file_productos.val().toLowerCase())) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Debes seleccionar un archivo con extensión .xls o .xlsx.',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    return false;
                }

                var datos = new FormData($("#form_cargaproductos")[0]);

                $("#btnCargar").prop("disabled", true);
                $("#imgCargar").attr("style", "display:block; height:250px; width:250px;");

                $.ajax({
                    url: "ajax/productos.ajax.php",
                    type: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {
                        console.log("respuesta", respuesta);

                        if (respuesta['totalProductos'] > 0) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Se registraron ' + respuesta['totalProductos'] + ' productos correctamente',
                                showConfirmButton: false,
                                timer: 2500
                            });

                            // Ocultar la imagen después del éxito
                            $("#imgCargar").hide();
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Error al realizar el registro de productos!',
                                showConfirmButton: false,
                                timer: 4000
                            });
                        }

                        // Habilitar el botón después de completar la operación
                        $("#btnCargar").prop("disabled", false);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Ocurrió un error al procesar la solicitud.',
                            showConfirmButton: false,
                            timer: 4000
                        });
                        // Habilitar el botón en caso de error
                        $("#btnCargar").prop("disabled", false);
                    }
                });
            }
        });
    });
</script>