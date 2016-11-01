        <div class="modal fade" id="facilitador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Datos del Facilitador</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exitofac" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡El facilitador ha sido registrado exitosamente!</span>
                </div>
                <div class="alert alert-danger" id="noexitofac" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo registrar!</span>
                </div>
                <form class="form-horizontal" id="formfacilitador">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input title="Solo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombresfac" maxlength="25" name="nombresfac" type="text" class="form-control" placeholder="Ingrese sus nombres" onkeypress="letras(event)" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos:</label>
                    <div class="col-xs-5">
                      <input title="Solo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="apellidosfac" maxlength="25" name="apellidosfac"  type="text" class="form-control" placeholder="Ingrese sus apellidos" onkeypress="letras(event)" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>
                  <div class="alert alert-danger" id="falseUser" style="display:none;">
                          <span class="glyphicon glyphicon-remove"></span><span> ¡El Usuario no esta disponible!</span>
                      </div>  
                  <div class="form-group">
                    <label class="control-label col-xs-5">Nombre de Usuario:</label>
                    <div class="col-xs-5">
                        <input title="Solo letras y números. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="usernamefac" maxlength="25" name="usernamefac" type="text" class="form-control" placeholder="Cree un nombre de usuario" onkeypress="kuser(event);" onkeyup="validaruser(this.value);validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>
                  <div class="alert alert-danger" id="falseEmail" style="display:none;">
                          <span class="glyphicon glyphicon-remove"></span><span> ¡El email no esta disponible!</span>
                      </div>  
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Correo:</label>
                    <div class="col-xs-5">
                        <input title="Ingrese su correo. Máximo 30 caracteres" data-toggle="tooltip" data-placement="top" id="email2fac" maxlength="30" name="email2fac" type="email" class="form-control" placeholder="Ingrese su correo" onkeypress="emailk(event)" onkeyup="validarfacilitador();validaremail(this.value);" onclick="validarfacilitador();validaremail(this.value);" onpaste="validarfacilitador();validaremail(this.value);" onchange="validarfacilitador();validaremail(this.value);" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Telefono:</label>
                    <div class="col-xs-5">
                        <input title="Solo números. Máximo 11 caracteres" data-toggle="tooltip" data-placement="top" id="telefonofac" maxlength="11" name="telefonofac" type="text" class="form-control" placeholder="Ejemplo 04141234567" onkeypress="numeros(event)" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>
                  <div style="display:none" class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="passfac" value="123456" maxlength="16" name="passfac" type="password" class="form-control" placeholder="Ingrese su contraseña" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>
                  <div style="display:none" class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2fac" value="123456" maxlength="16" name="pass2fac" type="password" class="form-control" placeholder="Repita su contraseña" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="circuitofac" class="control-label col-xs-5">Circuito:</label>
                    <div class="col-xs-5">
                      
                    	<select title="Seleccione el circuito a donde desea añadirlo" data-toggle="tooltip" data-placement="top" id="circuitofac" name="circuitofac" class="form-control" onkeyup="validarfacilitador();" onclick="validarfacilitador();" onpaste="validarfacilitador();" onchange="validarfacilitador();" required="true">
                    	<?php
						            require_once('../models/conexion.php');
                        $conexion3= new conexion();
                        $conexion3->conectar();
                        $sql2 = 'SELECT * FROM circuito cir';
                        $resultados2 = $conexion3->conexion->query($sql2);

                        while($filas=mysqli_fetch_array($resultados2)){
                              $sql3 = "SELECT * FROM usuarios u WHERE u.id_circuito='".$filas[0]."' AND u.level=1";
                              $resultados3 = $conexion3->conexion->query($sql3);
                              $aux = true;
                              while($filas2=mysqli_fetch_array($resultados3)){
                                $aux=false;
                              }
                              if($aux){
                                echo "<option value='".$filas[0]."'>".$filas[1]."</option>";
                              }
                          }
                        ?>                    
						          </select>

                    </div>
                    
                  </div>

           <input id="levelfac" name="levelfac" type="hidden" value="1">
           <center><label><strong style="color:red">Nota:</strong> El sistema añade por defecto "123456" como contraseña para el nuevo facilitador. Luego, esta puede ser cambiada por el usuario desde editar perfil</label></center>
                </form>
              </div>
              <div class="modal-footer">  
                <button onclick="limpiarnewfac();" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrarfac();limpiarnewfac();" type="button" id="actualizarfac" name="actualizarfac" class="btn btn-success" disabled="true">Registrar</button>
              </div>
            </div>
          </div>
        </div>