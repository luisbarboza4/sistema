<?php 
    session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
  {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto - Circuitos Educativos</title>
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/navbar-style.css" >
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    <link href="../resources/css/sidebar.css" rel="stylesheet">
    <link href="../resources/css/responsive.css" rel="stylesheet">
    <link href="../resources/css/animate.css" rel="stylesheet">
    <link href="../resources/css/font-awesome.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">
</head>

<body>
  <?php include('includes/navbar.php'); ?>

        <div class="container">
          <div class="row">
            <?php include('includes/sidebar.php'); ?>
              <div class="col-lg-9">
                  <div class="panel panel-default">
                        <div class="panel-heading"><strong><center>Opciones de Contacto</strong></center>
                        </div>
                    <div class="panel-body">
                        <center><h4>Si el sistema de gestión presenta algún incoveniente o usted posee alguna duda, favor contactarse a:</h4></center>
                        <br>
                        <h4><strong><span class="glyphicon glyphicon-earphone"></span> Teléfonos: </strong>+58-4145890704 | +58-4126634553 | +58-4268001773</h4>
                        <br>
                        <h4><strong><span class="glyphicon glyphicon-envelope"></span> Correo: </strong>supervisioncpeteg@gmail.com</h4>
                        <br>
                        <center><h5>Trabajo Especial de Grado para optar por el título de Ingeniería en Informática. URBE. 2016.</h5></center>
                        <center><h5><strong>Autores: </strong>Barboza, Medina y Ortiz.</h5></center>
                    </div>

                  </div>
                </div> 
              </div> 
            </div>

          <script src="../resources/js/jquery-1.11.2.js"></script>
          <script src="../resources/js/bootstrap.min.js"></script> 
    
    <script>
       function cerrar()
        {
            $.ajax({
                url:'../controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                window.location.href = "../index.php";
            });
        }
        function upload(){
          location.href="upload.php";
        }
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