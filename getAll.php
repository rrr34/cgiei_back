<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT area.puesto as area, sup.puesto as jefe, car.puesto, alc.nombre as alcaldia,CONCAT(col.nombre, ' ', col.apellido_paterno, ' ', col.apellido_materno) AS nombre, col.sexo, col.id FROM colaboradores as col LEFT JOIN cargos as car on col.cargo       =car.id LEFT JOIN cargos as sup on car.superior    =sup.id LEFT JOIN alcaldias as alc on col.alcaldia =alc.id
inner join cargos as area on car.area =area.id where col.id=3");
// -- order by area.id,sup.id,car.id
$mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($mascotas);