<?php
        try {   
                    
// echo $correo; 
// echo $password;

            // setcookie("correo", "correo@hola.com", time() + 423000); 
            
            $conexion = mysqli_connect("localhost", "root", "", "dbhackathon");

            $conMySQL->setAttribute(PDO :: ATTR_ERRMODE,PDO :: ERRMODE_EXCEPTION);
            $conMySQL->exec("SET CHARACTER SET UTF8");
            $sentenciaSQL="SELECT * FROM laboratorio WHERE correo=:correo AND contra=:contra";

            $sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
            
            $correo=htmlspecialchars(addslashes($_POST["correo"]));
            $contra=htmlspecialchars(addslashes($_POST["contra"]));

            $sentenciaPrep->execute(array(":correo"=>$correo,":contra"=>$contra));
  
            $numRegistros = $sentenciaPrep->rowCount();
            echo $numRegistros;
 
            if($numRegistros !=0)
            {
                session_start();
                $_SESSION["correo"]=$_POST["correo"];
                header("Location:laboratorio.html");
                printf("error");
            }
            else
            {

                header("Location:inicio.html");
            }
        }
        catch(Exception$e)
        {

            die("Error:".$e->getMessage());

        }
        finally{$conMySQL=null;}
?>