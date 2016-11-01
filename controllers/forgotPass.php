<?php 
$bd = "sistema";
$server = "localhost";
$user = "root";
$password = "";

$conexion = @mysqli_connect($server,$user,$password,$bd);
if (!$conexion) die("Error de conexion chat ".mysqli_connect_error() );

$username = addslashes($_POST['username']); 

$sql = "SELECT pregunta_secreta FROM usuarios WHERE username = '$username'";
$result = mysqli_query($conexion, $sql);

$data = mysqli_fetch_assoc($result);
echo $data["pregunta_secreta"];

?>