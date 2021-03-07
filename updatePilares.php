<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jsonPilares = json_decode(file_get_contents("php://input"));
if (!$jsonPilares) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("UPDATE pilares SET nombre = ?, responsable = ?, alcaldia = ?, ubicacion = ?, estado = ?, fecha = ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonPilares->nombre, $jsonPilares->responsable, $jsonPilares->alcaldia, $jsonPilares->ubicacion, $jsonPilares->estado, $jsonPilares->fecha, $jsonPilares->id]);
echo json_encode($resultado);