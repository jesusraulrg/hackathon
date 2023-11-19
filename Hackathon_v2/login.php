<?php

$conexion = mysqli_connect("localhost", "root", "", "dbhackathon");

// Check if 'correo' and 'contra' are set in the $_POST array
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$contra = isset($_POST['contra']) ? $_POST['contra'] : '';

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contra = '$contra'";

try {
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // Iniciar sesión
        echo "Login successful";
    } else {
        echo "Correo o contraseña incorrectos";
    }
} catch (mysqli_sql_exception $e) {
    // Handle database exception
    echo "error: " . $e->getMessage();
}

$conexion->close();
?>
