<?php

require_once '../config/conexion.php';

// Recoger datos de la reserva online:
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$personas = $_POST['personas'];
$ubicacion = $_POST['ubicacion'];
$dia = $_POST['dia'];

$hora1 = $_POST['hora'].':00';
$fecha1 = $dia." ".$hora1;

try {
    $pdo->beginTransaction();

    // 1r SQL: Primero hay que comprobar que haya una mesa disponible con esos datos que quiere el usuario:
    $query = $pdo->prepare("SELECT id_mesa, ubicacion, capacidad, disponibilidad FROM tbl_mesa WHERE disponibilidad != 'Averiado' AND ubicacion = '".$ubicacion."' AND capacidad = '".$personas."' AND id_mesa NOT IN ( SELECT id_mesa FROM tbl_reserva WHERE hora_inici BETWEEN STR_TO_DATE('$fecha1', '%Y-%m-%d %T') AND ADDTIME(STR_TO_DATE('$fecha1', '%Y-%m-%d %T'), '01:00:00') AND hora_fi IS NULL ) LIMIT 1;");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $mesaDisponible) {
        $mesaDis = $mesaDisponible['id_mesa'];
    }

    // 2n SQL:
    if (!empty($resultado)){
        // Establezco que siempre las haga el mismo camarero. DATE_FORMAT("2017-06-15 15:20:00", "%Y-%m-%d %H:%i")
        $query = $pdo->prepare("INSERT INTO `tbl_reserva`(`id_reserva`, `id_user`, `id_mesa`, `nom_persona`, `apellido_persona`, `telefono_persona`, `ocupacion_res`, `hora_inici`, `tipo_reserva`) VALUES (null,1,$mesaDis,:nom,:ape,:tel,:per, DATE_FORMAT(:fecha, '%Y-%m-%d %H:%i'),'online')");
        $query->bindParam(":nom", $nombre);
        $query->bindParam(":ape", $apellidos);
        $query->bindParam(":tel", $telefono);
        $query->bindParam(":per", $personas);
        $query->bindParam(":fecha", $fecha1);
        $query->execute();
        echo "<script>location.href = '../view/reservarOnline.php?onlineOk=true'</script>";
    } else {
        echo "<script>location.href = '../view/reservarOnline.php?noHayMesas=true'</script>";
    }

    $pdo->commit();

} catch (Exception $e) {
    $pdo->rollBack();
    echo $e->getMessage();
}





