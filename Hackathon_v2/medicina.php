<?php

    $conexion = mysqli_connect("localhost", "root", "", "dbhackathon");

    // echo $nombre_completo;

    $idm = htmlspecialchars($_POST["idm"]);
    $detalle = htmlspecialchars($_POST["detalle"]);

    $insertar = "INSERT INTO medicamento (idm, detalle)
    VALUES ('$idm', '$detalle')";

    mysqli_set_charset($conectar, "utf8");
    $insertar = "INSERT INTO medicamento (idm, detalle)
    VALUES ('$idm', '$detalle')";

    if ($resultado = mysqli_query($conectar, $insertar))
    {
        header("location: medicina.html");
    }
    else
    {
        printf("ERROR - Al amacenar en la BD");
    }
    mysqli_close($conectar);
?>