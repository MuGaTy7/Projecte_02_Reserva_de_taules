<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Online</title>
    <!-- BOOTSTRAP -->
    <meta name="theme-color" content="#bababa">
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
    <link rel="stylesheet" href="../css/inicioStyles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body style="padding: 100px;">

    <div class="formulario-on">
        <div class="foto-online">
            <img src="../img/star-wars-nuevo-largometraje.jpg" alt="">
        </div>
        <div class="separator"></div>
        <form action="../functions/reservasOnline.php" method="post" class="form-online">
            <h3>Reserva Online</h3>
            <div class="div-online">
                <div class="campos-errores">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre...">
                    <p id="texto_nombre"><i class="fa-solid fa-circle-exclamation"></i>Error en el campo nombre!</p>
                </div>
                <div class="campos-errores">
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Escriba sus apellidos...">
                    <p id="texto_apellidos"><i class="fa-solid fa-circle-exclamation"></i>Error en el campo apellidos!</p>
                </div>
            </div>
            <div class="div-online">
                <div class="campos-errores" style="width: 100%;">
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Escriba su número de teléfono...">
                    <p id="texto_telefono"><i class="fa-solid fa-circle-exclamation"></i>Error en el campo telefono!</p>
                </div>
            </div>
            <div class="div-online">
                <!-- <input type="number" name="personas" id="personas" class="form-control" placeholder="Número de comensales"> -->
                <select name="personas" id="personas" class="form-control" placeholder="Número de comensales">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                </select>
                <!-- <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="¿Donde quieren comer?"> -->
                <select name="ubicacion" id="ubicacion" class="form-control" placeholder="¿Donde quieren comer?">
                    <option value="salon">Salón</option>
                    <option value="terraza">Terraza</option>
                    <option value="sala_privada1">Sala privada 1</option>
                    <option value="sala_privada2">Sala privada 2</option>
                </select>
            </div>
            <div class="div-online">
                <p style="margin-bottom: 0;">En nuestro restaurante tan solo se puden hacer reservas por la <b>noche</b>: (19:00 a 23:00)</p>
            </div>
            <div class="div-online">
                <input type="date" min="<?php echo date('Y-m-d') ?>" name="dia" id="dia" class="form-control">
                <input type="time" name="hora" id="hora" class="form-control">
            </div>
            <div class="div-online">
                <input type="submit" id="registrar" class="btn btn-danger" onclick="return validarOnline()" value="Reservar">
            </div>
        </form>
    </div>
</body>
    <!-- RESERVA REALIZADA CORRECTAMENTE: -->
    <?php
    if (isset($_GET['onlineOk'])){
    ?>
        <script>
        Swal.fire({
        icon: 'success',
        title: 'Mesa reservada!',
        text: 'Muchas gracias por reservar tu mesa y confiar en nosotros, un saludo!'})
        </script>
    <?php
    }
    ?>
    <!-- NO HAY MESA PARA PODER RESERVAR: -->
    <?php
    if (isset($_GET['noHayMesas'])){
    ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Mesa no disponible!',
        text: 'Lo sentimos mucho, en este momento no tenemos la mesa que estas buscando. Prueba con otra hora en otra ubicación.'})
        </script>
    <?php
    }
    ?>
    <!-- ERROR DE DIA: -->
    <?php
    if (isset($_GET['fechaInc'])){
    ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Fecha incorrecta o vacía!',
        text: 'La fecha que has introducido no es válida ya que es menor que la actual, prueba otra vez.'})
        </script>
    <?php
    }
    ?>
    <!-- ERROR DE HORA: -->
    <?php
    if (isset($_GET['horaInc'])){
    ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Hora incorrecta!',
        text: 'La hora que has introducido no es válida, prueba otra vez.'})
        </script>
    <?php
    }
    ?>
<script src="../js/validateOnline.js"></script>
<!-- AJAX DE MESAS -->
<script src="../js/ajaxMesas.js"></script>
</html>