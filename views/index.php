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

    <title>Inicio - Circuitos Educativos</title>

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link href="../resources/css/navbar-style.css" rel="stylesheet">
    <link href="../resources/css/sidebar.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    <link href="../resources/css/responsive.css" rel="stylesheet">
    <link href="../resources/css/animate.css" rel="stylesheet">
    <link href="../resources/css/font-awesome.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">


</head>

<body>

    <?php include('includes/navbar.php');?>

            <div class="container">
                <div class="row">

                    <?php include('includes/sidebar.php'); ?>

                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <i class="fa fa-hand-o-right"></i> Bienvenido 
                                                    <?php
                                                      $circuito = $_SESSION['circuito'];
                                                      $colegio = $_SESSION['colegio'];
                                                        if($_SESSION['level']==0){
                                                          echo "Administrador del Sistema";
                                                        }elseif ($_SESSION['level']==1) {
                                                          $ncircuito = $_SESSION['ncircuito'];
                                                          echo "Facilitador del C.P.E ("; echo $ncircuito.")";
                                                        }elseif ($_SESSION['level']==2) {
                                                          $ncircuito = $_SESSION['ncircuito'];
                                                          $ncolegio = $_SESSION['ncolegio'];
                                                          echo "Directivo del Colegio ".$ncolegio." (C.P.E ".$ncircuito.")";
                                                        }
                                                    ?>
                        </div>
                
                <div class="panel-body">
                    
                   <?php 
                   if($_SESSION['level']==0){
                        include('includes/cardsadmin.php');
                    }elseif($_SESSION['level']==1){
                        include('includes/cardsfac.php');
                    }elseif($_SESSION['level']==2){
                        include('includes/cardsdir.php');
                    }?>

                </div>
            </div>
        </div>
    </div>
</div>

 <?php include 'includes/newuser.php'; ?>

    <script src="../resources/js/jquery-1.11.2.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/users.js"></script>
    
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