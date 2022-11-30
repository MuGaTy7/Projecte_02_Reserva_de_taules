<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Mesas</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../img/favicon/safari-pinned-tab.svg" color="#bababa">
    <meta name="msapplication-TileColor" content="#bababa">
    <meta name="theme-color" content="#bababa">
    <!-- Link font awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://kit.fontawesome.com/2b5286e1aa.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/crudsStyles.css">
</head>
<body>
    <?php
    require_once '../functions/funciones.php';
    validarSesionUser();
    ?>

    <!-- CRDUD -->
    <div class="region-crud" id="sillas">
        <div class="widget-form">
            <div class="left-widget">
                <a href="./beforeInicio.php"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="../functions/cerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
            <div id="resultado_form" class="fondo-form"> <!--*********************************-->
                <div>
                    <h3 id="titleRegister" class="text-center">Registro de sillas</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="frm">
                        <div class="form-group">
                            <label for="">Ubicación</label>
                            <input type="hidden" name="idp" id="idp" value="">
                            <input type="text" name="ubi" id="ubi" placeholder="Ubicación" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Capacidad</label>
                            <input type="text" name="capa" id="capa" placeholder="Capacidad" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Registrar" id="registrar" class="btn btn-danger btn-block">
                        </div>
                    </form>
                </div>
            </div> <!--*********************************-->
        </div>
        <div class="widget-table">
        <div class="left-widget-opt">
                <a id="mesas_crud">MESAS</a>
                <a id="camareros_crud">CAMAREROS</a>
                <a id="mantenimiento_crud">MANTENIMIENTO</a>
            </div>
            <div id="resultado_mesas" class="fondo-table-mesas"> <!--*********************************-->
                <div class="buscador-table">
                    <form action="" method="post" id="frmbusqueda">
                        <div class="form-group">
                            <label for="buscra">FILTROS:</label>
                            <div class="div-filtros">
                                <input type="text" name="buscar_id" id="buscar_id" placeholder="ID Mesa" class="form-control">
                                <input type="text" name="buscar_ubi" id="buscar_ubi" placeholder="Ubicación" class="form-control">
                                <input type="text" name="buscar_capa" id="buscar_capa" placeholder="Capacidad" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="scroll-table">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>MESA</th>
                                <th>UBICACIÓN</th>
                                <th>CAPACIDAD</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody id="resultado">

                        </tbody>
                    </table>
                </div>
            </div> <!--*********************************-->
        </div>
    </div>


    <script src="../js/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>