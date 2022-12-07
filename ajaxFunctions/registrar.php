<?php
require('../config/conexion.php');

if ($_POST['tipo'] == 'mesas'){
    
    $ubicacion = $_POST['ubi'];
    $capacidad = $_POST['capa'];
    $disponibilidad = 'Libre';
    
    if (empty($ubicacion) || empty($capacidad)){
        echo "camposVacios";
    } else {
        // Definimos tanto la ruta de la carpeta como el nombre de la imagen recogida del form.
        $nombre_imagen = $_FILES['foto']['name'];
        $tamaño_imagen = $_FILES['foto']['size'] / 1000; // Tamaño en KB
        $tipo_imagen = $_FILES['foto']['type'];
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/www/PROYECTOS/PROYECTO_2/Projecte_02_Reserva_de_taules/img/uploads/';
        
        if (empty($_POST['idp'])){
            if (empty($nombre_imagen)){
                // Asignamos si no pone foto una predeterminada.
                $nombre_imagen = 'img-predeterminada.png';
        
                $query = $pdo->prepare("INSERT INTO tbl_mesa (id_mesa, ubicacion, capacidad, disponibilidad, foto_mesa) VALUES (null, :ubi, :capa, :dis, :foto_mesa)");
                $query->bindParam(":ubi", $ubicacion);
                $query->bindParam(":capa", $capacidad);
                $query->bindParam(":dis", $disponibilidad);
                $query->bindParam(":foto_mesa", $nombre_imagen);
                $query->execute();
                $pdo = null;
            } else {
                // Mover la imagen de la carpeta temporal a la carpeta de destino escogida anteriormente. 
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$nombre_imagen);
        
                $query = $pdo->prepare("INSERT INTO tbl_mesa (id_mesa, ubicacion, capacidad, disponibilidad, foto_mesa) VALUES (null, :ubi, :capa, :dis, :foto_mesa)");
                $query->bindParam(":ubi", $ubicacion);
                $query->bindParam(":capa", $capacidad);
                $query->bindParam(":dis", $disponibilidad);
                $query->bindParam(":foto_mesa", $nombre_imagen);
                $query->execute();
                $pdo = null;
            }
            echo "registrado";
        } else{
            $id = $_POST['idp'];
            if (empty($nombre_imagen)) {
                // Actualizar cuando no se selecione nada en la foto. Cambiara todo y dejará la foto igual.
                $query = $pdo->prepare("UPDATE tbl_mesa SET ubicacion = :ubi, capacidad = :capa WHERE id_mesa = :id");
                $query->bindParam(":ubi", $ubicacion);
                $query->bindParam(":capa", $capacidad);
                $query->bindParam(":id", $id);
                $query->execute();
                $pdo = null;
            } else {
                // Mover la imagen de la carpeta temporal a la carpeta de destino escogida anteriormente. 
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$nombre_imagen);
        
                // Actualizara todo y añadirá la nueva foto que hemos seleccionado.
                $query = $pdo->prepare("UPDATE tbl_mesa SET ubicacion = :ubi, capacidad = :capa, foto_mesa = :foto_mesa WHERE id_mesa = :id");
                $query->bindParam(":ubi", $ubicacion);
                $query->bindParam(":capa", $capacidad);
                $query->bindParam(":foto_mesa", $nombre_imagen);
                $query->bindParam(":id", $id);
                $query->execute();
                $pdo = null;
            }
            echo "modificado";
        } 
    } 
} else if ($_POST['tipo'] == 'camareros') {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $username = $_POST['username'];
    // Password por defecto cada vez que se cree un usuario nuevo:
    $password = '7110eda4d09e062aa5e4a390b0a572ac0d2c0220';

    // Mirar si el usuario que se crea esta ya existe en la BD.
    $query = $pdo->prepare("SELECT * FROM tbl_user WHERE username = :username;");
    $query->bindParam(":username", $username);
    $query->execute();
    $userRep = $query->fetchAll(PDO::FETCH_ASSOC);

    // COMPROBAR DNI:
    $letter = substr($dni, -1);
    $numbers = substr($dni, 0, -1);

    if (empty($nombre) || empty($apellidos) || empty($dni) || empty($username)) {
        echo "camposVacios";
    } else if (!(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8)) {
        echo "errorDni";
    } else {
        if (count($userRep) != 0) {
            echo "userRep";
        } else {
            if (empty($_POST['idp'])){
                $query = $pdo->prepare("INSERT INTO tbl_user (`id_user`, `nombre_user`, `apellido_user`, `dni`, `username`, `password`) VALUES (null, :nom, :ape, :dni, :user, :pass)");
                $query->bindParam(":nom", $nombre);
                $query->bindParam(":ape", $apellidos);
                $query->bindParam(":dni", $dni);
                $query->bindParam(":user", $username);
                $query->bindParam(":pass", $password);
                $query->execute();
                $pdo = null;
                echo "registrado";
            } else{
                $id = $_POST['idp'];
                $query = $pdo->prepare("UPDATE tbl_user SET nombre_user = :nom, apellido_user = :ape, dni = :dni, username = :user WHERE id_user = :id");
                $query->bindParam(":nom", $nombre);
                $query->bindParam(":ape", $apellidos);
                $query->bindParam(":dni", $dni);
                $query->bindParam(":user", $username);
                $query->bindParam(":id", $id);
                $query->execute();
                $pdo = null;
                echo "modificado";
            }
        }
    }
} else if ($_POST['tipo'] == 'mantenimiento') {

    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $username = $_POST['username'];
    // Password por defecto cada vez que se cree un usuario nuevo: 1234
    $password = '7110eda4d09e062aa5e4a390b0a572ac0d2c0220';

    // Mirar si el usuario que se crea esta ya existe en la BD.
    $query = $pdo->prepare("SELECT * FROM tbl_man WHERE username = :username;");
    $query->bindParam(":username", $username);
    $query->execute();
    $manRep = $query->fetchAll(PDO::FETCH_ASSOC);

    // COMPROBAR DNI:
    $letter = substr($dni, -1);
    $numbers = substr($dni, 0, -1);

    if (empty($nombre) || empty($dni) || empty($username)) {
        echo "camposVacios";
    } else if (!(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8)) {
        echo "errorDni";
    } else {
        if (count($manRep) != 0) {
            echo "userRep";
        } else {
            if (empty($_POST['idp'])){
                $query = $pdo->prepare("INSERT INTO tbl_man (`id_man`, `nombre_man`, `dni`, `username`, `password`) VALUES (null, :nom, :dni, :user, :pass)");
                $query->bindParam(":nom", $nombre);
                $query->bindParam(":dni", $dni);
                $query->bindParam(":user", $username);
                $query->bindParam(":pass", $password);
                $query->execute();
                $pdo = null;
                echo "registrado";
            } else{
                $id = $_POST['idp'];
                $query = $pdo->prepare("UPDATE tbl_man SET nombre_man = :nom, dni = :dni, username = :user WHERE id_man = :id");
                $query->bindParam(":nom", $nombre);
                $query->bindParam(":dni", $dni);
                $query->bindParam(":user", $username);
                $query->bindParam(":id", $id);
                $query->execute();
                $pdo = null;
                echo "modificado";
            }
        }
    }
}

