<?php 
    session_start();
    if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
    {
        header("location: views/index.php");
    }else{

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Circuitos Educativos TEG</title>
        <link rel="icon" href="resources/img/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="resources/css/stylelogin.css">
        <link rel="stylesheet" href="resources/css/bootstrap.min.css">
   </head>

  <body>

    <div class="login-page">
      
  <div class="form" >

    <form class="login-form" id="form">
      <div class="name">
        <center><img src="resources/img/logo.png"></center>
      </div>      
      <div class="alert alert-danger text-center" style="display:none;" id="error">
            <p>Usuario y/o contraseña incorrectos</p>
      </div>    
      <input type="text" onkeypress="kuser(event);" class="form-control" id="username" placeholder="usuario" maxlength="25" autofocus required/>
      <input type="password" onkeypress="validar(event)" class="form-control" id="password" placeholder="contraseña" maxlength="16"  required/>

      <button type="button" onclick='confirmar();' id="entrar">Iniciar Sesión</button>
    </form>
    <br>
    <a href="lostpass.php">¿Olvidaste tu contraseña?</a>
    <br>
    <br>
    <p>Desarrollado por LDA &copy. TEG de URBE.</p>
    <span><a href="http://www.urbe.edu.ve/" target="_blank"><img src="resources/img/urbe.png"></a>     <a href="http://www.me.gob.ve/" target="_blank"><img src="resources/img/me.png"></a></span>
  </div>

</div>

        <script src="resources/js/index.js"></script>
        <script src="resources/js/jquery-1.11.2.js"></script>
        <script src="resources/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jquery-ui.js"></script>

      <script>

        function confirmar(){
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                url:'controllers/usuario.php',
                type:'POST',
                data:'username='+username+'&password='+password+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    $('#error').show();
                    $('#username').focus();
                    $('#username').effect("shake");
                    $('#password').effect("shake");
                    document.getElementById("form").reset();
                }else {                  
                    location.href='views/index.php';                    
                }
            });
        }       
    </script> 
    
  </body>
</html>
<?php 

}?>
