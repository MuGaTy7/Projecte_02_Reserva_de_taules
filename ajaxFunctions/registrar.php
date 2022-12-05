<?php
require('../config/conexion.php');

// if ($_POST['tipo'] == 'mesas'){

// } else if ($_POST['tipo'] == 'camareros') {

// } else if ($_POST['tipo'] == 'mantenimiento') {

// }


$ubicacion = $_POST['ubi'];
$capacidad = $_POST['capa'];
$disponibilidad = 'Libre';

if (empty($_POST['idp'])){
    $query = $pdo->prepare("INSERT INTO tbl_mesa (id_mesa, ubicacion, capacidad, disponibilidad) VALUES (null, :ubi, :capa, :dis)");
    $query->bindParam(":ubi", $ubicacion);
    $query->bindParam(":capa", $capacidad);
    $query->bindParam(":dis", $disponibilidad);
    $query->execute();
    $pdo = null;
    echo "registrado";
}else{
    $id = $_POST['idp'];
    $query = $pdo->prepare("UPDATE tbl_mesa SET ubicacion = :ubi, capacidad = :capa WHERE id_mesa = :id");
    $query->bindParam(":ubi", $ubicacion);
    $query->bindParam(":capa", $capacidad);
    $query->bindParam("id", $id);
    $query->execute();
    $pdo = null;
    echo "modificado";
}

