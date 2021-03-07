<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: DELETE");
$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    exit("Solo se permite método DELETE");
}

if (empty($_GET["idPilares"])) {
    exit("No hay id de PILARES para eliminar");
}
$idPilares = $_GET["idPilares"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("DELETE FROM pilares WHERE id = ?");
$resultado = $sentencia->execute([$idPilares]);
echo json_encode($resultado);