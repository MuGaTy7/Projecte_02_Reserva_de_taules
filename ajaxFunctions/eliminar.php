<?php
    require_once "../config/conexion.php";
    
    $data = $_POST['id'];
    
    $query = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
