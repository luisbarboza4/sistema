        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Datos del Usuario</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exiton" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡Su cuenta ha sido registrada exitosamente!</span>
                </div>
                <div class="alert alert-danger" id="noexiton" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo registrar!</span>
                </div>
                <form class="form-horizontal" id="formUsuario">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input id="nombresn" maxlength="25" name="nombresn" type="text" class="form-control" placeholder="Ingrese sus Nombres" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos:</label>
                    <div class="col-xs-5">
                      <input id="apellidosn" maxlength="25" name="apellidosn"  type="text" class="form-control" placeholder="Ingrese sus Apellidos" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input id="email2n" maxlength="35" name="email2n" type="email" class="form-control" placeholder="Ingrese su Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="passn" maxlength="16" name="passn" type="password" class="form-control" placeholder="Ingrese su contraseña" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2n" maxlength="16" name="pass2n" type="password" class="form-control" placeholder="Repita su contraseña" required>
                    </div>
                  </div>
                   <?php 

                        if($_SESSION['level']==0){?>
                        <div class="form-group">
                    <label for="nivel" class="control-label col-xs-5">Tipo de Usuario:</label>
                    <div class="col-xs-5">                 
                        <select id="leveln" name="leveln">
                            <option value="1">Facilitador</option>
                            <option value="2">Director</option>
                        </select>
                        </div>
                        </div>
                        <?php
                        }elseif ($_SESSION['level']==1) {?>
                        <input id="leveln" name="leveln" type="hidden" value="2"><?php                         
                        }
                        ?>

                        <div>
                          <p><strong>Nota:</strong> Si desea cambiar la contraseña, debe hacerse logueado desde el mismo usuario o debe ser eliminado.</p>
                        </div>                       
                </form>
              </div>
              <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Registrar</button>
              </div>
            </div>
          </div>
        </div>