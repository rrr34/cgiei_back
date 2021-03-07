<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["idBrigada"])) {
    exit("No hay id del PILARES");
}
$idBrigada = $_GET["idBrigada"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("SELECT * FROM brigadas where id = ?");
$sentencia->execute([$idBrigada]);
$brigada = $sentencia->fetchObject();
echo json_encode($brigada);