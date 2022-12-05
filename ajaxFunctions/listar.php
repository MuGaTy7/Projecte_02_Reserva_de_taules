<?php
require_once "../config/conexion.php";

if ($_POST['tipo'] == 'mesas'){
    if(!empty($_POST['valor_id']) || !empty($_POST['valor_ubi']) || !empty($_POST['valor_capa'])){
        $valor_id = $_POST['valor_id'];
        $valor_ubi = $_POST['valor_ubi'];
        $valor_capa = $_POST['valor_capa'];
        $consulta = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mesa LIKE '%".$valor_id."%' AND ubicacion LIKE '".$valor_ubi."%' AND capacidad LIKE '%".$valor_capa."%'");
        $consulta->execute();
    }else{
        $consulta = $pdo->prepare("SELECT * FROM tbl_mesa");
        $consulta->execute();
    }
} else if ($_POST['tipo'] == 'camareros') {
    if(!empty($_POST['valor_id']) || !empty($_POST['valor_dni']) || !empty($_POST['valor_username'])){
        $valor_id = $_POST['valor_id'];
        $valor_dni = $_POST['valor_dni'];
        $valor_username = $_POST['valor_username'];
        $consulta = $pdo->prepare("SELECT * FROM tbl_user WHERE id_user LIKE '%".$valor_id."%' AND dni LIKE '".$valor_dni."%' AND username LIKE '".$valor_username."%'");
        $consulta->execute();
    }else{
        $consulta = $pdo->prepare("SELECT * FROM tbl_user");
        $consulta->execute();
    }
} else if ($_POST['tipo'] == 'mantenimiento') {
    if(!empty($_POST['valor_id']) || !empty($_POST['valor_dni']) || !empty($_POST['valor_username'])){
        $valor_id = $_POST['valor_id'];
        $valor_dni = $_POST['valor_dni'];
        $valor_username = $_POST['valor_username'];
        $consulta = $pdo->prepare("SELECT * FROM tbl_man WHERE id_man LIKE '%".$valor_id."%' AND dni LIKE '".$valor_dni."%' AND username LIKE '".$valor_username."%'");
        $consulta->execute();
    }else{
        $consulta = $pdo->prepare("SELECT * FROM tbl_man");
        $consulta->execute();
    }
}

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
