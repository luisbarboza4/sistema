<?php 
    session_start();    
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES' && $_SESSION['level'] != 0)
  {
  	$id_circuito = $_SESSION['circuito'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">

    <title>Chat - Circuitos Educativos</title>

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
            <div class="panel-heading"><center><strong>Chat del Circuito</strong><?php
                                                        if($_SESSION['level']==1){?>
                                                        <button onclick="deletemessages();" title="Borrar historial del chat" data-toggle="tooltip" data-placement="left" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></button>
                                                        <?php
                                                        }?></center></div>
              <div class="panel-body">              
                  <form id="formChat" role="form">
                    <input type="hidden" class="form-control" id="username" name="username" value= <?php echo $_SESSION['username'];?> >
                    <input type="hidden" class="form-control" id="id_circuito" name="id_circuito" value= <?php echo $_SESSION['circuito'];?>>
          						<div class="form-group">
          							<div class="row">
          								<div id="conversation" style="height:350px;  border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
          								</div>
          							</div>
          						</div>

          						 <div class="form-group">
          							<label for="message">Escribe un mensaje:</label>
          							<textarea id="message" name="message"  class="form-control" maxlength="80" rows="3" onkeyup="validarnovacio();" onkeypress="validar(event);"></textarea>
                        <label>Máximo 80 carácteres</label>
            						</div>
						        <button id="send" class="btn btn-primary" disabled="true">Enviar</button>
                  </form>
              </div>
            </div>
        </div>
      </div>
  </div>

    <script src="../resources/js/jquery-2.0.3.min.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/chat.js"></script>
    
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
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script>
    	$(document).on("ready", function(){
    		registerMessages();
    		$.ajaxSetup({"cache":false});
    		setInterval("loadOldMessages()", 500);
        
    	});

    	var registerMessages = function(){
    		$("#send").on("click", function(e){
    			e.preventDefault();
          $("#send").prop("disabled",true);
    			var frm = $("#formChat").serialize();
    			$.ajax({
    				type: "POST",
    				url: "../controllers/register.php",
    				data: frm
    			}).done(function(info){
    				$("#message").val("");
    				var altura = $("#conversation").prop("scrollHeight");
    				$("#conversation").scrollTop(altura);
    			})
    		});
    	}

    	var loadOldMessages = function(){
        var frm = $("#formChat").serialize();
    		$.ajax({
    			type: "POST",
    			url: "../controllers/conversation.php",
          data: frm
    		}).done(function(info){
          var bajar=false;
          var pag= $("#conversation").html();
          $("#conversation").html(info);
          $("#conversation p:last-child").css({"background-color": "lightgreen",
                             "padding-botton": "20px"});
          if(pag!=$("#conversation").html()){
            bajar=true;
          }
          if(bajar){
            var altura = $("#conversation").prop("scrollHeight");
            $('#conversation').animate({scrollTop: altura});
          }
    		});
    	}

    </script>

<script>
  function deletemessages() {
    var r = confirm("¿Seguro deseas borrar el historial del chat?");
    if (r == true) {
            $.ajax({
                url:'../controllers/deletemessages.php',
                type:'POST',
                data:'circuito='+<?php echo $_SESSION['circuito'];?>+'&boton=delete'
            }).done(function(resp){
            });
        }
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