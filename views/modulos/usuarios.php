<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
    <div class="row p-0 m-0">
        <!--LISTADO DE USUARIOS-->
        <div class="col-md-8">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> Usuarios Registrados</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblusuarios" class="display nowrap table-striped w-100 shadow rounded">
                            <thead class="bg-info text-left">
                                <tr>

                                    <th>Id Usuario</th>
                                    <th>Usuario</th>
                                    <th>Id. Rol</th>
                                    <th>Privilegio</th>
                                    <th>Contraseña</th>
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
        <!--FORMULARIO REGISTRO USUARIOS-->
        <div class="col-md-4">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Registrar nuevo usuario</h3>
                </div>
                <div class="card-body">
                    <form action="" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label class="col-form-label" for="iUsuario">
                                        <i class="fas fa-user"></i>
                                        <span class="small">Usuario</span><span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="iUsuario" name="iUsuario" placeholder="Ingrese un usuario" required>
                                    <div class="invalid-feedback">Debe ingresar el usuario!</div>
                                    <br>
                                    <input type="text" class="form-control form-control-sm" id="privUsuario" name="privUsuario" placeholder="Ingrese un tipo de privilegio" required>
                                    <div class="invalid-feedback">Debe ingresar un privilegio al usuario!</div>
                                    <br>
                                    <input type="text" class="form-control form-control-sm" id="pasUsuario" name="pasUsuario" placeholder="Ingrese una contraseña" required>
                                    <div class="invalid-feedback">Debe ingresar una contraseña!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-0 mt-2">
                                    <a style="cursor:pointer;" class="btn btn-primary w-100" id="btnRegistrarUsu">Registrar Usuario
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

        //LISTAR PRIVILEGIOS DE USUARIO
        $.ajax({
            url: "ajax/usuarios.ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {
                var options = '<option selected value ="">Seleccione un privilegio</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
                }
                $("#selprivUsuario").html(options);
            }
        });

        //VARIABLES PARA EDITAR O REGISTRAR USUARIO
        var idUsuario = 0;
        var usuario = "";

        var tableUsuarios = $("#tblusuarios").DataTable({
            ajax: {
                url: 'ajax/usuarios.ajax.php',
                dataSrc: ""
            },
            columnDefs: [{
                    targets: 6,
                    sortable: false,
                    render: function(data, type, full, meta) {
                        console.log(data, type, full, meta);
                        return "<center>" +
                            "<span class='btnEditarUsuario text-primary px-3' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Usuario'> " +
                            "<i class='fas fa-pencil-alt fs-5'></i> " +
                            "</span> " +
                            "<span class='btnEliminarUsuario text-danger px-3'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Usuario'> " +
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
                    targets: 2,
                    visible: false,
                },
                {
                    targets: 5,
                    sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {
                            if (parseInt(rowData[5]) == 1) {
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

        //EDITAR USUARIO
        $('#tblusuarios tbody').on('click', '.btnEditarUsuario', function() {
            var data = tableUsuarios.row($(this).parents('tr')).data();

            if ($(this).parents('tr').hasClass('selected')) {

                $(this).parents('tr').removeClass('selected');
                idUsuario = 0;
                $("#iUsuario").val("");
                $("#pasUsuario").val("");

            } else {

                tableUsuarios.$('tr.selected').removeClass('selected');
                $(this).parents('tr').addClass('selected');

                idUsuario = data[0];
                $("#iUsuario").val(data[1]);
                $("#privUsuario").val(data[3]);
                $("#pasUsuario").val(data[4]);
            }
        })

        //ELIMINAR USUARIO
        $('#tblusuarios').on('click', '.btnEliminarUsuario',
            function() {
                var data = tableUsuarios.row($(this).parents('tr')).data();

                Swal.fire({
                    title: 'Está seguro de eliminar el usuario ' + data[1] + '?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {

                    if (result.isConfirmed) {

                    }
                })
            })

        //REGISTRAR USUARIO
        document.getElementById("btnRegistrarUsu").addEventListener("click", function() {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {

                if (form.checkValidity() === true) {

                    usuario = $("#iUsuario").val();

                    var datos = new FormData();

                    datos.append("idUsuario", idUsuario);
                    datos.append("usuario", usuario);

                    Swal.fire({
                        title: 'Está seguro de guardar el usuario?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar!',
                        cancelButtonText: 'Cancelar!',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            $.ajax({
                                url: "ajax/usuarios.ajax.php",
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

                                    idUsuario = 0;
                                    usuario = "";

                                    $("#iUsuario").val("");

                                    tableUsuarios.ajax.reload();

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