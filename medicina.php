<?php

    $bd_host = "127.0.0.1";
    $bd_user = "root";
    $bd_pass = "";
    $bd_name = "hever";

    // echo $nombre_completo;

    $idm = htmlspecialchars($_POST["idm"]);
    $detalle = htmlspecialchars($_POST["detalle"]);

    $insertar = "INSERT INTO medicamento (idm, detalle)
    VALUES ('$idm', '$detalle')";
    
    $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);

    if (mysqli_connect_errno())
    {
        printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
        exit();
    }

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