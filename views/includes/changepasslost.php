        <div class="modal fade" id="changepasslost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Restablecer Contraseña</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> ¡Contraseña cambiada con exito! Presione "Salir" para regresar</span>
                </div>
                <div class="alert alert-danger" id="noexito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> ¡Las contraseñas ingresadas deben coincidir!</span>
                </div>
                <form class="form-horizontal" id="changepassform">
                    <div class="form-group" id="nombre">
                    <label for="nombres" class="control-label col-xs-5">Nueva Contraseña:</label>
                    <div class="col-xs-5">
                      <input id="clave1" name="clave1" type="password" maxlength="16" class="form-control" placeholder="Ingresa la contraseña" onkeypress="kpass(event);" onkeyup="validarpass();pass(this.value);" onclick="validarpass();pass(this.value);" onpaste="validarpass();pass(this.value);" onchange="validarpass();pass(this.value);" required="true">
                    </div>
                  </div>
                  <div class="form-group" id="apellido">
                    <label for="apellidos" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                      <input id="clave2" name="clave2"  type="password" maxlength="16" class="form-control" placeholder="Repita la contraseña" onkeypress="kpass(event);" onkeyup="validarpass();pass(this.value);" onclick="validarpass();pass(this.value);" onpaste="validarpass();pass(this.value);" onchange="validarpass();pass(this.value);" required="true">
                    </div>                    
                  </div>
                  <center><span><strong style="color:#ED0C0C;">Nota: </strong>Puede contener letras, números, mayusculas y simbolos. <br>Mínimo 6 y máximo 16 caracteres.</span></center>    
                </form>
              </div>
              <div class="modal-footer">  
                <button onclick="vacear()" type="reset" class="btn btn-danger" data-dismiss="modal">Salir</button>
                <button onclick="changepassword();" type="submit" id="actualizar" class="btn btn-success">Restablecer</button>
              </div>
            </div>
          </div>
        </div>
      <script>

      function vacear(){
        $('#clave1').val("");
        $('#clave2').val("");
        $('#noexito').hide();
        $('#exito').hide();
        window.location.href = 'index.php';
      }

        function changepassword(){
            if($('#clave1').val() == $('#clave2').val()){
              var pass = $('#clave1').val();
              var username = $("#username").val();
              $.ajax({
                  url:'controllers/usuario.php',
                      type:'POST',
                      data:'username='+username+'&pass='+pass+'&boton=changepasslost'
              }).done(function(resp){
                  $('#noexito').hide();
                  $('#exito').show();
                  $('#changepassform').hide();
                  document.getElementById("actualizar").style.display = 'none';
              });
            }else{
              $('#exito').hide();
              $('#noexito').show();
            }
        }  
    </script>