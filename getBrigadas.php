<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
// header('Access-Control-Allow-Origin: *');
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT brigadas.id, cargos.puesto as sub, brigadas.nombre, alcaldias.nombre as alcaldia, brigadas.ubicacion, CONCAT(colaboradores.nombre,' ',colaboradores.apellido_paterno,' ' , colaboradores.apellido_materno) as responsable, brigadas.fecha from brigadas left join cargo_alcaldia on brigadas.alcaldia=cargo_alcaldia.alcaldia left join cargos on cargos.id=cargo_alcaldia.cargo left join alcaldias on brigadas.alcaldia=alcaldias.id left join colaboradores on brigadas.responsable=colaboradores.id ORDER BY alcaldia, nombre");
$brigadas = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($brigadas);