<?php
require_once "../config/conexion.php";

// if ($_POST['tipo'] == 'mesas'){

// } else if ($_POST['tipo'] == 'camareros') {

// } else if ($_POST['tipo'] == 'mantenimiento') {

// }

if(!empty($_POST['valor_id']) || !empty($_POST['valor_ubi']) || !empty($_POST['valor_capa'])){
    $valor_id = $_POST['valor_id'];
    $valor_ubi = $_POST['valor_ubi'];
    $valor_capa = $_POST['valor_capa'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mesa LIKE '%".$valor_id."%' AND ubicacion LIKE '%".$valor_ubi."%' AND capacidad LIKE '%".$valor_capa."%'");
    $consulta->execute();
}else{
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa");
    $consulta->execute();
}

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
