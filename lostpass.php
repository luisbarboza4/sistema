<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña - Circuitos Educativos TEG</title>
        <link rel="icon" href="resources/img/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="resources/css/stylelogin.css">
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
 
  </head>

  <body>

<div class="login-page">
      
  <div class="form" >
 
    <form class="login-form" method="post" id="form">
      <div class="name">
        <center><img src="resources/img/logo.png"></center>
      </div>
      <div class="alert alert-danger" id="falseAnswer" style="display:none;">
          <span class="glyphicon glyphicon-remove"></span><span> ¡Respuesta Incorrecta!</span>
      </div> 
      <div class="alert alert-danger" id="falseUser" style="display:none;">
          <span class="glyphicon glyphicon-remove"></span><span> ¡Usuario no existe o no tiene opción de recuperación!</span>
      </div>   
      <label id="lblusername">Nombre de usuario:</label>
      <input type="text" onkeypress="kuser(event);" class="form-control" id="username" name="username" placeholder="usuario" autofocus required/>
      <label id="labelpregunta" style="display:none"><center>Pregunta Secreta:</center></label>
      <input class="form-control" id="pregunta" style="display:none;" disabled/>
      <input class="form-control" id="answer" placeholder="respuesta" style="display:none;" name="answer"/>
      <button type="button" onclick='forgot();' id="recuperar">Recuperar</button>
    </form>
          
    <br>
    <a href="index.php">Regresar a Iniciar Sesion</a>
    
  </div>

</div>

<?php include('views/includes/changepasslost.php');?>

        <script src="resources/js/jquery-1.11.2.js"></script>
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jquery-ui.js"></script>
        <script src="resources/js/validar.js"></script>

      <script>      
        function forgot(){
          var frm = $("#form").serialize();
          if($("#answer").val()==""){
            $.ajax({
              type: "POST",
              url: "controllers/forgotPass.php",
              data: frm
            }).done(function(info){
              if(info==""){
                $('#falseUser').show();
                $('#username').val("");
                $('#username').effect('shake');
              }else{
               $('#falseUser').hide();
               document.getElementById("lblusername").style.display = 'none';
               document.getElementById("username").style.display = 'none';
               document.getElementById("pregunta").style.display = 'block';
               document.getElementById("labelpregunta").style.display = 'block';
               document.getElementById("answer").style.display = 'block';
               $("#pregunta").val(info);
             }
            });
          }else{
            $.ajax({
            type: "POST",
            url: "controllers/answerForgot.php",
            data: frm
          }).done(function(info){
            if (info=="exito"){
              $('#falseAnswer').hide();
              $('#changepasslost').modal('show');
            }else{
              $('#falseAnswer').show();
              $('#answer').val("");
              $('#answer').effect('shake');
            }           
          });  
          }
        } 

       </script>

       <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

  </body>
</html>
