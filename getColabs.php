<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
// header('Access-Control-Allow-Origin: *');
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT 
area.puesto area, sup.puesto jefe, car.puesto, alc.nombre alcaldia, 
CONCAT(col.nombre,' ',col.apellido_paterno,' ',col.apellido_materno) AS nombre, col.sexo, col.id FROM colaboradores col 
LEFT JOIN cargos car ON col.cargo=car.id LEFT JOIN cargos sup ON car.superior=sup.id LEFT JOIN alcaldias alc ON col.alcaldia=alc.id INNER JOIN cargos area ON car.area=area.id ORDER BY area.id, sup.id, car.id
");
$colaboradores = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($colaboradores);