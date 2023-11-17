<?php

    $bd_host = "127.0.0.1";
    $bd_user = "root";
    $bd_pass = "";
    $bd_name = "hever";

    // echo $nombre_completo;

    $num_sede = htmlspecialchars($_POST["sede"]);
    $nombre = htmlspecialchars($_POST["empresa"]);
    $certificacion = htmlspecialchars($_POST["certificacion"]);
    $numeroext = htmlspecialchars($_POST["numeroext"]);
    $calle = htmlspecialchars($_POST["calle"]);
    $colonia = htmlspecialchars($_POST["colonia"]);
    $municipio = htmlspecialchars($_POST["municipio"]);
    $cp = htmlspecialchars($_POST["cp"]);
    $estado = htmlspecialchars($_POST["estado"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $password = htmlspecialchars($_POST["password"]);

    $insertar = "INSERT INTO laboratorio (num_sede, nombre, certificacion, numeroext, calle, colonia, municipio,cp,estado,correo,password)
    VALUES ('$num_sede', '$nombre', '$certificacion', '$numeroext','$calle','$colonia','$municipio','$cp','$estado','$correo','$password')";
    
    $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);

    if (mysqli_connect_errno())
    {
        printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
        exit();
    }

    mysqli_set_charset($conectar, "utf8");
    $insertar = "INSERT INTO laboratorio (num_sede, nombre, certificacion, numeroext, calle, colonia, municipio,cp,estado,correo,password)
    VALUES ('$num_sede', '$nombre', '$certificacion', '$numeroext','$calle','$colonia','$municipio','$cp','$estado','$correo','$password')";

    if ($resultado = mysqli_query($conectar, $insertar))
    {
        header("location: login.html");
    }
    else
    {
        printf("ERROR - Al amacenar en la BD");
    }
    mysqli_close($conectar);
?>