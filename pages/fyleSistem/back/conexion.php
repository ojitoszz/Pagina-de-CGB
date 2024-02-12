<?php 	
function conectar(){ 
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "file_system";

	$conec = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	return $conec;
}
 ?>