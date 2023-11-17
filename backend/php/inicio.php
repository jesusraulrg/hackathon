<?php
        try {   
                    
// echo $usuario; 
// echo $password;

            // setcookie("usuario", "usuario@hola.com", time() + 423000); 
            
            $conMySQL = new PDO("mysql:host=localhost;port=3306;dbname=hever","root","");

            $conMySQL->setAttribute(PDO :: ATTR_ERRMODE,PDO :: ERRMODE_EXCEPTION);
            $conMySQL->exec("SET CHARACTER SET UTF8");
            $sentenciaSQL="SELECT * FROM laboratorio WHERE correo=:correo AND password=:password";

            $sentenciaPrep = $conMySQL->prepare($sentenciaSQL);
            
            $correo=htmlspecialchars(addslashes($_POST["correo"]));
            $password=htmlspecialchars(addslashes($_POST["password"]));

            $sentenciaPrep->execute(array(":correo"=>$correo,":password"=>$password));
  
            $numRegistros = $sentenciaPrep->rowCount();
            echo $numRegistros;
 
            if($numRegistros !=0)
            {
                session_start();
                $_SESSION["correo"]=$_POST["correo"];
                header("Location:medicina.html");
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