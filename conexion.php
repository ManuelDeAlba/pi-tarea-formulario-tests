<?php
    //! Credenciales
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "formulario";

    //! Conexión
    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
    }
?>