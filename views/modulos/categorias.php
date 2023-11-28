<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categorias</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Categorias</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<div class="content pb-2">
    <div class="row p-0 m-0">
        <!--LISTADO DE CATEGORIAS-->
        <div class="col-md-8">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Listado de Categorias</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblcategorias" class="display nowrap table-striped w-100 shadow rounded">
                            <thead class="bg-info text-left">
                                <tr>
                                    <th>Id Categoría</th>
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
        <!--FORMULARIO REGISTRO CATEGORIAS-->
        <div class="col-md-4">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Registrar nueva categoría</h3>
                </div>
                <div class="card-body">
                    <form action="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label class="col-form-label" for="iCategoria">
                                        <i class="fas fa-tag"></i>
                                        <span class="small">Categoria</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="iCategoria" name="iCategoria" placeholder="Ingrese la Categoría" required>
                                    <div class="invalid-feedback">Debe ingresar la categoria</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-0 mt-2">
                                    <a style="cursor:pointer;" class="btn btn-primary w-100" id="btnRegistrarCat">Registrar Categoria
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
        //VARIABLES PARA EDITAR O REGISTRAR CATEGORIA
        var idCategoria = 0;
        var categoria = "";

        var tableCategorias = $("#tblcategorias").DataTable({
            ajax: {
                url: 'ajax/categorias.ajax.php',
                dataSrc: ""
            },
            columnDefs: [{
                    targets: 3,
                    sortable: false,
                    render: function(data, type, full, meta) {
                        console.log(data, type, full, meta);
                        return "<center>" +
                            "<span class='btnEditarCategoria text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Categoría'> " +
                            "<i class='fas fa-pencil-alt fs-5'></i> " +
                            "</span> " +
                            "<span class='btnEliminarCategoria text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Categoría'> " +
                            "<i class='fas fa-trash fs-5'> </i> " +
                            "</span>" +
                            "</center>";
                    },
                },
                {
                    targets: 0,
                    visible: false,
                },
                {
                    targets: 2,
                    sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {
                            if (parseInt(rowData[2]) == 1) {
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

        $('#tblcategorias tbody').on('click', '.btnEditarCategoria', function() {
            var data = tableCategorias.row($(this).parents('tr')).data();

            if ($(this).parents('tr').hasClass('selected')) {

                $(this).parents('tr').removeClass('selected');
                idCategoria = 0;
                $("#iCategoria").val("");

            } else {

                tableCategorias.$('tr.selected').removeClass('selected');
                $(this).parents('tr').addClass('selected');

                idCategoria = data[0];
                $("#iCategoria").val(data[1]);
            }
        })

        //ELIMINAR CATEGORIA
        $('#tblcategorias').on('click', '.btnEliminarCategoria',
            function() {
                accion = 1;
                var data = tableCategorias.row($(this).parents('tr')).data();
                var id_categoria = data.id_categoria;

                Swal.fire({
                    title: 'Está seguro de eliminar la categoría ' + data[1] + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deseo eliminarla!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {

                    if (result.isConfirmed) {
                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id_categoria", id_categoria);

                        $.ajax({
                            url: "ajax/categorias.ajax.php",
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
                                        title: 'La categoría se eliminó correctamente'
                                    });

                                    tableCategorias.ajax.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'La categoría no se pudo eliminar'
                                    });
                                }
                            }
                        });
                    }
                })
            })

        //REGISTRAR CATEGORIA
        document.getElementById("btnRegistrarCat").addEventListener("click", function() {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {

                if (form.checkValidity() === true) {

                    categoria = $("#iCategoria").val();

                    var datos = new FormData();

                    datos.append("idCategoria", idCategoria);
                    datos.append("categoria", categoria);

                    Swal.fire({
                        title: 'Está seguro de guardar la categoría?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!',
                        cancelButtonText: 'Cancelar!',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            $.ajax({
                                url: "ajax/categorias.ajax.php",
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

                                    idCategoria = 0;
                                    categoria = "";

                                    $(".needs-validation").removeClass("was-validated");
                                    $("#iCategoria").val("");
                                    tableCategorias.ajax.reload();

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