<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["idPilares"])) {
    exit("No hay id del PILARES");
}
$idPilares = $_GET["idPilares"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("SELECT * FROM pilares where id = ?");
$sentencia->execute([$idPilares]);
$pilares = $sentencia->fetchObject();
echo json_encode($pilares);