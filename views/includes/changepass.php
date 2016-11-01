        <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title">Cambiar Clave</h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡Clave cambiada con exito!</span>
                </div>
                <div class="alert alert-danger" id="noexito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡Claves no coinciden!</span>
                </div>
                <form class="form-horizontal" id="changepassform">
                  <div class="form-group">
                    <div class="col-xs-5">
                      <input id="id" name="id" value="<?php echo $_SESSION['id']; ?>" type="hidden" class="form-control">
                    </div>
                    </div>
                    <div class="form-group" id="nombre">
                    <label for="nombres" class="control-label col-xs-5">Nueva Clave:</label>
                    <div class="col-xs-5">
                      <input title="Puede contener letras, números, mayúscula y simbolos. Mínimo 6 y máximo 16 caracteres" data-toggle="tooltip" data-placement="top" id="clave1" name="clave1" type="password" maxlength="16" class="form-control" placeholder="Ingrese nueva clave" onkeypress="kpass(event);" onkeyup="validarpass();pass(this.value);" onclick="validarpass();pass(this.value);" onpaste="validarpass();pass(this.value);" onchange="validarpass();pass(this.value);" required="true">
                    </div>
                  </div>
                  <div class="form-group" id="apellido">
                    <label for="apellidos" class="control-label col-xs-5">Repetir Clave:</label>
                    <div class="col-xs-5">
                      <input title="Confirme su contraseña" data-toggle="tooltip" data-placement="bottom" id="clave2" name="clave2"  type="password" maxlength="16" class="form-control" placeholder="Repita nueva clave" onkeypress="kpass(event);" onkeyup="validarpass();pass(this.value);" onclick="validarpass();pass(this.value);" onpaste="validarpass();pass(this.value);" onchange="validarpass();pass(this.value);" required="true">
                    </div>
                  </div>         
                </form>
              </div>
              <div class="modal-footer">  
                <button onclick="vacear()" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="changep();" type="submit" id="actualizar" name="actualizar" class="btn btn-success" disabled="true">Cambiar</button>
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
      }

        function changep(){
            if($('#clave1').val() == $('#clave2').val()){
              var pass = $('#clave1').val();
              var id = $('#id').val();
              $.ajax({
                  url:'../controllers/usuario.php',
                      type:'POST',
                      data:'id='+id+'&pass='+pass+'&boton=changepass'
              }).done(function(resp){
                  $('#noexito').hide();
                  $('#exito').show();
              });
            }else{
              $('#exito').hide();
              $('#noexito').show();
            }
        }  
    </script>