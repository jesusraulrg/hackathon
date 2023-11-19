<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Información</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #cbe6d4; /* Verde claro */
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            color: #004080; /* Azul marino */
            margin-top: 20px;
        }

        p {
            color: #4CAF50; /* Verde */
            margin-bottom: 20px;
        }

        .results-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff; /* Blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: #ff0000; /* Rojo */
        }

        .logo-container {
            margin-top: 20px;
            text-align: center;
        }

        .logo {
            max-width: 100%; /* Ajusta el tamaño máximo del logo según el ancho del contenedor */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "dbhackathon");

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        $idm = isset($_POST['idm']) ? mysqli_real_escape_string($conexion, $_POST['idm']) : '';
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';
        $id_lab = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : '';

        // Búsqueda en la tabla "medicamentos"
        $sql_medicamentos = "SELECT * FROM medicamentos WHERE idm = '$idm'";
        $result_medicamentos = $conexion->query($sql_medicamentos);

        if (!$result_medicamentos) {
            echo "<p class='error-message'>Error en la consulta de medicamentos: " . mysqli_error($conexion) . "</p>";
        } else {
            if ($result_medicamentos->num_rows > 0) {
                echo "<h2>Resultados de la búsqueda de medicamentos:</h2>";
                while ($row = $result_medicamentos->fetch_assoc()) {
                    echo "<p>IDM del medicamento: " . $row['idm'] . "<br>Descripción: " . $row['detalle'] .  "</p>";
                }

                // Realizar la eliminación del producto después de mostrar los resultados
                $sql_eliminar = "DELETE FROM medicamentos WHERE idm = '$idm'";
                $resultado_eliminar = $conexion->query($sql_eliminar);

                if ($resultado_eliminar) {
                    echo "<p>El producto con idm $idm ha sido eliminado.</p>";
                } else {
                    echo "<p class='error-message'>Error al intentar eliminar el producto: " . mysqli_error($conexion) . "</p>";
                }
            } else {
                echo "<p>No se encontraron resultados para el idm $idm.</p>";
            }
        }

        // Búsqueda en la tabla "laboratorio" utilizando el "nombre"
        $sql_laboratorio_id = "SELECT * FROM laboratorio WHERE nombre = '$id_lab'";
        $result_laboratorio_id = $conexion->query($sql_laboratorio_id);

        if (!$result_laboratorio_id) {
            echo "<p class='error-message'>Error en la consulta de laboratorio por nombre: " . mysqli_error($conexion) . "</p>";
        } else {
            if ($result_laboratorio_id->num_rows > 0) {
                echo "<h2>Resultados de la búsqueda de laboratorios por nombre:</h2>";
                while ($row_lab_id = $result_laboratorio_id->fetch_assoc()) {
                    echo "<p>Número de SEDE: " . $row_lab_id['num_sede'] . "<br>Nombre: " . $row_lab_id['nombre'] . "<br>Certificación: " . $row_lab_id['certificacion'] . "<br>Municipio: " . $row_lab_id['municipio'] . "<br>Estado: " . $row_lab_id['estado'] . "<br>Código Postal: " . $row_lab_id['cp'] . "</p>";
                }
            } else {
                echo "<p>No se encontraron resultados para el nombre $id_lab.</p>";
            }
        }

        $conexion->close();
        ?>
    </div>

    <!-- Logo debajo de los resultados -->
    <div class="logo-container">
        <img src="logo.png" alt="Logo" class="logo">
    </div>
</body>
</html>
