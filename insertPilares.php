<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonPilar = json_decode(file_get_contents("php://input"));
if (!$jsonPilar) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("insert into pilares(nombre, responsable, alcaldia, ubicacion, estado) values (?,?,?,?,?)");
$resultado = $sentencia->execute([$jsonPilar->nombre, $jsonPilar->responsable, $jsonPilar->alcaldia, $jsonPilar->ubicacion, $jsonPilar->estado]);
echo json_encode([
    "resultado" => $resultado,
]);