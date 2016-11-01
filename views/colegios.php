<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES' && $_SESSION['level'] == 1) 
  {
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegios - Circuitos Educativos</title>
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../resources/css/styleusers.css">
    <link href="../resources/css/navbar-style.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    <link href="../resources/css/sidebar.css" rel="stylesheet">
    <link href="../resources/css/responsive.css" rel="stylesheet">
    <link href="../resources/css/animate.css" rel="stylesheet">
    <link href="../resources/css/font-awesome.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet">

</head>

<body onload="busc('')">

<?php include('includes/navbar.php'); ?>

            <div class="container">
                <div class="row">
                    <?php include('includes/sidebar.php'); ?>
                <div class="col-lg-9">
                <div class="form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><center><strong>Colegios del Circuito <?php echo $_SESSION['ncircuito'];?></strong></center></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="hidden" name="circuito" id="circuito" value="<?php echo $_SESSION['circuito']; ?>">
                                <div class="col-xs-3  text-right">
                                    <label for="buscar" class="control-label">Buscar Colegios:</label>
                                </div>
                                <div class="col-xs-3">
                                    <input  type="text" name="buscar" maxlength="30" id="buscar" class="form-control" onkeyup="filtrar(this.value);" placeholder="nombre, direccion o parroquia"/>
                                </div>
                                <div class="col-xs-2">
                                     <button title="Permite añadir un nuevo colegio" href="javascript: void(0)" data-toggle="modal" data-target="#colegio" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Colegio</button>
                                </div>
                                <div class="col-xs-2">
                                     <button title="Permite añadir un directivo a un colegio" href="javascript: void(0)" data-toggle="modal" data-target="#directivo" type="button" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Añadir Directivo a Colegio</button>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="hidden" id="cantidad" value="1"></input>
                                <input type="hidden" id="cantidadtotal"></input>
                                <div id="lista"></div>
                                <center><button type="hidden" onclick="anterior();" id="anterior" class="btn btn-success">Anterior</button>
                                  <button type="hidden" onclick="siguiente();" id="siguiente" class="btn btn-success">Siguiente</button></center>
                            </div>
                        </div>
                    </div>
                </div>

             </div>



        </div>
    </div>

      <?php include('includes/editcolegio.php');
            include('includes/newcolegio.php');
            include('includes/newdirectivo.php');
            
      ?>


    <script src="../resources/js/jquery-1.11.2.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/colegio.js"></script>
    <script src="../resources/js/validar.js"></script>

    <script>

      function filtrar(nombre){
          $('#cantidad').val("1");
          busc(nombre);
        }
    
    function busc(nombre){
          var circuito = $('#circuito').val();
          cantidadcole(nombre,circuito);
          var cantidad = $('#cantidad').val();
          lista_colegios(nombre,circuito,cantidad);
        }
        function botones(){
          if($('#cantidad').val()>=($('#cantidadtotal').val())){
            $('#siguiente').hide();
          }else{
            $('#siguiente').show();
          }
          if($('#cantidad').val()==1){
            $('#anterior').hide();
          }else{
            $('#anterior').show();
          }
        }

        function siguiente(){
          var suma = $('#cantidad').val();
          suma = eval(suma);
          suma=suma+1;
          $('#cantidad').val(suma);
          busc($('#buscar').val());
        }

        function anterior(){
          $('#cantidad').val($('#cantidad').val()-1);
          busc($('#buscar').val());
        }

        function cerrar(){
            $.ajax({
                url:'../controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                window.location.href = "../index.php";
            });
        }

            function registrar(){
            var nombrecol=$('#nombrecol').val();
            var direccioncol=$('#direccioncol').val();
            var parroquiacol=$('#parroquiacol').val();
            var circuitocol=$('#circuitocol').val();
                $.ajax({
                    url:'../controllers/colegios.php',
                    type:'POST',
                    data:'nombrecol='+nombrecol+'&direccioncol='+direccioncol+'&parroquiacol='+parroquiacol+'&circuitocol='+circuitocol+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#noexitocol').hide();
                        $('#exitocol').show();
                        alert("Colegio añadido con éxito");
                        window.location.href = "colegios.php";
                    }
                    else{
                        $('#noexitocol').show();
                    }
                });

        }

        function registrardir(){
            var nombresdir=$('#nombresdir').val();
            var apellidosdir=$('#apellidosdir').val();
            var emaildir=$('#email2dir').val();
            var telefonodir=$('#telefonodir').val();
            var usernamedir=$('#usernamedir').val();
            var passworddir=$('#passdir').val();
            var password2dir=$('#pass2dir').val();
            var circuitodir=$('#circuitodir').val();
            var colegiodir=$('#colegiodir').val();
            var leveldir=$('#leveldir').val();


            if (passworddir===password2dir) {

                $.ajax({
                    url:'../controllers/directivos.php',
                    type:'POST',
                    data:'nombresdir='+nombresdir+'&apellidosdir='+apellidosdir+'&emaildir='+emaildir+'&telefonodir='+telefonodir+'&usernamedir='+usernamedir+'&passworddir='+passworddir+'&leveldir='+leveldir+'&colegiodir='+colegiodir+'&circuitodir='+circuitodir+'&boton=registrar'                    
                }).done(function(respuesta){
                    if (respuesta==='exito') {
                        $('#noexitofac').hide();
                        $('#exitofac').show();
                        alert("El directivo ha sido añadido con exito");
                        window.location.href = "colegios.php";
                    }
                    else{
                        $('#noexitofac').show();

                    }
                });
            }
            else{
                alert('Las contraseñas no coinciden');
            }

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
