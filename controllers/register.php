<?php
$bd = "sistema";
$server = "localhost";
$user = "root";
$password = "";

$conexion = @mysqli_connect($server,$user,$password,$bd);
if (!$conexion) die("Error de conexion chat ".mysqli_connect_error() );

$username = $_POST['username'];
$message = $_POST['message'];
$circuito = $_POST['id_circuito'];

$sql = "INSERT INTO conversation (username, mensaje, id_circuito) VALUES ('$username','$message','$circuito')";
$result = mysqli_query($conexion, $sql);

if(!$result){
	echo "Error";
}
?>