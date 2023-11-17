<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Información</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6f7ff; /* Azul claro */
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            color: #0066cc; /* Azul oscuro */
        }

        p {
            color: #009933; /* Verde */
        }
    </style>
</head>
<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "hackathon");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $sku = isset($_POST['idm']) ? mysqli_real_escape_string($conexion, $_POST['idm']) : '';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';

    $sql_medicamentos = "SELECT * FROM medicamentos WHERE IDM = '$sku'";
    $result_medicamentos = $conexion->query($sql_medicamentos);

    if (!$result_medicamentos) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if ($result_medicamentos->num_rows > 0) {
        echo "<h2 style='color: #0066cc;'>Resultados de la búsqueda de medicamentos:</h2>";
        while ($row = $result_medicamentos->fetch_assoc()) {
            echo "<p style='color: #009933;'>ID del medicamento: " . $row['id_medicamento'] . "<br>Nombre: " . $row['nombre_medicamento'] . "<br>Descripción: " . $row['detalles'] . "<br>IDM: " . $row['IDM'] . "</p>";
        }
    } else {
        echo "<p style='color: #ff0000;'>No se encontraron resultados para el IDM $sku.</p>";
    }

    $sql_laboratorios = "SELECT * FROM laboratorios WHERE nombre = '$nombre'";
    $result_laboratorios = $conexion->query($sql_laboratorios);

    if (!$result_laboratorios) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if ($result_laboratorios->num_rows > 0) {
        echo "<h2 style='color: #0066cc;'>Resultados de la búsqueda de laboratorios:</h2>";
        while ($row = $result_laboratorios->fetch_assoc()) {
            echo "<p style='color: #009933;'>ID de Laboratorio: " . $row['id_laboratorio'] . "<br>Nombre: " . $row['nombre'] . "<br>Correo: " . $row['correo'] . "</p>";
        }
    } else {
        echo "<p style='color: #ff0000;'>No se encontraron resultados para el nombre $nombre.</p>";
    }

    $conexion->close();
    ?>
</body>
</html>
