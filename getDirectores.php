<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "bd.php";
$sentencia = $bd->query("SELECT id, CONCAT(nombre,' ',apellido_paterno,' ' , apellido_materno) as director from colaboradores where cargo in (select id from cargos where puesto like 'Líder%') ORDER BY director");
$directores = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($directores);

// try{
//     $consulta=$this->db->connect()->prepare("SELECT id, CONCAT(nombre,' ',apellido_paterno,' ' , apellido_materno) as director from colaboradores");
//     $consulta->execute();
//     return $consulta->fetchAll(PDO::FETCH_OBJ);
// }catch(PDOException $e){
//     $controller->mensaje.=$e->getMessage();
//     return false;
// }