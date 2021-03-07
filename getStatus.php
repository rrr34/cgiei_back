<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
// header('Access-Control-Allow-Origin: *');
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT * from status");
$pilares = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($pilares);