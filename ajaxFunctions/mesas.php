<?php

require_once '../config/conexion.php';

// RECOGE EL TIPO DE UBICAION EN EL QUE SE ENCUENTRA:
$sala = $_POST['sala'];

$query = $pdo->prepare("SELECT * FROM `tbl_mesa` WHERE `ubicacion` = '".$sala."';");
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);