<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    require_once "../config/conexion.php";
    require_once "./funciones.php";

    $username =  $conexion -> real_escape_string(trim(strip_tags($_POST['username'])));
    $password = sha1($_POST['password']);

    // LLAMAR A LA FUNCIÓN QUE NOS VALIDA EL INICIO DE SESIÓN Y TAMBIÉN QUE TIPO DE USER ES
    login($username,$password);

} else {
   echo "<script>location.href = '../index.php'</script>";
}
