<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT * FROM niveles_educativos");
$estudios = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($estudios);