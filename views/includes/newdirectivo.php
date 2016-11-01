        <div class="modal fade" id="directivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Datos del Directivo</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exitodir" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡El directivo ha sido registrado exitosamente!</span>
                </div>
                <div class="alert alert-danger" id="noexitodir" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo registrar!</span>
                </div>
                <form class="form-horizontal" id="formdirectivo">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input title="Sólo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombresdir" maxlength="25" name="nombresdir" type="text" class="form-control" placeholder="Ingrese sus nombres" onkeypress="letras(event)" onkeyup="validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos:</label>
                    <div class="col-xs-5">
                      <input title="Sólo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="apellidosdir" maxlength="25" name="apellidosdir"  type="text" class="form-control" placeholder="Ingrese sus apellidos" onkeypress="letras(event)"onkeyup="validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>
                  <div class="alert alert-danger" id="falseUser2" style="display:none;">
                          <span class="glyphicon glyphicon-remove"></span><span> ¡El Usuario no esta disponible!</span>
                  </div>  
                  <div class="form-group">
                  <div class="form-group">
                    <label for="username" class="control-label col-xs-5">Nombre de Usuario:</label>
                    <div class="col-xs-5">
                        <input title="Puede contener letras y números. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="usernamedir" maxlength="25" name="usernamedir" type="text" class="form-control" placeholder="Ingrese su usuario" onkeypress="kuser(event);" onkeyup="validardirectivo();validaruser(this.value);" onclick="validardirectivo();validaruser(this.value);" onpaste="validardirectivo();validaruser(this.value);" onchange="validardirectivo();validaruser(this.value);" required="true">
                    </div>
                  </div>
                  <div class="alert alert-danger" id="falseEmail2" style="display:none;">
                          <span class="glyphicon glyphicon-remove"></span><span> ¡El email no esta disponible!</span>
                      </div>  
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input title="Ingrese su correo. Máximo 30 caracteres" data-toggle="tooltip" data-placement="top" id="email2dir" maxlength="30" name="email2dir" type="email" class="form-control" placeholder="Correo electronico" onkeypress="emailk(event)" onkeyup="validaremail(this.value);validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="control-label col-xs-5">Telefono:</label>
                    <div class="col-xs-5">
                        <input title="Sólo números. Máximo 11 caracteres" data-toggle="tooltip" data-placement="top" id="telefonodir" maxlength="11" name="telefonodir" type="text" class="form-control" placeholder="Ejemplo 04141234567" onkeypress="numeros(event)" onkeyup="validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>
                  <div style="display:none" class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="passdir" value="123456" maxlength="16" name="passdir" type="password" class="form-control" placeholder="Ingrese su contraseña" onkeyup="validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>
                  <div style="display:none" class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2dir" value="123456" maxlength="16" name="pass2dir" type="password" class="form-control" placeholder="Repita su contraseña" onkeyup="validardirectivo();" onclick="validardirectivo();" onpaste="validardirectivo();" onchange="validardirectivo();" required="true">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="colegio" class="control-label col-xs-5">Directivo del Colegio:</label>
                    <div class="col-xs-5">
                    	<select title="Seleccione el colegio a donde desea añadirlo" data-toggle="tooltip" data-placement="top" id="colegiodir" name="colegiodir" class="form-control" onclick="validardirectivo();" onchange="validardirectivo();" required="true">
                    	<?php
						            require_once('../models/conexion.php');
                        $conexion3= new conexion();
                        $conexion3->conectar();
                        $sql2 = 'SELECT * FROM colegio WHERE id_circuito = '.$_SESSION['circuito'].'';
                        $resultados2 = $conexion3->conexion->query($sql2);

                        while($filas=mysqli_fetch_array($resultados2)){

                              echo "<option value='".$filas[0]."'>".$filas[1]."</option>";
                          }
                        ?>
                    
						          </select>                        
                    </div>
                    
                  </div>
                  <input id="leveldir" name="leveldir" type="hidden" value="2">
                  <input id="circuitodir" name="circuitodir" type="hidden" value=<?php echo $_SESSION['circuito'];?>>
              <center><label><strong style="color:red">Nota:</strong> El sistema añade por defecto "123456" como contraseña para el nuevo director. Luego, esta puede ser cambiada por el usuario desde editar perfil</label></center>
                </form>
              </div>
              <div class="modal-footer">  
                <button onclick="limpiarnewdir();" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrardir();limpiarnewdir();" type="button" id="actualizardir" name="actualizardir" class="btn btn-success" disabled="true">Registrar</button>
              </div>
            </div>
          </div>
        </div>