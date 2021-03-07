<?php
$password = "";
$user = "root";
$bd_name = "sistema";
try {
    return new PDO('mysql:host=localhost;dbname=' . $bd_name, $user, $password);
    echo "hola";
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}