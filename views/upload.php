<?php 
    session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
  {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">

    <title>Subir Archivo - Circuitos Educativos</title>

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link href="../resources/css/navbar-style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    <link href="../resources/css/sidebar.css" rel="stylesheet">
    <link href="../resources/css/responsive.css" rel="stylesheet">
    <link href="../resources/css/animate.css" rel="stylesheet">
    <link href="../resources/css/font-awesome.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
    <link href="../resources/css/cargando.css" rel="stylesheet">
</head>

<body>

  <?php include('includes/navbar.php'); ?>
               <div id="bloquea" name="bloquea" class="cargando" style="display:none;">
                  <img style="margin-left: 5%;margin-top: 10%" alt="Espere..." src="../resources/img/bar.gif"/>
               </div>
               <div class="container">
                <div class="row">
                  <?php include('includes/sidebar.php'); ?>
                <div class="col-lg-9">
                  <div class="panel panel-default">
                    <div class="panel-body">
                        <center><h2>Subir Archivo</h2></center>
                        <br>
                        <br>
                        <form id="formarch" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
             <div class="form-group">
               <label for="nombres" class="control-label col-xs-5">Nombre:</label>
               <div class="col-xs-5">
                  <input title="Puede contener letras y números. Sensible a mayúsculas. Mínimo 5 y máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombrea" name="nombrea" type="text" class="form-control" maxlength="25" placeholder="Ingrese nombre del archivo" onkeypress="narch(event)" onkeyup="validarupload();" onchange="validarupload();" onclick="validarupload();"  onpaste="validarupload();" required>
               </div>
             </div>
             <div class="form-group">
               <label for="nombres" class="control-label col-xs-5">Descripción:</label>
               <div class="col-xs-5">
                  <input title="Puede contener letras y números. Sensible a mayúsculas. Mínimo 5 y máximo 45 caracteres" data-toggle="tooltip" data-placement="top" id="descripciona" name="descripciona" type="text" class="form-control" maxlength="45" placeholder="Ingrese una descripción" onkeypress="narch(event)"onkeyup="validarupload();" onclick="validarupload();" onchange="validarupload();" required>
               </div>
             </div>
                          <center><div id="falseFile" style="display:none; color:#ED0C0C;"><span class="glyphicon glyphicon-remove"></span><span> ¡Archivo demasiado grande! Seleccione otro</span></div></center>
             <div class="form-group">
                <div class="col-xs-4"></div>
                <div class="col-xs-4">
                   <input title="No puede ser mayor a 20 MB" data-toggle="tooltip" data-placement="bottom" align="center" id="archivo" name="archivo" type="file" class="btn btn-default btn-file" onkeyup="validarupload();" onclick="validarupload();" onchange="validarupload();" required>
                </div>
             </div>
          </div>
          <div class="modal-footer">  
        <button type="reset" class="btn btn-danger" onclick="volver();">Regresar</button>
        <button id="subo" name="subo" type="submit" class="btn btn-success" onclick="bloquear()" disabled="true">Subir</button>
      </div>
        </form>
      </center>
      </form>
       </div>
      </div>
      </div>
    </div>
    </div>
    

    <script src="../resources/js/jquery-1.11.2.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/users.js"></script>
    <script src="../resources/js/validar.js"></script>
    
    <script>
        function cerrar(){
            $.ajax({
                url:'../controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                window.location.href = "../index.php";
            });
        }
        function volver(){
            location.href=("documents.php");
        }
        function bloquear(){
            $('#bloquea').show();
        }
    </script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script>
     $("#sider-menu a").hover(
            function() {
              $(this).find("i").addClass("animated rubberBand");
            }, function() {
              $(this).find("i").removeClass("animated rubberBand");
            }
          );

          $(".showmenu").on("click", function(event) {
            event.preventDefault();

              if ($(this).hasClass("fa-angle-down")){
                   $(this).removeClass("fa-angle-down");
                   $(this).addClass("fa-angle-up");
                   $("#sider-menu").fadeIn();

              }else{

                  $(this).removeClass("fa-angle-up");
                  $(this).addClass("fa-angle-down");
                  $("#sider-menu").fadeOut();
            
              }

          });
    </script>

</body>

</html>
<?php

  }
  else
  {
    header("location: ../");
  }
 ?>

<?php
  date_default_timezone_set('America/Caracas');
	function get_extension($nombre){
      if(strpos($nombre,".")){
        return end(explode(".", $nombre));
      }else{
        return "";
      }
    }
  if(isset($_POST['subo'])){
    $date = date('Y-m-d h:i:s a',time()+1800);
		$nombre = $_POST['nombrea'];
    $descripcion = $_POST['descripciona'];
    $extension = get_extension($_FILES['archivo']['name']);
		require_once('../models/conexion.php');
		$conexion= new conexion();
		$conexion->conectar();
		$sql = "INSERT INTO documento VALUES(0,'".$nombre."','".$descripcion."','".$extension."','".$date."',".$_SESSION['id'].")";
		if($conexion->conexion->query($sql)){
      $sql2 = "SELECT d.id_documento FROM documento d WHERE d.nombre_documento='".$nombre."' ORDER BY fecha DESC";
      $resultado =$conexion->conexion->query($sql2);
      $id='';
      while ($re=$resultado->fetch_array(MYSQL_NUM)) {
         $id = $re[0];
         break;
      }
      if(move_uploaded_file($_FILES['archivo']['tmp_name'], dirname(__FILE__)."/archivo/".$id)){
        echo "<script>";
        echo 'alert("El archivo ha sido añadido con exito");';
        echo 'location.href=("documents.php");';
        echo "</script>";
      }else{
        $sql3 = "DELETE FROM documento WHERE id_documento='".$id."'";
        $conexion->conexion->query($sql3);
        echo "<script>";
        echo 'alert("Error al añadir archivo");';
        echo "</script>";
      }
		}
		$conexion->cerrar();
	}
?> 	