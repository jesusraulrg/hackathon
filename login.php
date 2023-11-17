<!DOCTYPE html>
<html lang="en">
<head>
    <title>INICIAR SESION</title>
</head>
<body>
    <?php
    ob_start();
    try
    
    {
      
        session_start();
        
        
            $usuario= $_POST ["usuario"];
            $password= $_POST ["password"];
           
             $_SESSION['matricula']=$usuario;
            
            MD5($password);

            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "agendautec";
            $bd_port = "3306";    
            $conMySQL = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);
            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            $pass = MD5($password);
            mysqli_set_charset($conMySQL, "utf8");
            $sentenciaSQL = "SELECT * FROM alumnos_inscritos WHERE matricula = '$usuario' AND passwd = '$pass'";
         
            $log=htmlspecialchars(addslashes($usuario));
            $pas=htmlspecialchars(addslashes($password));
       
            $result = mysqli_query($conMySQL,$sentenciaSQL);

      
            if ($result->num_rows > 0){


                if($pass){
                    header("location:contraseña.php");
                }
                else{
                    header("Location:agenda.php");

                }
                
              
            }
            else
            {
                print '<script language="JavaScript">';
                print 'alert("Usuario o contraseña incorrecta");';
                print '</script>';

                require('inicio.html');
            }
    }
    catch(Exception $e)
    {
        die("Error: ". $e->getMessage());
    }
    finally
    { 
        $conMySQL=null; 
    }
    ?>
</body>
</html>