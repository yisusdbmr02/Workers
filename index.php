<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/img3.jpg">
</head>


<body class="bg-primary">
    <?php
    include_once 'con_desc_db.php';
    $selectaloj = "Select numaloj, alojamiento, nombrecompleto,responsable,direccion,distancia from alojamiento order by alojamiento ";
    $dbname = "workers";
    try {

        $mysqli = conectar($dbname);
        $resul = $mysqli->query($selectaloj);
        //$selectbyid = $mysqli->query($selectciudadbyid);
        ?>
        <div class="container shadow border rounded bg-warning ">

            <div class="row p-3">
                <div class="col text-center">

                    <h1 style="font-weight: bolder;">Listado Alojamientos</h1>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-3">
                    <div class="form-group">
                        <input id="campoBusqueda" type="text" class="form-control" placeholder="Buscar...">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">

                        <label for="filter">Filtrar por Distancia</label>
                        <select id="selectDistancia" class="form-control" name="filter">
                            <option value="">Todas</option>
                            <option value="0-10">0-10</option>
                            <option value="10-20">10-20</option>
                            <option value="20-30">20-30</option>
                            <option value="30-40">30-40</option>
                            <option value="40-50">40-50</option>
                            <option value="50-60">50-60</option>
                            <option value="60-70">60-70</option>
                            <option value="70-80">70-80</option>
                            <option value="80-90">80-90</option>
                            <option value="90-100">90-100</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive p-2">
                    <table id="table" class="table table-light table-bordered rounded table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Alojamiento</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Direccion</th>
                                <th id="distancia" scope="col">Distancia</th>
                                <th scope="col"><a class="btn p-0" href="javascript:operacion('insertar')"><i
                                            class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resul as $alojamiento) { ?>
                                <tr>
                                    <td>
                                        <?= $alojamiento['alojamiento'] ?>
                                    </td>
                                    <td>
                                        <?= $alojamiento['nombrecompleto'] ?>
                                    </td>
                                    <td>
                                        <?= $alojamiento['responsable'] ?>
                                    </td>
                                    <td>
                                        <?= $alojamiento['direccion'] ?>
                                    </td>
                                    <td>
                                        <?= $alojamiento['distancia'] ?>
                                    </td>
                                    <td><a class="btn p-0"
                                            href="javascript:operacion('modificar','<?= $alojamiento['numaloj'] ?>','<?= $alojamiento['alojamiento'] ?>','<?= $alojamiento['nombrecompleto'] ?>','<?= $alojamiento['responsable'] ?>','<?= $alojamiento['direccion'] ?>','<?= $alojamiento['distancia'] ?>')"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a id="elim" class="btn" href="javascript:deleteAloj(<?= $alojamiento['numaloj'] ?>)">
                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <!-- MODAL INSERTAR/MODIFICAR -->
        <div class="modal fade" id="modalInsertarModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        <form action="anadirModAloj.php" id="formInsertMod" method="post">
                            <div class="row m-2">
                                <input type="hidden" id="idAloj" name="idAloj">
                                <label class="mr-2" for="alojamiento">Alojamiento:</label>
                                <input type="text" class="w-75 form-control" name="alojamiento" id="modalAlojamiento">
                            </div>
                            <div class="row m-2">
                                <label class="mr-2" for="nombre">Nombre Completo:</label>
                                <input type="text" class="w-50 form-control" name="nombre" id="modalNombre">
                            </div>
                            <div class="row m-2">
                                <label class="mr-2" for="responsable">Responsable:</label>
                                <input type="text" class="form-control w-50" name="responsable" id="modalResponsable">
                            </div>
                            <div class="row m-2">
                                <label class="mr-2" for="direccion">Dirección:</label>
                                <input type="text" class="w-75 form-control" name="direccion" id="modalDireccion">
                            </div>
                            <div class="row m-2">
                                <label class="mr-2" for="distancia">Distancia:</label>
                                <input style="max-width:80px" class="form-control" type="number" min="1" name="distancia"
                                    id="modalDistancia">
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="subInsMod" class="btn btn-primary">Insertar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        desconectar($mysqli);
    } catch (exception $e) {
        $e->getMessage();
    }

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function operacion(op, id, aloj, name, resp, dir, dist) {
            if (op == 'insertar') {
                $('#modalInsertarModificar').modal('show');
                $('#modalInsertarModificar').on('shown.bs.modal', function (e) {
                    $('#title').text('Añadir Alojamiento');
                    $('#subInsMod').text('Insertar');
                    $('#modalAlojamiento').focus();
                    $('#idAloj').val(0);
                })
            } else if (op == 'modificar') {
                $('#modalInsertarModificar').modal('show');
                $('#modalInsertarModificar').on('shown.bs.modal', function (e) {
                    $('#title').text('Modificar Alojamiento');
                    $('#subInsMod').text('Modificar');
                    $('#modalAlojamiento').focus();
                    $('#idAloj').val(id);
                    $('#modalAlojamiento').val(aloj);
                    $('#modalNombre').val(name);
                    $('#modalResponsable').val(resp);
                    $('#modalDireccion').val(dir);
                    $('#modalDistancia').val(dist);
                })
            }
        }
        function deleteAloj(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'deleteAloj.php?id=' + id + '';
                }
            })
        }
        // Función para verificar si el parámetro de consulta "mensaje" está presente
        function mostrarMensaje() {
            const mensaje = $.urlParam('msg');
            if (mensaje === '1') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        }

        // Agrega la función $.urlParam a jQuery para obtener el valor de un parámetro de consulta
        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (!results) {
                return null;
            }
            return decodeURIComponent(results[1]) || 0;
        }

        // Ejecuta la función cuando la página se carga
        $(document).ready(mostrarMensaje);
        /*Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
        })*/
        $(document).ready(function () {
            // Agrega un evento "keyup" al campo de búsqueda para que se filtre la tabla en tiempo real
            $('#campoBusqueda').on('keyup', function () {
                // Obtén el valor del campo de búsqueda
                var valorBusqueda = $(this).val().toLowerCase().trim();

                // Oculta todas las filas de la tabla que no coincidan con el valor de búsqueda
                $('#table tbody tr').filter(function () {
                    return !$(this).text().toLowerCase().includes(valorBusqueda);
                }).hide();

                // Muestra todas las filas de la tabla que coincidan con el valor de búsqueda
                $('#table tbody tr').filter(function () {
                    return $(this).text().toLowerCase().includes(valorBusqueda);
                }).show();
            });
            $('#selectDistancia').on('change', function () {
                // Obtén el valor seleccionado del select
                var rangoSeleccionado = $(this).val();

                // Si no se seleccionó ninguna opción, muestra todas las filas de la tabla
                if (rangoSeleccionado == '') {
                    $('table tbody tr').show();
                }
                else {
                    // Separa el rango en dos valores numéricos
                    var rango = rangoSeleccionado.split('-');
                    var valorMinimo = parseInt(rango[0]);
                    var valorMaximo = parseInt(rango[1]);

                    // Oculta todas las filas de la tabla que no estén dentro del rango seleccionado
                    $('table tbody tr').filter(function () {
                        var valorCelda = parseInt($(this).find('td:eq(4)').text());
                        return (valorCelda < valorMinimo || valorCelda > valorMaximo);
                    }).hide();

                    // Muestra todas las filas de la tabla que estén dentro del rango seleccionado
                    $('table tbody tr').filter(function () {
                        var valorCelda = parseInt($(this).find('td:eq(4)').text());
                        return (valorCelda >= valorMinimo && valorCelda <= valorMaximo);
                    }).show();
                }
            });
        });
        
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>