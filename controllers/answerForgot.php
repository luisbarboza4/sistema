<?php 
$bd = "sistema";
$server = "localhost";
$user = "root";
$password = "";

require_once('../models/conexion.php');
		$conexion= new conexion();
		$conexion->conectar();

$conexion = @mysqli_connect($server,$user,$password,$bd);
if (!$conexion) die("Error de conexion chat ".mysqli_connect_error() );

$answer = addslashes($_POST['answer']);
$username = addslashes($_POST['username']);

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND respuesta_secreta='$answer'";
$resulta = mysqli_query($conexion, $sql);

if($re=$resulta->fetch_array(MYSQL_NUM)>0) {
	echo "exito";
}else{
	echo "noexito";
}

?>