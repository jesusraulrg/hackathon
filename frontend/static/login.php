<?php
$correo = $_POST['correo'];
$password = $_POST['password'];

$conexion = new mysqli('', '', '', '');

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Iniciar sesión
} else {
    echo "Correo o contraseña incorrectos";
}

$conexion->close();
?>