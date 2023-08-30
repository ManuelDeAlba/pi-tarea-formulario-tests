<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor">
        <a class="boton" href='/'>Inicio</a>
        <h1 class="titulo">Usuarios registrados</h1>
        <?php
            require("conexion.php");
    
            // Vemos los datos
            $sql = "SELECT * FROM usuarios;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            // Configura los resultados como un arreglo asociativo
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        ?>
        <div class="usuarios">
            <?php
                // $stmt->fetchAll() Obtiene el arreglo asociativo
                foreach ($stmt->fetchAll() as $row) {
                    echo "<div class='usuario'>";
                    echo "<p><b>ID:</b> " . $row["id"] . "</p>";
                    echo "<p><b>Nombre:</b> " . $row["nombre"] . "</p>";
                    echo "<p><b>Correo:</b> " . $row["correo"] . "</p>";
                    echo "<p><b>Contrasena:</b> " . $row["contrasena"] . "</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>