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
    <title>Archivos - Circuitos Educativos</title>
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="../resources/css/styleusers.css">
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
                        <div class="panel-heading"><strong><center>Documentos Registrados</strong></center>
                        </div>
                    <div class="panel-body">
                        
                      <div class="form-horizontal">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="level" id="level" value="<?php echo $_SESSION['level']; ?>">
                                    <input type="hidden" name="circuito" id="circuito" value="<?php echo $_SESSION['circuito']; ?>">
                                    <div class="col-xs-3  text-right">
                                        <label for="buscar" class="control-label">Buscar Documentos:</label>
                                    </div>
                                    <div class="col-xs-3 col-md-4">
                                        <input type="text" maxlength="30 name="buscar" id="buscar" class="form-control" onkeyup="filtrar(this.value);" placeholder="Ingrese nombre del documento"/>
                                    </div>
                                    <div class="col-xs-3">
                                         <button title="Permite agregar archivos al sistema" onclick="upload()" type="button" class="btn btn-success"><span class= "glyphicon glyphicon-open" ></span> Cargar</button>
                                    </div>
                                    <div class="col-xs-3 col-md-2 text-right">
                                        <select class="form-control" name="paginator" id="paginator" onchange="comb()">
                                          <option value="5">5</option>
                                          <option value="10" selected="true">10</option>
                                          <option value="25">25</option>
                                          <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                  <input type="hidden" id="cantidad" value="1"></input>
                                  <input type="hidden" id="cantidadtotal"></input>
                                  <div id="listadoc"></div>
                                  <center><button type="hidden" onclick="anterior();" id="anterior" class="btn btn-success">Anterior</button>
                                  <button type="hidden" onclick="siguiente();" id="siguiente" class="btn btn-success">Siguiente</button></center>
                                </div>
                      </div>
                    </div>

                  </div>
                </div> 
              </div> 
            </div>

          <script src="../resources/js/jquery-1.11.2.js"></script>
          <script src="../resources/js/bootstrap.min.js"></script> 
          <script src="../resources/js/doc.js"></script>
    <script>
        $(document).ready(busc(""))

        function filtrar(nombre){
          $('#cantidad').val("1");
          busc(nombre);
        }

        function comb(){
          $('#cantidad').val("1");
          busc($('#buscar').val());
        }

        function busc(nombre){
        	var id = $('#id').val();
        	var level = $('#level').val();
        	var circuito = $('#circuito').val();
          cantidaddoc(nombre,id,level,circuito);
          var cantidad = $('#cantidad').val();
          var pag = $('#paginator').val();
        	lista_doc(nombre,id,level,circuito,cantidad,pag);
          
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