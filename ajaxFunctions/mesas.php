<?php

require_once '../config/conexion.php';

// TRANSACCIÓN PARA ACTUALIZAR LAS MESAS A LA HORA INDICADA POR LA INICI:

try {
    $pdo->beginTransaction();

    // 1r SQL: Identificar aquellas mesas que tienen una reserva en la hora actual:
    $query = $pdo->prepare("SELECT * FROM tbl_reserva WHERE hora_inici BETWEEN CURRENT_TIMESTAMP() AND ADDTIME(CURRENT_TIMESTAMP, '00:00:30');");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    // 2n SQL: Modificar el estado de esas mesas:
    foreach ($resultado as $mesaActualizable) {
        $mesaAct = $mesaActualizable['id_mesa'];
        $query = $pdo->prepare("UPDATE tbl_mesa SET `disponibilidad` = 'Ocupado' WHERE `id_mesa` = $mesaAct;");
        $query->execute();
    }
    
    $pdo->commit();

} catch (Exception $e) {
    $pdo->rollBack();
    echo $e->getMessage();
}

// MOSTRAR MESAS (esto se ha de hacer siempre por eso no lo he puesto dentro de la transacción):
// RECOGE EL TIPO DE UBICAION EN EL QUE SE ENCUENTRA:
$sala = $_POST['sala'];

$query = $pdo->prepare("SELECT * FROM `tbl_mesa` WHERE `ubicacion` = '".$sala."';");
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
