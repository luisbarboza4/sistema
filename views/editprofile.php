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

    <title>Editar Perfil - Circuitos Educativos</title>

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
    <link href="../resources/css/navbar-style.css" rel="stylesheet">
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
                    <div class="panel-body">
                        <center><h2>Modificar Datos</h2></center>
                        <br>
                        <br>
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="alert alert-success" id="exitopass" style="display:none;">
                            <strong>¡Exito!</strong> Datos cambiados con exito.
                            </div>

                            <div class="alert alert-danger" id="noexitopass" style="display:none;">
                            <strong>Error!!!</strong> No se pudo cambiar los datos.
                            </div>
                        
                        <div>
                        <input id="iduser" name="iduser" type="hidden" value="<?php echo $_SESSION['id']; ?>" class="form-control">
                        </div>
                      <!--<div class="form-group">
                        <label class="control-label col-sm-2" for="newpass">Imagen de Perfil:</label>
                        <div class="col-sm-4">
                          <div class="col-sm-4">
                            <p class="text-center">
                              <img id="img" src="<?php //echo  $_SESSION['img'] ?>" class="" onclick="elegir()" style="width:300%;height:300%;max-width:150px; max-height:150px;"></img>
                            </p>
                          </div>
                        </div>                                                
                      </div>
                         <div class="form-group"> 
                         <div class="col-sm-4">
                          <input type="file" name="foto" accept="image/jpeg" id="select" style="display:none;" onchange="showimagepreview(this)">
                        </div>
                        </div>-->
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="newpass">Nombres:</label>
                        <div class="col-sm-4">
                          <input title="Ingrese sólo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" type="text" class="form-control" onkeypress="letras(event)" onkeyup="validarperfil();sololetrasp(this.value);" id="nombres" maxlength="25" name="nombres" onclick="validarperfil();sololetrasp(this.value);" onpaste="validarperfil();sololetrasp(this.value);" onchange="validarperfil();sololetrasp(this.value);" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="newpass">Apellidos:</label>
                        <div class="col-sm-4">
                          <input title="Ingrese sólo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="right" type="text" class="form-control" id="apellidos" name="apellidos" maxlength="25" onkeypress="letras(event)" onkeyup="validarperfil();sololetrasp(this.value);" onclick="validarperfil();sololetrasp(this.value);" onpaste="validarperfil();sololetrasp(this.value);" onchange="validarperfil();sololetrasp(this.value);" required="true">
                        </div>
                      </div>
                      <div class="alert alert-danger" id="falseEmailp" style="display:none;">
                          <span class="glyphicon glyphicon-remove"></span><span> ¡El email no esta disponible!</span>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Correo:</label>
                        <div class="col-sm-4">
                          <input title="Ingrese su correo. Máximo 35 caracteres" data-toggle="tooltip" data-placement="right" type="email" class="form-control" id="email2" name="email2" maxlength="35" onkeypress="emailk(event)" onkeyup="validarperfil();emailp(this.value);validaremailp(this.value);" onclick="validarperfil();validaremailp(this.value);" onpaste="validarperfil();validaremailp(this.value);" onchange="validarperfil();validaremailp(this.value);" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                        <div class="col-sm-4">
                          <input title="Ingrese sólo números. Máximo 11 caracteres" data-toggle="tooltip" data-placement="right" type="text" class="form-control" id="telefono" placeholder="Ejemplo 04141234567" name="telefono" maxlength="11" onkeypress="numeros(event);" onkeyup="validarperfil();telefp(this.value);" onclick="validarperfil();telefp(this.value);" onpaste="validarperfil();telefp(this.value);" onchange="validarperfil();telefp(this.value);" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <center><h4 style="color:#0C6A8A">Opción para recuperar cuenta en caso de olvido</h4></center>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pregunta Secreta:</label>
                        <div class="col-sm-4">
                          <input title="Cree una pregunta de seguridad. Máximo 40 caracteres" data-toggle="tooltip" data-placement="top" type="text" class="form-control" id="pregunta" name="pregunta" maxlength="40" placeholder="Pregunta Secreta" onkeyup="validarperfil();" onclick="validarperfil();" onpaste="validarperfil();" onchange="validarperfil();" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Respuesta:</label>
                        <div class="col-sm-4">
                          <input title="Asigne una respuesta a la pregunta. Esta será solicitada al momento de recuperar su cuenta. Máximo 20 caracteres" data-toggle="tooltip" data-placement="bottom" type="text" class="form-control" id="respuesta" name="respuesta" maxlength="20" placeholder="Respuesta" onkeyup="validarperfil();" onclick="validarperfil();" onpaste="validarperfil();" onchange="validarperfil();" required="true">
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                      <div class="col-sm-4">
                        <center><button href="javascript: void(0)" style="margin-bottom: 8px" data-toggle="modal" data-target="#changepass" type="button" class="btn btn-primary">Cambiar Contraseña</button></center>
                      </div>
                      <div class="col-sm-4">
                        <center><button onclick='cambiar();' type="submit" id="aceptar" name="aceptar" class="btn btn-success" disabled="true">Guardar Cambios</button></center>
                      </div>
                      </div>
                      
                    
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
    <?php include('includes/changepass.php'); ?>

    <script> 

        

        /*function showimagepreview(input) {  
            validar();
            if (input.files && input.files[0]) {  
                var reader = new FileReader();  
                reader.onload = function (e) {  
                    document.getElementsByTagName("img")[2].setAttribute("src", e.target.result); 
                }  
                reader.readAsDataURL(input.files[0]);  
            }  
        }  */
  
    </script> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script>
    $(document).ready(editdatos())
        function cerrar(){
            $.ajax({
                url:'../controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                window.location.href = "../index.php";
            });
        }

        function elegir(){
          $('#select').click();
        }

        function editdatos(){
          var id = $('#iduser').val();
                $.ajax({
                    url:'../controllers/usuario.php',
                    type:'POST',
                    data:'id='+id+'&boton=editdatos'
                  }).done(function(data){
                     var datos = JSON.parse(data);
                     mostrardat(datos);
                });
        }

        function mostrardat(data){
          $("#nombres").val(data[0]);
          $("#apellidos").val(data[1]);
          $("#email2").val(data[2]);
          $("#pregunta").val(data[3]);
          $("#respuesta").val(data[4]);      
          $("#telefono").val(data[5]);        
        }

        function cambiar(){
            var id      = $('#iduser').val();
            var nombres = $('#nombres').val();
            var apellidos = $('#apellidos').val();
            var email = $('#email2').val();
            var telefono = $('#telefono').val();
            var preguntas = $('#pregunta').val(); 
            var respuestas = $('#respuesta').val();
                $.ajax({
                    url:'../controllers/usuario.php',
                    type:'POST',
                    data:'id='+id+'&nombres='+nombres+'&apellidos='+apellidos+'&email='+email+'&telefono='+telefono+'&preguntas='+preguntas+'&respuestas='+respuestas+'&boton=editprofile'
                }).done(function(respuesta){
                  $_SESSION['nombre'] = nombres;
                    if (respuesta=='exito') {
                        $('#exitopass').show();
                        $('#noexitopass').hide();
                    }
                    else{
                        $('#noexitopass').show();
                        $('#exitopass').hide();
                    }                    
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
  <?php 
    /*if(!empty($_FILES)){
      //unlink(dirname(__FILE__)."/archivo/".$id);
      move_uploaded_file($_FILES['foto']['tmp_name'], dirname(__FILE__)."/imgperfil/".$_SESSION['id']);
      $_SESSION['img'] = "imgperfil/".$_SESSION['id'];
      echo"<script language=\"javascript\">window.location=\"editprofile.php\"</script>;";
    }
    function rutaimagen(){
      if(file_exists(dirname(__FILE__)."/imgperfil/".$_SESSION['id'])){
        $_SESSION['img'] = "imgperfil/".$_SESSION['id'];
      }else{
        $_SESSION['img'] = "imgperfil/perfil.png";
      }
    }*/
   ?>
