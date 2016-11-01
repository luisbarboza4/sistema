<?php 
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES' && $_SESSION['level'] == 0) 
  {
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Circuitos - Circuitos Educativos</title>
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
                        <div class="panel-heading"><center><strong>Circuitos Educativos</strong></center></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-3  text-right">
                                    <label for="buscar" class="control-label">Buscar Circuitos:</label>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" name="buscar" maxlength="30" id="buscar" class="form-control" onkeyup="filtrar(this.value);" placeholder="Por nombre o estado"/>
                                </div>
                                <div class="col-xs-2">
                                     <button href="javascript: void(0)" data-toggle="modal" data-target="#circuito" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Circuitos</button>
                                </div>
                                <div class="col-xs-2">
                                     <button style="margin-left: 15px" href="javascript: void(0)" data-toggle="modal" data-target="#facilitador" type="button" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Asignar Facilitador a Circuito</button>
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
      
      <?php include('includes/editcircuito.php');
            include('includes/newcircuito.php');
            include('includes/newfacilitador.php');
      ?>         

        
    <script src="../resources/js/jquery-1.11.2.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/circuito.js"></script>
    <script src="../resources/js/validar.js"></script>
    
    <script>

        function filtrar(nombre){
          $('#cantidad').val("1");
          busc(nombre);
        }

        function busc(nombre){
          cantidadcir(nombre);
          var cantidad = $('#cantidad').val();
          lista_circuitos(nombre,cantidad);
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
            var nombrescir=$('#nombrescir').val();
            var estadocir=$('#estadocir').val();

                $.ajax({
                    url:'../controllers/circuitos.php',
                    type:'POST',
                    data:'nombrescir='+nombrescir+'&estadocir='+estadocir+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta==='exito') {
                        $('#noexitocir').hide();
                        $('#exitocir').show();
                        alert("Circuito añadido con éxito");
                        window.location.href = "circuitos.php";
                    }
                    else{
                        $('#noexitocir').show();
                    }                    
                });
            
        }

        function registrarfac(){
            var nombresfac=$('#nombresfac').val();
            var apellidosfac=$('#apellidosfac').val();
            var emailfac=$('#email2fac').val();
            var telefonofac=$('#telefonofac').val();
            var usernamefac=$('#usernamefac').val();
            var passwordfac=$('#passfac').val();
            var password2fac=$('#pass2fac').val();
            var circuitofac=$('#circuitofac').val();
            var levelfac=$('#levelfac').val();


            if (passwordfac===password2fac) {

                $.ajax({
                    url:'../controllers/facilitadores.php',
                    type:'POST',
                    data:'nombresfac='+nombresfac+'&apellidosfac='+apellidosfac+'&emailfac='+emailfac+'&telefonofac='+telefonofac+'&usernamefac='+usernamefac+'&passwordfac='+passwordfac+'&levelfac='+levelfac+'&circuitofac='+circuitofac+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta==='exito') {
                        $('#noexitofac').hide();
                        $('#exitofac').show();
                        alert("El Facilitador ha sido añadido con exito");
                        window.location.href = "circuitos.php";
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
    