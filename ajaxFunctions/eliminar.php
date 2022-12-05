<?php
require_once "../config/conexion.php";

$data = $_POST['id'];
$tipo = $_POST['tipo'];

if ($tipo == 'mesas'){
    $query = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "mesas";
} else if ($tipo == 'camareros') {
    $query = $pdo->prepare("DELETE FROM tbl_user WHERE id_user = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "camareros";
} else if ($tipo == 'mantenimiento'){
    $query = $pdo->prepare("DELETE FROM tbl_man WHERE id_man = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "mantenimiento";
}


