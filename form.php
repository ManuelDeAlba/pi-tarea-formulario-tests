<?php
    require("conexion.php");

    if(!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["contrasena"])){
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];

        //? Sanitización de los datos

        //? Insertar en la DB
        // Se crea la sentencia SQL
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena) values ('$nombre', '$correo', '$contrasena');";

        // Ejecutamos la sentencia SQL
        $conn->exec($sql);

        // Redirecciona para ver los usuarios
        header("Location: usuarios.php");

        // echo "<h1 class='titulo'>Usuario registrado</h1>";
        
        // echo "<p>Nombre: $nombre</p>";
        // echo "<p>Correo: $correo</p>";
        // echo "<p>Contraseña: $contrasena</p><br>";
    } else {
        echo "Datos incompletos<br>";
    }
?>