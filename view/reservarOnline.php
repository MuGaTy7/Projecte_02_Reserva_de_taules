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
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre...">
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Escriba sus apellidos...">
            </div>
            <div class="div-online">
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Escriba su número de teléfono...">
            </div>
            <div class="div-online">
                <input type="number" name="personas" id="personas" class="form-control" placeholder="Número de comensales">
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="¿Donde quieren comer?">
            </div>
            <div class="div-online">
                <input type="date" name="dia" id="dia" class="form-control">
                <select class="form-control" name="hora" id="hora" placeholder="aaaa">
                    <option value="1">13:00:00</option>
                    <option value="2">14:00:00</option>
                    <option value="3">15:00:00</option>
                    <option value="4">16:00:00</option>
                    <option value="5">20:00:00</option>
                    <option value="6">21:00:00</option>
                    <option value="7">22:00:00</option>
                    <option value="8">23:00:00</option>
                </select>
            </div>
            <div class="div-online">
                <input type="submit" class="btn btn-danger" value="Reservar">
            </div>
        </form>
    </div>
</body>
<script src="../js/loginAnimation.js"></script>
</html>