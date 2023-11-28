<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administrar Módulos y Roles</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active">Administrar Módulos y Roles</li>
                </ol>
            </div><!-- /.col -->
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="asignar-modulo-rol" role="tablist">

            <li class="nav-item">
                <a class="nav-link" id="content-roles-tab" data-toggle="pill" href="#content-roles" role="tab" aria-controls="content-roles" aria-selected="false">Roles</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="content-modulos-tab" data-toggle="pill" href="#content-modulos" role="tab" aria-controls="content-modulos" aria-selected="false">Modulos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" id="content-modulo-rol-tab" data-toggle="pill" href="#content-modulo-rol" role="tab" aria-controls="content-modulo-rol" aria-selected="false">Asignar Modulo a Rol</a>
            </li>

        </ul>

        <div class="tab-content" id="tabsContent-asignar-modulo-rol">

            <!-- TAB-ADMINISTRAR ROLES -->
            <div class="tab-pane fade mt-4 px-4" id="content-roles" role="tabpanel" aria-labelledby="content-roles-tab">
                <h4>Administrar Roles</h4>
            </div>

            <!--TAB-CONTENIDO PARA MODULOS -->
            <div class="tab-pane fade  mt-4 px-4" id="content-modulos" role="tabpanel" aria-labelledby="content-modulos-tab">
                <div class="row">

                    <!--LISTADO DE MODULOS -->
                    <div class="col-md-6">
                        <div class="card card-info card-outline shadow">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list"></i> Listado de Módulos</h3>
                            </div>

                            <div class="card-body">
                                <table id="tblModulos" class="display nowrap table-striped shadow rounded" style="width:100%">
                                    <thead class="bg-info text-left">
                                        <th class="text-center">Acciones</th>
                                        <th>id</th>
                                        <th>Orden</th>
                                        <th>Módulo</th>
                                        <th>Vista</th>
                                        <th>Icono</th>
                                    </thead>
                                    <tbody class="small text left">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--/. col-md-6 -->

                    <!--FORMULARIO PARA REGISTRO Y EDICION -->
                    <div class="col-md-3">
                        <div class="card card-info card-outline shadow">

                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-edit"></i> Registro de Módulos</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" class="needs-validation-registro-modulo" novalidate id="frm_registro_modulo">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label" for="iptModulo">
                                                    <i class="fas fa-laptop fs-6"></i>
                                                    <span class="small">Módulo</span><span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" id="iptModulo" name="iptModulo" placeholder="Ingrese el módulo" required>
                                                <div class="invalid-feedback">Debe ingresar el módulo</div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label" for="iptVistaModulo">
                                                    <i class="fas fa-code fs-6"></i>
                                                    <span class="small">Vista PHP</span>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" id="iptVistaModulo" name="iptVistaModulo" placeholder="Ingrese la vista del módulo">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label class="col-form-label" for="iptIconoModulo">
                                                    <i class="fas fa-images fs-6"></i>
                                                    <span class="small">Icono</span><span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-sm" id="iptIconoModulo" name="iptIconoModulo" value="far fa-circle" placeholder="Ingrese el ícono del módulo: far fa-circle" required>
                                                <div class="invalid-feedback">Debe ingresar el ícono del módulo</div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group m-0 mt-2">
                                                <button type="button" class="btn btn-success w-100" id="btnRegistrarModulo">Guardar Módulo</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div><!--/. col-md-3 -->

                    <!--ARBOL DE MODULOS PARA REORGANIZAR -->
                    <div class="col-md-3">
                        <div class="card card-info card-outline shadow">

                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-edit"></i> Organizar Módulos</h3>
                            </div>

                            <div class="card-body">

                                <div class="">
                                    <div>Modulos del Sistema</div>
                                    <div class="" id="arbolModulos"></div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button id="btnReordenarModulos" class="btn btn-success mt-3 " style="width: 45%;">Organizar Módulos</button>
                                            <button id="btnReiniciar" class="btn btn-warning mt-3 " style="width: 45%;">Estado Inicial</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!--/. col-md-3 -->

                </div><!--/.row -->
            </div><!-- /#content-modulos -->

            <!-- TAB-ASIGNAR MODULO-ROL -->
            <div class="tab-pane fade active show mt-4 px-4" id="content-modulo-rol" role="tabpanel" aria-labelledby="content-modulo-rol-tab">

                <div class="row">

                    <div class="col-md-8">
                        <div class="card card-info card-outline shadow">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list"></i> Listado de Roles</h3>
                            </div>

                            <div class="card-body">
                                <table id="tbl_roles_asignar" class="display nowrap table-stripped w-100 shadow rounded">
                                    <thead>
                                        <th>Id Rol</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th class="text-center">Opciones</th>
                                    </thead>

                                    <tbody class="small text left">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- CARD-MODULOS JSTREE -->
                    <div class="col-md-4">

                        <div class="card card-info card-outline shadow" style="display:block;" id="card-modulos">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-laptop"></i> Módulos del Sistema</h3>
                            </div>

                            <div class="card-body" id="card-body-modulos">
                                <div class="row m-2">

                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-small m-0 p-0 w-100" id="marcar_modulos">Marcar todo</button>
                                    </div>

                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-small m-0 p-0 w-100" id="desmarcar_modulos">Desmarcar todo</button>
                                    </div>

                                </div>

                                <div id="modulos" class="demo">

                                </div>

                                <div class="row m-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Seleccione el módulo de inicio</label>
                                            <select class="custom-select" id="select_modulos"></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-2">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-small w-50 text-center" id="asignar_modulos">Asignar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tbl_roles_asignar, tbl_modulos, modulos_usuario, modulos_sistema;

        //EVENTO CARGA DE DATATABLE Y ARBOL DE MODULOS
        cargarDataTables();
        iniciarArbolModulos();

        var idRol = 0;
        var selectedElmtId = [];

        //EVENTO SELECCIONAR MODULOS EN ARBOL DE MODULOS
        $('#tbl_roles_asignar tbody').on('click', '.btnSeleccionarRol', function() {
            var data = tbl_roles_asignar.row($(this).parents('tr')).data();

            if ($(this).parents('tr').hasClass('selected')) {
                $(this).parents('tr').removeClass('selected');

                $('#modulos').jstree("deselect_all", false);
                $("#select_modulos option").remove();
                $('#select_modulos').append($('<option>', {
                    value: 0,
                    text: "--No hay modulos seleccionados--"
                }));

                idRol = 0;

            } else {
                tbl_roles_asignar.$('tr.selected').removeClass('selected');
                $(this).parents('tr').addClass('selected');

                idRol = data[0];
                //alert(idRol);

                $.ajax({
                    async: false,
                    url: "ajax/modulo.ajax.php",
                    method: 'POST',
                    data: {
                        accion: 2,
                        id_rol: idRol
                    },
                    dataType: 'json',
                    success: function(respuesta) {
                        //console.log(respuesta);

                        modulos_usuario = respuesta;

                        seleccionarModulosRol(idRol);


                    }
                });
            }
        })

        //EVENTO LLENAR SELECT_MODULOS
        $("#modulos").on("changed.jstree", function(evt, data) {
            $("#select_modulos option").remove();

            var selectedElmt = $('#modulos').jstree("get_selected", true);
            //console.log("Datos seleccionados:", selectedElmt);

            $.each(selectedElmt, function() {

                for (let i = 0; i < modulos_sistema.length; i++) {

                    if (modulos_sistema[i]["id"] == this.id && modulos_sistema[i]["vista"]) {

                        $("#select_modulos").append($('<option>', {
                            value: this.id,
                            text: this.text
                        }));
                    }
                }
            })
            if ($("#select_modulos").has('option').length <= 0) {
                $('#select_modulos').append($('<option>', {
                    value: 0,
                    text: "--No hay modulos seleccionados--"
                }));
            }
        })

        //EVENTO MARCAR MODULOS DEL CHECKBOX DEL ARBOL DE MODULOS
        $("#marcar_modulos").on('click', function() {
            $('#modulos').jstree('select_all');
        })

        //EVENTO DESMARCAR MODULOS DEL CHECKBOX DEL ARBOL DE MODULOS
        $("#desmarcar_modulos").on("click", function() {

            $('#modulos').jstree("deselect_all", false);
            $("#select_modulos option").remove();

            $('#select_modulos').append($('<option>', {
                value: 0,
                text: "--No hay modulos seleccionados--"
            }));
        })

        //REGISTRO EN LA BASE DE DATOS DE LOS MODULOS ASOCIADOS AL ROL
        $("#asignar_modulos").on('click', function() {
            //console.log("Evento asignar_modulos activado");

            selectedElmtId = []
            var selectedElmt = $('#modulos').jstree("get_selected", true);

            $.each(selectedElmt, function() {
                selectedElmtId.push(this.id);
                if (this.parent != "#") {
                    selectedElmtId.push(this.parent);
                }

            });
            //console.log(selectedElmtId);

            //QUITAR MODULOS DUPLICADOS
            let modulosSeleccionados = [...new Set(selectedElmtId)];
            let modulo_inicio = $("#select_modulos").val();
            console.log("modulos seleccionados:", selectedElmtId);

            if (idRol != 0 && modulosSeleccionados.length > 0) {
                registrarRolModulos(modulosSeleccionados, idRol, modulo_inicio);
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Debe seleccionar un rol y modulos a registrar',
                    showConfirmButton: false,
                    timer: 3000
                })
            }

        })

        //MANTENIMIENTO MODULOS
        fnCargarArbolModulos();
        ajustarHeadersDataTables($('#tblModulos'));

        //REORGANIZAR MODULOS DEL SISTEMA
        $("#btnReordenarModulos").on('click', function() {
            fnOrganizarModulos();
        })

        //REINICIAR MODULOS DEL SISTEMA EN JSTREE
        $("#btnReiniciar").on('click', function() {
            //recargar arbol de modulos 
            actualizarArbolModulos();
        })

        function cargarDataTables() {
            tbl_roles_asignar = $('#tbl_roles_asignar').DataTable({
                ajax: {
                    async: false,
                    url: 'ajax/rol.ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    dataSrc: "",
                    data: {
                        accion: 1
                    }
                },
                columnDefs: [{
                        targets: 2,
                        sortable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            if (parseInt(rowData[2]) == 1) {
                                $(td).html("Activo")
                            } else {
                                $(td).html("Inactivo")
                            }
                        }
                    },
                    {
                        targets: 3,
                        sortable: false,
                        render: function(data, type, full, meta) {
                            return "<center>" +
                                "<span class='btnSeleccionarRol text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Seleccionar Rol'>" +
                                "<i class='fas fa-check fs-5'></i>" +
                                "</span>" +
                                "</center>";
                        }
                    }
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });

            tbl_modulos = $('#tblModulos').DataTable({
                ajax: {
                    async: false,
                    url: 'ajax/modulo.ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    dataSrc: "",
                    data: {
                        'accion': 3
                    }
                },
                columnDefs: [{
                        targets: 0,
                        sortable: false,
                        render: function(data, type, full, meta) {
                            return "<center>" +
                                "<span class='fas fa-edit fs-6 btnSeleccionarModulo text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Seleccionar Modulo'>" +
                                "</span>" +
                                "<span class='fas fa-trash fs-6 btnEliminarModulo text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Modulo'>" +
                                "</span>" +
                                "</center>";
                        }
                    },
                    {
                        targets: 1,
                        visible: false
                    }
                ],
                scrollX: true,
                order: [
                    [2, 'asc']
                ],
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });
        }

        function ajustarHeadersDataTables(element) {

            var observer = window.ResizeObserver ? new ResizeObserver(function(entries) {
                entries.forEach(function(entry) {
                    $(entry.target).DataTable().columns.adjust();
                });
            }) : null;

            // Function to add a datatable to the ResizeObserver entries array
            resizeHandler = function($table) {
                if (observer)
                    observer.observe($table[0]);
            };

            // Initiate additional resize handling on datatable
            resizeHandler(element);
        }

        function iniciarArbolModulos() {
            $.ajax({
                async: false,
                url: "ajax/modulo.ajax.php",
                method: 'POST',
                data: {
                    accion: 1
                },
                dataType: 'json',
                success: function(respuesta) {
                    modulos_sistema = respuesta;
                    //console.log(respuesta);

                    //CARGAR ARBOL DE MODULOS
                    $('#modulos').jstree({
                        'core': {
                            "check_callback": true,
                            'data': respuesta
                        },
                        "checkbox": {
                            "keep_selected_style": true
                        },
                        "types": {
                            "default": {
                                "icon": "fas fa-laptop text-warning"
                            }
                        },
                        "plugins": ["wholerow", "checkbox", "types", "changed"]

                    })
                }
            })
        }

        function seleccionarModulosRol(pin_idRol) {
            $('#modulos').jstree('deselect_all');
            //console.log("modulos_sistema", modulos_sistema);
            //console.log("modulos_usuario", modulos_usuario);
            //console.log("pin_idRol", pin_idRol);

            for (let i = 0; i < modulos_sistema.length; i++) {
                //console.log("modulos_sistema[i]['id']", modulos_sistema[i]["id"]);
                //console.log("modulos_usuario[i]['id']", modulos_usuario[i]["id"]);

                if (modulos_sistema[i]["id"] == modulos_usuario[i]["id"] && modulos_usuario[i]["sel"] == 1) {
                    //console.log("Seleccionando módulo:", modulos_sistema[i]["id"]);
                    $("#modulos").jstree("select_node", modulos_sistema[i]["id"]);
                }
            }
            //OCULTAR NODO MODULOS Y PERFIL PARA ADMINISTRADOR
            if (pin_idRol == 1) {
                $("#modulos").jstree(true).hide_node(8);
            } else {
                $('#modulos').jstree(true).show_all();
            }
        }

        function registrarRolModulos(modulosSeleccionados, idRol, idmodulo_inicio) {
            console.log("Datos a enviar:", modulosSeleccionados, idRol, idmodulo_inicio);
            $.ajax({
                async: false,
                url: "ajax/rol_modulo.ajax.php",
                method: 'POST',
                data: {
                    accion: 1,
                    id_modulosSeleccionados: modulosSeleccionados,
                    id_rol: idRol,
                    id_modulo_inicio: idmodulo_inicio
                },
                dataType: 'json',
                success: function(respuesta) {
                    console.log("Respuesta del servidor:", respuesta);
                    if (respuesta > 0) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se registró correctamente',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        $("#select_modulos option").remove();
                        $('#modulos').jstree("deselect_all", false);
                        tbl_roles_asignar.ajax.reload();

                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error al registrar',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }

                }
            });
        }

        function actualizarArbolModulosPerfiles() {
            $.ajax({
                async: "ajax/modulo.ajax.php",
                url: 'POST',
                data: {
                    accion: 1,
                },
                dataType: 'json',
                success: function(respuesta) {
                    modulos_sistema = respuesta;

                    $('#modulos').jstree(true).settings.core.data = respuesta;
                    $('#modulos').jstree(true).refresh();
                }
            });
        }

        // FUNCIONES PARA MANTENIMIENTO DE MODULOS

        function fnCargarArbolModulos() {
            var dataSource;

            $.ajax({
                async: false,
                url: "ajax/modulo.ajax.php",
                method: "POST",
                data: {
                    accion: 1,
                },
                dataType: 'json',
                success: function(respuesta) {
                    dataSource = respuesta
                }
            });


            $('#arbolModulos').jstree({
                "core": {
                    "check_callback": true,
                    "data": dataSource
                },
                "types": {
                    "default": {
                        "icon": "fas fa-laptop"
                    },
                    "file": {
                        "icon": "fas fa-laptop"
                    }
                },
                "plugins": ["types", "dnd"]
            }).bind('ready.jstree', function(e, data) {
                $('#arbolModulos').jstree('open_all')
            })
        }

        function actualizarArbolModulos() {
            $.ajax({
                async: false,
                url: "ajax/modulo.ajax.php",
                method: 'POST',
                data: {
                    accion: 1,
                },
                dataType: 'json',
                success: function(respuesta) {
                    $('#arbolModulos').jstree(true).settings.core.data = respuesta;
                    $('#arbolModulos').jstree(true).refresh();
                }
            })
        }

        function fnOrganizarModulos() {
            var array_modulos = [];
            var reg_id, reg_orden;

            var v = $("#arbolModulos").jstree(true).get_json('#', {
                'flat': true
            });

            for (i = 0; i < v.length; i++) {
                var z = v[i];
                reg_id = z["id_modulo"];
                reg_orden = i;
                array_modulos[i] = reg_id + ';' + reg_orden;
            }


            console.log("🚀 ~ file: modulos_roles.php ~ line 713 ~ $ ~ array_modulos", array_modulos);


            /* REGISTRAMOS LOS MODULOS CON EL NUEVO ORDENAMIENTO */
            $.ajax({
                async: false,
                url: "ajax/modulo.ajax.php",
                method: 'POST',
                data: {
                    accion: 4,
                    modulos: array_modulos
                },
                dataType: 'json',
                success: function(respuesta) {
                    console.log("aqui se imprime la respuesta:", respuesta);

                    if (respuesta > 0) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se registró correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        console.log("Tabla recargada");
                        tbl_modulos.ajax.reload();

                        console.log("Árbol actualizado");
                        // Recargamos arbol de modulos - MANTENIMIENTO MODULOS ASIGNADOS A PERFILES                                
                        actualizarArbolModulosPerfiles();
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error al registrar',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
        }


    })
</script>