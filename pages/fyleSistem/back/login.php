
<?php
include("conexion.php");
session_start();
$conexion=conectar();


$usuario = $_POST['email'];
$contrasena = $_POST['password'];


	$peticion = "SELECT * FROM usuarios WHERE Nombre_Usuario = '".$usuario."' AND contrasena = '".$contrasena."'";
	$resultado = mysqli_query($conexion, $peticion);
 	 

if(mysqli_num_rows($resultado) > 0 ){
    $_SESSION['usuario'] = $usuario;
	echo "<script>window.location='../home.php'</script>";
	

 }else{	
echo "<script type=\"text/javascript\">alert(\"Contraseña incorrecta\");</script>";
echo "<script>window.location='login.html'</script>";
  }

?>