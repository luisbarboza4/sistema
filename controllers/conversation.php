<?php 
$bd = "sistema";
$server = "localhost";
$user = "root";
$password = "";

$conexion = @mysqli_connect($server,$user,$password,$bd);
if (!$conexion) die("Error de conexion chat ".mysqli_connect_error() );

$circuito = $_POST['id_circuito'];

$sql = "SELECT username, mensaje, time FROM conversation WHERE id_circuito='".$circuito."' ORDER BY id_conversation ASC;";
$result = mysqli_query($conexion, $sql);

while ($data = mysqli_fetch_assoc($result)){
	echo "<p><b>".$data["username"]."</b>: ".$data["mensaje"];
	echo "<span style=float:right>".$data["time"]."</span><br></p>";
}

?>