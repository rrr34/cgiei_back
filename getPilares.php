<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
// header('Access-Control-Allow-Origin: *');
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT pilares.id, cargos.puesto as sub, pilares.nombre, alcaldias.nombre as alcaldia, pilares.ubicacion, CONCAT(colaboradores.nombre,' ',colaboradores.apellido_paterno,' ' , colaboradores.apellido_materno) as responsable, status.estado, pilares.fecha from pilares left join cargo_alcaldia on pilares.alcaldia=cargo_alcaldia.alcaldia left join cargos on cargos.id=cargo_alcaldia.cargo left join alcaldias on pilares.alcaldia=alcaldias.id left join colaboradores on pilares.responsable=colaboradores.id left join status on pilares.estado=status.id ORDER BY alcaldia, nombre");
$pilares = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($pilares);