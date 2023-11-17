<?php
$conexion = mysqli_connect("localhost", "root", "", "dbhackathon");

// Verifica la conexión
if (mysqli_connect_errno()) {
    printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
    exit();
}

$num_sede = htmlspecialchars($_POST["num_sede"]);
$nombre = htmlspecialchars($_POST["empresa"]);
$certificacion = htmlspecialchars($_POST["certificacion"]);
$numeroext = htmlspecialchars($_POST["numeroext"]);
$calle = htmlspecialchars($_POST["calle"]);
$colonia = htmlspecialchars($_POST["colonia"]);
$municipio = htmlspecialchars($_POST["municipio"]);
$cp = htmlspecialchars($_POST["cp"]);
$estado = htmlspecialchars($_POST["estado"]);

$insertar = "INSERT INTO laboratorio (num_sede, nombre, certificacion, numeroext, calle, colonia, municipio, cp, estado)
             VALUES ('$num_sede', '$nombre', '$certificacion', '$numeroext', '$calle', '$colonia', '$municipio', '$cp', '$estado')";

if ($resultado = mysqli_query($conexion, $insertar)) {
    header("location: laboratorio.html");
} else {
    printf("ERROR - Al almacenar en la BD: %s", mysqli_error($conexion));
}

mysqli_close($conexion);
?>

