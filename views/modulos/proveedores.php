<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Proveedores</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Proveedores</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
    <div class="row p-0 m-0">
        <!--LISTADO DE Proveedores-->
        <div class="col-md-8">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Proveedores</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblproveedores" class="display nowrap table-striped w-100 shadow rounded">
                            <thead class="bg-info text-left">
                                <tr>
                                    <th>Id Proveedor</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="small text left">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--FORMULARIO REGISTRO PROVEEDORES-->
        <div class="col-md-4">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Registrar nueva proveedor</h3>
                </div>
                <div class="card-body">
                    <form action="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label class="col-form-label" for="iCategoria">
                                        <i class="fas fa-dumpster fs-6"></i>
                                        <span class="small">Proveedor</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="iProveedor" name="iProveedor" placeholder="Ingrese el Proveedor" required>
                                    <div class="invalid-feedback">Debe ingresar el proveedor</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-0 mt-2">
                                    <a style="cursor:pointer;" class="btn btn-primary w-100" id="btnRegistrarProv">Registrar Proveedor
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.content -->

<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {
        //VARIABLES PARA EDITAR O REGISTRAR PROVEEDOR
        var idProveedor = 0;
        var proveedor = "";

        var tableProveedores = $("#tblproveedores").DataTable({
            ajax: {
                url: 'ajax/proveedores.ajax.php',
                dataSrc: ""
            },
            columnDefs: [{
                targets: 3, 
                sortable: false,
                render: function(data, type, full, meta) {
                    console.log(data, type, full, meta);
                    return "<center>" +
                        "<span class='btnEditarProveedor text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Proveedor'> " +
                        "<i class='fas fa-pencil-alt fs-5'></i> " +
                        "</span> " +
                        "<span class='btnEliminarProveedor text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Proveedor'> " +
                        "<i class='fas fa-trash fs-5'> </i> " +
                        "</span>" +
                        "</center>";
                }
            },
        
            {
                targets: 0,
                visible: false,
            }
        
        ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

        $('#tblproveedores tbody').on('click', '.btnEditarProveedor', function() {
            var data = tableProveedores.row($(this).parents('tr')).data();

            if ($(this).parents('tr').hasClass('selected')) {

                $(this).parents('tr').removeClass('selected');
                idProveedor =0;
                $("#iProveedor").val("");

            } else {

                tableProveedores.$('tr.selected').removeClass('selected');
                $(this).parents('tr').addClass('selected');

                idProveedor = data[0];
                $("#iProveedor").val(data[1]);
            }
        })

        //ELIMINAR PROVEEDOR
        $('#tblproveedores').on('click', '.btnEliminarProveedor',
            function() {
                accion = 1;
                var data = tableProveedores.row($(this).parents('tr')).data();
                var id_proveedor = data.id_proveedor;

                Swal.fire({
                    title: 'Está seguro de eliminar el proveedor ' + data[1] + '?',
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
                        datos.append("id_proveedor", id_proveedor);

                        $.ajax({
                            url: "ajax/proveedores.ajax.php",
                            method: "POST",
                            data: datos,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {
                                console.log("respuesta");
                                if (respuesta == "ok") {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'El proveedor se eliminó correctamente'
                                    });

                                    tableProveedores.ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El Proveedor no se pudo eliminar'
                                    });
                                }
                            }
                        });
                    }
                })
            })

        //REGISTRAR PROVEEDOR
        document.getElementById("btnRegistrarProv").addEventListener("click", function() {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {

                if (form.checkValidity() === true) {

                    proveedor = $("#iProveedor").val();

                    var datos = new FormData();

                    datos.append("idProveedor", idProveedor);
                    datos.append("proveedor", proveedor);

                    Swal.fire({
                        title: 'Está seguro de guardar el proveedor?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!',
                        cancelButtonText: 'Cancelar!',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            $.ajax({
                                url: "ajax/proveedores.ajax.php",
                                type: "POST",
                                data: datos,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function(respuesta) {

                                    Toast.fire({
                                        icon: 'success',
                                        title: respuesta
                                    });

                                    idProveedor = 0;
                                    proveedor = "";

                                    $(".needs-validation").removeClass("was-validated");
                                    $("#iProveedor").val("");

                                    tableProveedores.ajax.reload();

                                }
                            });
                        }
                    })
                }
                form.classList.add('was-validated');
            })
        });
    })
</script>