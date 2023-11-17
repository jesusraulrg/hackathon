<?php

session_start();
if(isset($_SESSION['nombredelusuario']))
{
	header('location: Viviendas.php');
}

if(isset($_POST['btniniciar']))
{
	
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="esmia_admin";
	
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$conn)
	{
		die("No hay conexión: ".mysqli_connect_error());
	}
	
	$nombre=$_POST['usuario'];
	$pass=$_POST['password'];
	$passmd5=MD5($pass);
	
	$query=mysqli_query($conn,"Select * from usuarios where usuario = '".$nombre."' and pass = '".$passmd5."'");
	$nr=mysqli_num_rows($query);
	
	if(!isset($_SESSION['nombredelusuario']))
	{
	if($nr == 1)
	{
		$_SESSION['nombredelusuario']=$nombre;
		header("location: Viviendas.php");
	}
	else if ($nr == 0)
	{
		// echo "<script>alert('Usuario no existe');window.location= 'index.php' </script>";
        header("Location: ../Login.html?error=1");
        exit;
	}
	}
}

?>