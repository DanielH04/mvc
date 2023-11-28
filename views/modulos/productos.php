<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!--ROW PARA CRITERIOS DE BUSQUEDA-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Criterios de Busqueda</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar Panel de Busqueda">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" id="btnLimpiarBusqueda" title="Limpiar Busqueda">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-lg-flex">
                                <div style="flex: 1" class=" form-floating mx-1">
                                    <input type="text" id="inBCodigoin" class="form-control" data-index="3">
                                    <label for="inBCodigoin">Código Interno</label>
                                </div>
                                <div style="flex: 1" class="form-floating mx-1">
                                    <input type="text" id="inBCodigoex" class="form-control" data-index="4">
                                    <label for="inBCodigoex">Código Externo</label>
                                </div>
                                <div style="flex: 1" class="form-floating mx-1">
                                    <input type="text" id="inBCategoria" class="form-control" data-index="6">
                                    <label for="inBCategoria">Categoría</label>
                                </div>
                                <div style="flex: 1" class="form-floating mx-1">
                                    <input type="text" id="inBProveedor" class="form-control" data-index="8">
                                    <label for="inBProveedor">Proveedor</label>
                                </div>
                                <div style="flex: 1" class="form-floating mx-1">
                                    <input type="text" id="inBProducto" class="form-control" data-index="2">
                                    <label for="inBProducto">Producto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./ end card-body -->
            </div>
        </div>
    </div>
    <!-- TABLA LISTADO DE PRODUCTOS -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="tblproductos" class="table table-striped w-100 shadow">
                    <thead class="bg-info">
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Código Interno</th>
                            <th>Código Externo</th>
                            <th>Id categoria</th>
                            <th>Categoría</th>
                            <th>Id Proveedor</th>
                            <th>Proveedor</th>
                            <th>Estado</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

<!-- /.content -->
<!-- MODAL REGISTRO DE PRODUCTO -->
<div class="modal fade" id="mdlRegistrarProductos" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 aling:items-center">
                <h5 class="modal-title">Registrar Producto</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" id="btnCerrarMdl" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>

            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <!--ID PRODUCTO-->
                        <div class="col-lg-6" id="divIdProd">
                            <div class="form-group mb-2">
                                <label for="IdProducto" class=""><i class="fas fa-file-signature"></i>
                                    <span class="small">ID del Producto</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sn" id="IdProducto" name="IdProducto" placeholder="ID del Producto">
                                <div class="invalid-feedback">Ingrese el ID del producto</div>
                            </div>
                        </div>

                        <!--REGISTRO NOMBRE PRODUCTO-->
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label for="inNomProd" class=""><i class="fas fa-file-signature"></i>
                                    <span class="small">Nombre del Producto</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-sn" id="inNomProd" name="inNomProd" placeholder="Nombre del Producto" required>
                                <div class="invalid-feedback">Ingrese el nombre del producto</div>
                            </div>
                        </div>

                        <!--REGISTRO IMAGEN PRODUCTO-->
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="inImagen">
                                    <i class="fas fa-image fs-6"></i>
                                    <span class="small">Selecciona una Imagen</span>
                                </label>
                                <input type="file" class="form-control form-control-sm" id="inImagen" name="inImagen" accept="image/*" onchange="previewFile(this)">
                            </div>
                        </div>
                        <!-- PREVISUALIZACIÓN DE IMAGEN -->
                        <div class="col-12 col-lg-5 my-1">
                            <div style="width: 100%; height: 200px;">
                                <img id="previewImg" src="views/img/imagenes/no_image.jpg" class="border border-secondary" style="object-fit: cover; width: 100%; height: 100%;" alt="">
                            </div>
                        </div>

                        <!-- CAMPOS REGISTRO DE PRODUCTO -->
                        <div class="col-lg-7">
                            <div class="row">
                                <!--REGISTRO CÓDIGO INTERNO PRODUCTO-->
                                <div class="col-lg-12">
                                    <div class="form-group mb-2">
                                        <label for="inCodin" class=""><i class="fas fa-barcode"></i>
                                            <span class="small">Código Interno</span><span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sn" id="inCodin" name="inCodin" placeholder="Código Interno" required>
                                        <div class="invalid-feedback">Ingrese el código interno del producto</div>
                                    </div>
                                </div>

                                <!--REGISTRO CÓDIGO EXTERNO PRODUCTO-->
                                <div class="col-lg-12">
                                    <div class="form-group mb-2">
                                        <label for="inCodex" class=""><i class="fas fa-barcode"></i>
                                            <span class="small">Código Externo</span><span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-sn" id="inCodex" name="inCodex" placeholder="Código Externo" required>
                                        <div class="invalid-feedback">Ingrese el código externo del producto</div>
                                    </div>
                                </div>

                                <!--REGISTRO CATEGORÍA PRODUCTO-->
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <label for="selcategoria" class=""><i class="fas fas fa-tags"></i>
                                            <span class="small">Categoría</span><span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selcategoria" required></select>
                                        <div class="invalid-feedback">Seleccione la categoría del producto</div>
                                    </div>
                                </div>

                                <!--REGISTRO PROVEEDOR PRODUCTO-->
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <label for="selProveedor" class=""><i class="fas fa-truck-moving"></i>
                                            <span class="small">Proveedor</span><span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selProveedor" required></select>
                                        <div class="invalid-feedback">Seleccione el proveedor del producto</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BOTONES GUARDAR / CANCELAR REGISTRO -->
                        <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;" id="btnGuardar">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var accion;
    var tableProductos;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    function mensajeToast(tipo, mensaje) {
        Toast.fire({
            icon: tipo,
            title: mensaje
        });
    }

    $(document).ready(function() {

        // OCULTAR IDPRODUCTO EN MODAL
        $("#divIdProd").hide();

        // LISTAR CATEGORIAS EN MODAL
        $.ajax({
            url: "ajax/categorias.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {
                var options = '<option selected value ="">Seleccione una categoria</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }
                $("#selcategoria").html(options);
            }
        });

        // LISTAR PROVEEDOR EN MODAL
        $.ajax({
            url: "ajax/proveedores.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {
                var options = '<option selected value ="">Seleccione un proveedor</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }
                $("#selProveedor").html(options);
            }
        });

        // MODAL REGISTRAR PRODUCTO
        tableProductos = $("#tblproductos").DataTable({

            dom: 'Bfrtip',
            buttons: [{
                    text: 'Registrar Producto',
                    className: 'addNewRecord',
                    action: function(e, dt, node, config) {
                        $("#mdlRegistrarProductos").modal('show');
                        accion = 2; //REGISTRAR

                    }
                },
                'excel', 'print', 'pageLength'
            ],
            pageLength: [20, 40],
            pageLength: 20,
            ajax: {
                url: 'ajax/productos.ajax.php',
                dataSrc: '',
                type: "POST",
                data: {
                    'accion': 1
                },
            },
            columnDefs: [{
                    targets: 10,
                    sortable: false,
                    render: function(data, type, full, meta) {
                        console.log(full);
                        return "<center>" +
                            "<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Producto' data-id='" + full[0] + "'> " +
                            "<i class='fas fa-pencil-alt fs-5'></i> " +
                            "</span> " +
                            "<span class='btnEliminarProducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Producto'> " +
                            "<i class='fas fa-trash fs-5'> </i> " +
                            "</span>" +
                            "</center>";
                    }

                },

                {
                    targets: 0,
                    visible: false,
                },

                {
                    targets: 1,
                    sortable: false,
                },

                {
                    targets: 5,
                    visible: false,
                },

                {
                    targets: 7,
                    visible: false,
                },

                {
                    targets: 9,
                    sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (parseInt(rowData[9]) == 1) {
                            $(td).html("Activo")
                        } else {
                            $(td).html("Inactivo")
                        }
                    }
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

        //EVENTOS PARA CRITERIOS DE BUSQUEDA

        $("#inBCodigoin").keyup(function() {
            tableProductos.column($(this).data('index')).search($(this).val()).draw();
        });

        $("#inBCodigoex").keyup(function() {
            tableProductos.column($(this).data('index')).search($(this).val()).draw();
        })

        $("#inBCategoria").keyup(function() {
            tableProductos.column($(this).data('index')).search($(this).val()).draw();
        })

        $("#inBProveedor").keyup(function() {
            tableProductos.column($(this).data('index')).search($(this).val()).draw();
        })

        $("#inBProducto").keyup(function() {
            tableProductos.column($(this).data('index')).search($(this).val()).draw();
        })

        //LIMPIAR CRITERIOS DE BUSQUEDA
        $('#btnLimpiarBusqueda').on('click', function() {
            $('#inProducto').val('')
            $('#inCodigoin').val('')
            $('#inCodigoex').val('')
            $('#inCategoria').val(0)
            $('#inProveedor').val(0)

            $("#validate-nomProd").ccs("display", "none");
            $("#validate-CodinProd").ccs("display", "none");
            $("#validate-CodexProd").ccs("display", "none");
            $("#validate-CatProd").ccs("display", "none");
            $("#validate-Proov").ccs("display", "none");


            tableProductos.search('').columns().search('').draw();
        })

        //LIMPIAR CAMPOS DE REGISTRO DE PRODUCTO
        $("#btnCancelar, #btnCerrarMdl").on('click', function() {
            $("#IdProducto").val("");
            $("#inNomProd").val("");
            $("#inCodin").val("");
            $("#inCodex").val("");
            $("#selcategoria").val(0);
            $("#selProveedor").val(0);
        })

        //BOTON EDITAR PRODUCTO
        $("#tblproductos tbody").on('click', '.btnEditarProducto', function() {
            accion = 3;
            $("#mdlRegistrarProductos").modal('show');
            var data = tableProductos.row($(this).parents('tr')).data();
            //TRAER DATOS AL MODAL DE LA DB
            $("#IdProducto").val($(this).data("id"));
            $("#inNomProd").val(data[2]);
            $("#inCodin").val(data[3]);
            $("#inCodex").val(data[4]);
            $("#selcategoria").val(data[5]);
            $("#selProveedor").val(data[7]);

        })

        //BOTON ELIMINAR PRODUCTO
        $("#tblproductos").on('click', '.btnEliminarProducto',
            function() {
                accion = 4;
                var data = tableProductos.row($(this).parents('tr')).data();
                var id_producto = data["id_producto"];

                Swal.fire({
                    title: 'Está seguro de eliminar el producto: ' + data[2] + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo eliminarlo!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id_producto", id_producto);


                        $.ajax({
                            url: "ajax/productos.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {

                                if (respuesta == "ok") {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'El producto se eliminó correctamente'
                                    });

                                    tableProductos.ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El producto no se puedo eliminar'
                                    });
                                }
                            }
                        });

                    }
                })
            })
    })
    //EVENTO PREVISUALIZAR IMAGEN
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

    document.getElementById("btnGuardar").addEventListener("click", function() {
        var imagen_valida = true;

        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === true) {

                var file = $("#inImagen").val();

                var ext = file.substring(file.lastIndexOf("."));

                if (ext != ".jpg" && ext != ".png" && ext != ".gif" && ext != ".jpeg" && ext != ".webp") {
                    mensajeToast('error', "La extensión " + ext + " no es una imagen válida");
                    imagen_valida = false;
                }

                if (!imagen_valida) {
                    return;
                }

                const inputImage = document.querySelector('#inImagen');

                Swal.fire({
                    title: 'Está seguro de registrar el producto ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {

                    if (result.isConfirmed) {
                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id_producto", $("#IdProducto").val());
                        datos.append("nombre_producto", $("#inNomProd").val());
                        datos.append("cod_interno", $("#inCodin").val());
                        datos.append("cod_externo", $("#inCodex").val());
                        datos.append("id_categoria", $("#selcategoria").val());
                        datos.append("id_proveedor", $("#selProveedor").val());

                        if (accion == 2) {
                            var titulo_msj = "El producto se registró correctamente"
                        }

                        if (accion == 3) {
                            var titulo_msj = "El producto se actualizó correctamente"
                            console.log("si actualiza");
                        }

                        $.ajax({
                            url: "ajax/productos.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {
                                console.log("Respuesta del servidor:", respuesta)
                                if (respuesta == "ok") {
                                    Toast.fire({
                                        icon: 'success',
                                        title: titulo_msj
                                    });

                                    $("#mdlRegistrarProductos").modal('hide');
                                    $(".needs-validation").removeClass("was-validated");
                                    $("#IdProducto").val("");
                                    $("#inNomProd").val("");
                                    $("#inCodin").val("");
                                    $("#inCodex").val("");
                                    $("#selcategoria").val(0);
                                    $("#selProveedor").val(0);
                                    tableProductos.ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El producto no se pudo registrar'
                                    });
                                }
                            }
                        });
                    }
                })
            } else {

            }
            form.classList.add('was-validated');
        });
    });

    document.getElementById("btnCancelar").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })

    document.getElementById("btnCerrarMdl").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })
</script>