<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
// header('Access-Control-Allow-Origin: *');

// header('Access-Control-Allow-Methods: GET, POST');

// header("Access-Control-Allow-Headers: X-Requested-With");
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT * FROM alcaldias ORDER BY nombre");
$alcaldias = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($alcaldias);