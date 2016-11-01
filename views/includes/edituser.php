        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Modificar Datos</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡Usuario editado con exito!</span>
                </div>
                <div class="alert alert-danger" id="noexito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo editar el usuario!</span>
                </div>
                <form class="form-horizontal" id="edituserform">
                  <div class="form-group">
                    <div class="col-xs-5">
                      <input id="id" name="id" type="hidden" class="form-control">
                    </div>
                    </div>
                    <div class="form-group" id="nombre">
                    <label for="nombres" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres" required>
                    </div>
                  </div>
                  <div class="form-group" id="apellido">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos:</label>
                    <div class="col-xs-5">
                      <input id="apellidos" name="apellidos"  type="text" class="form-control" placeholder="Ingrese sus Apellidos" required>
                    </div>
                  </div>
                  <div class="form-group" id="email">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input id="email2" name="email2" type="email" class="form-control" placeholder="Ingrese su Email" required>
                    </div>
                  </div>
                   <?php 

                        if($_SESSION['level']==0){?>
                        <div class="form-group" id="tipo">
                    <label for="nivel" class="control-label col-xs-5">Tipo de Usuario:</label>
                    <div class="col-xs-5">                 
                        <select id="level" name="level">
                            <option value="1">Facilitador</option>
                            <option value="2">Director</option>
                        </select>
                        </div>
                        </div>
                        <?php
                        }elseif ($_SESSION['level']==1) {?>
                        <input id="level" name="level" type="hidden" value="2"><?php                         
                        }
                        ?>
                        <div>
                          <p><strong>Nota:</strong> Si desea cambiar la contraseña, debe hacerse logueado desde el mismo usuario o debe ser eliminado.</p>
                        </div>                          
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="guardar();" type="button" id="actualizar" class="btn btn-success">Actualizar</button>
              </div>
            </div>
          </div>
        </div>