<?php
require "../config/conexion.php";

$id = $_POST['id'];
$tipo = $_POST['tipo'];

if($tipo == 'mesas'){
    $query = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mesa = :id");
    $query->bindParam(":id", $id);
    $query->execute();
} else if ($tipo == 'camareros') {
    $query = $pdo->prepare("SELECT * FROM tbl_user WHERE id_user = :id");
    $query->bindParam(":id", $id);
    $query->execute();
} else if ($tipo == 'mantenimiento') {
    $query = $pdo->prepare("SELECT * FROM tbl_man WHERE id_man = :id");
    $query->bindParam(":id", $id);
    $query->execute();
}

$resultado = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);
    