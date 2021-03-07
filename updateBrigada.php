<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jsonBrigada = json_decode(file_get_contents("php://input"));
if (!$jsonBrigada) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("UPDATE brigadas SET nombre = ?, responsable = ?, alcaldia = ?, ubicacion = ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonBrigada->nombre, $jsonBrigada->responsable, $jsonBrigada->alcaldia, $jsonBrigada->ubicacion, $jsonBrigada->id]);
echo json_encode($resultado);