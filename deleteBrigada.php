<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: DELETE");
$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    exit("Solo se permite método DELETE");
}

if (empty($_GET["idBrigada"])) {
    exit("No hay id de brigada para eliminar");
}
$idBrigada = $_GET["idBrigada"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("DELETE FROM brigadas WHERE id = ?");
$resultado = $sentencia->execute([$idBrigada]);
echo json_encode($resultado);