<?php

require_once '../config/conexion.php';

// Recoger datos de la reserva online:
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$personas = $_POST['personas'];
$ubicacion = $_POST['ubicacion'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];

// Primero hay que comprobar que haya una mesa disponible con esos datos que quiere el usuario:
$query = $pdo->prepare("SELECT id_mesa FROM `tbl_mesa` INNER JOIN `tbl_reserva` ON tbl_mesa.id_mesa = tbl_reserva.id_mesa");

$query = $pdo->prepare("INSERT INTO `tbl_reserva`(`id_reserva`, `nom_persona`, `apellido_persona`, `telefono_persona`, `ocupacion_res`, `hora_inici`, `hora_fi`, `duracion`, `tipo_reserva`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')");
$query->bindParam(":nombre", $nombre);
$query->bindParam(":apellidos", $apellidos);
$query->bindParam(":telefono", $telefono);
$query->bindParam(":personas", $personas);
$query->bindParam(":ubicacion", $ubicacion);
$query->bindParam(":dia", $dia);
$query->bindParam(":hora", $hora);
$query->execute();


