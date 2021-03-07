<?php

try {
    $con = new PDO('mysql:host=127.0.0.1;dbname=sistema','root','');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "ya chingamos <br>";
    echo "<br>";

    $user_data = $con->query("
    SELECT * FROM colaboradores WHERE id = 1")->fetch(PDO::FETCH_OBJ);

    echo $user_data->nombre;
    echo "<br>";

    print("Eeeeeel paso del gigante!!!");
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    echo "<br><br>";
    die("valio berta x(");
}

// $drivers = PDO::getAvailableDrivers();

// var_dump($drivers);

// phpinfo();

// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=sistema", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
