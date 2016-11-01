<?php
    session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
  {
date_default_timezone_set("America/Caracas");
include '../controllers/funciones.php';
include '../controllers/config.php';

if (isset($_POST['from'])) 
{
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        $inicio = _formatear($_POST['from']);

        $final  = _formatear($_POST['to']);

        $inicio_normal = $_POST['from'];

        $final_normal  = $_POST['to'];

        $titulo = evaluar($_POST['title']);

        $body   = evaluar($_POST['event']);

        $clase  = evaluar($_POST['class']);
        $circuito = $_SESSION['circuito'];

        if($_SESSION['level']>0){
            $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal','$circuito')";
        }else{
            $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal',null)";
        }

        $conexion->query($query); 

        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // GENERACION DEL LINK DEL EVENTO
        $link = "$base_url"."views/descripcion_evento.php?id=$id";

        // AQUI SE ACTUALIZA
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // SE EJECUTA EL SQL
        $conexion->query($query); 

        // SE REDIRECCIONA AL PLANIFICADOR
        header("Location:$base_url"."views/calendario.php"); 
    }
}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>Planificador - Circuitos Educativos</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
        <link rel="icon" href="../resources/img/favicon.png" type="image/png"/>
        <link rel="stylesheet" href="<?=$base_url?>resources/css/bootstrap.min.css">
        <link href="../resources/css/animate.css" rel="stylesheet">
        <link href="../resources/css/responsive.css" rel="stylesheet">
        <link href="../resources/css/sidebar.css" rel="stylesheet">
        <link href="../resources/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/navbar-style.css" >
        <link rel="stylesheet" href="<?=$base_url?>resources/css/calendar.css">
        <link rel="stylesheet" href="<?=$base_url?>resources/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=$base_url?>resources/css/bootstrap-datetimepicker.min.css" />
        <script src="<?=$base_url?>resources/js/es-ES.js"></script>
        <script src="<?=$base_url?>resources/js/jquery.min.js"></script>
        <script src="<?=$base_url?>resources/js/moment.js"></script>
        <script src="<?=$base_url?>resources/js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>resources/js/bootstrap-datetimepicker.js"></script>
        <script src="<?=$base_url?>resources/js/bootstrap-datetimepicker.es.js"></script>
    </head>

</head>
<body>
<?php include('includes/navbar.php');?>
        <div class="container">
                <div class="row">
                        <div class="page-header"><center><h3>Planificador de Eventos del Sistema</h3></center><h2></h2></div>
                                <div class="pull-left form-inline">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>&nbsp
                                        <div class="btn-group">
                                            <button class="btn btn-info" data-calendar-view="year">Año</button>
                                            <button class="btn btn-info active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-info" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-info" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                    <div class="pull-right form-inline">
                                        <?php
                                        if($_SESSION['level']<=1){
                                        echo "<button class=\"btn btn-success\" data-toggle='modal' data-target='#add_evento'><span class=\"glyphicon glyphicon-flag\"> </span> Nuevo Evento</button>";
                                        }
                                        ?>
                                    </div>

                </div><hr>

                <div class="row">
                        <div id="calendar"></div> <!-- AQUI SE MUESTRA EL PLANIFICADOR -->
                        <br><br>
                </div>

                <!-- EL MODAL PARA MOSTRAR -->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirigir();">Cerrar</button>
                                </div>
                            </div>
                    </div>
                </div><!-- MODAL -->
        </div>

    <script src="../resources/js/underscore-min.js"></script>
    <script src="../resources/js/calendar.js"></script>
    <script src="../resources/js/validar.js"></script>
    
    <script type="text/javascript">
        (function($){

                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();


                var options = {

                        modal: '#events-modal', 

                        modal_type:'iframe',    

                        events_source: '<?=$base_url?>controllers/obtener_eventos.php', 

                        view: 'month',             

                        day: yyyy+"-"+mm+"-"+dd,   

                        language: 'es-ES', 

                        tmpl_path: '<?=$base_url?>resources/tmpls/', 
                        tmpl_cache: false,

                        time_start: '08:00', 

                        time_end: '22:00',   

                        time_split: '30',    

                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel">Añadir evento</h4></center>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="from">Inicia</label>
                    <div class='input-group date' id='from'>
                        <input title="Seleccione la fecha de inicio" data-toggle="tooltip" data-placement="top" type='text' id="from" name="from" class="form-control" onclick="validarevento();" onchange="validarevento();" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Finaliza</label>
                    <div class='input-group date' id='to'>
                        <input title="Seleccione la fecha de fin" data-toggle="tooltip" data-placement="top" type='text' name="to" id="to" class="form-control" onclick="validarevento();" onchange="validarevento();" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="tipo">Tipo de evento</label>
                    <select class="form-control" name="class" id="tipo" onchange="validarevento();" onclick="validarevento();">
                        <option value="event-info">Información</option>
                        <option value="event-success">Curso</option>
                        <option value="event-important">Reunión</option>
                        <option value="event-warning">Importante</option>
                        <option value="event-special">Especial</option>
                    </select>

                    <br>


                    <label for="title">Título</label>
                    <input title="Ingrese sólo letras o números. Mínimo 6 y máximo 25 caracteres" data-toggle="tooltip" data-placement="top" onkeypress="narch(event);" onkeyup="validarevento();" onclick="validarevento();" onchange="validarevento();" type="text" required autocomplete="off" name="title" class="form-control" maxlength="25" id="title" placeholder="Título del evento">

                    <br>

                    <label for="body">Descripción</label>
                    <textarea title="Ingrese sólo letras o números. Mínimo 6 y máximo 250 caracteres" data-toggle="tooltip" data-placement="top" onkeyup="validarevento();" onclick="validarevento();" placeholder="Máximo 250 caractéres" onchange="validarevento();" maxlength="250" id="body" name="event" required class="form-control" rows="3"></textarea>

                    <br>

                    <!--<label for="encargado">Encargado</label>
                    <select class="form-control" name="encargado" id="encargado">
                        <option value="">Facilitador 1</option>
                        <option value="">Facilitador 2</option>
                        <option value="">Facilitador 3</option>
                        <option value="">Facilitador 4</option>
                    </select>-->

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
    
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script>
        function redirigir(){
            window.location.reload();
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
    </script>
      </div>
      <div class="modal-footer">
          <button onclick="limpiarnewevent();" type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button id="guarda" name="guarda" type="submit" class="btn btn-success" disabled="true"><i class="fa fa-check" ></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>
<?php

  }
  else
  {
    header("location: ../");
  }
 ?>
