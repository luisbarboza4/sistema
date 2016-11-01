<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
  {
 $level= $_SESSION['level'];
 //incluimos nuestro archivo config
    include '../controllers/config.php'; 

    // Incluimos nuestro archivo de funciones
    include '../controllers/funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM eventos WHERE id = $id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    //tipo
    $tipo=$row['class'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

    $circuito=$row['id_circuito'];
    if(isset($circuito)){
      $bd2 = $conexion->query("SELECT * FROM circuito WHERE id_circuito = $circuito");
      $row2 = $bd2->fetch_assoc();
      $nombcir=$row2['nombre_circuito'];
    }

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        $hidediv = "hide";
        echo "<center><h4>Evento eliminado</h4></center>";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../resources/css/calendar.css" rel="stylesheet">
        <link href="../resources/css/font-awesome.min.css" rel="stylesheet">
        <link href="../resources/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <script src="../esources/js/es-ES.js"></script>
        <script src="../resources/js/jquery.min.js"></script>
        <script src="../resources/js/moment.js"></script>
        <script src="../resources/js/bootstrap.min.js"></script>
        <script src="../resources/js/bootstrap-datetimepicker.js"></script>
        <script src="../resources/js/bootstrap-datetimepicker.es.js"></script>
</head>
<body>
<div id="descrip_evento" class="<?php echo $hidediv ?>"> 
	 <?php
    if(isset($circuito)){
      echo"<center><h3>".$titulo." - ".$nombcir."</h3></center>";
    }else{
      echo"<center><h3>".$titulo." - Administrador</h3></center>";
    }
   ?>
	 <hr>
     <center><h4><?=$evento?></h4></center>
     <center>
     <br>
     <b>Comienza el: </b> <?=$inicio?>
     &nbsp &nbsp &nbsp
     <b>Termina el: </b> <?=$final?>
     </center>

</body>
<form action="" method="post">
    <br><br>
    <?php
    if($level==1&&$circuito!=null){
        echo "<center><button type=\"submit\" class=\"btn btn-danger\" name=\"eliminar_evento\">Eliminar Evento</button></center>";
     }
     if($level==0){
        echo "<center><button type=\"submit\" class=\"btn btn-danger\" name=\"eliminar_evento\">Eliminar Evento</button></center>";
     }
     ?>     
</form>
</div>
</html>
<?php
 }
  else
  {
    header("location: ../");
  }
 ?>