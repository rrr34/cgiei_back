<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonBrigada = json_decode(file_get_contents("php://input"));
if (!$jsonBrigada) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("insert into brigadas(nombre, responsable, alcaldia, ubicacion) values (?,?,?,?)");
$resultado = $sentencia->execute([$jsonBrigada->nombre, $jsonBrigada->responsable, $jsonBrigada->alcaldia, $jsonBrigada->ubicacion]);
echo json_encode([
    "resultado" => $resultado,
]);