        <div class="modal fade" id="colegio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Datos del Colegio</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exitocol" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡El colegio se ha registrado con exito!</span>
                </div>
                <div class="alert alert-danger" id="noexitocol" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo registrar el colegio!</span>
                </div>
                 <div class="alert alert-danger" id="falseColegio" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span>¡Nombre de Colegio no disponible!</span>
                  </div>
                <form class="form-horizontal" id="formColegio">                 
                  <div class="form-group">
                    <label for="nombre" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                      <input title="Solo letras. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombrecol" maxlength="25" name="nombrecol" type="text" class="form-control" placeholder="Ingrese nombre del colegio" onkeypress="ncol(event);" onkeyup="validarnombrecole();validarcole2();" onclick="validarnombrecole();validarcole2();" onpaste="validarnombrecole();validarcole2();" onchange="validarnombrecole();validarcole2();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion" class="control-label col-xs-5">Direccion:</label>
                    <div class="col-xs-5">
                      <input title="Puede contener letras, números y simbolos. Máximo 50 caracteres" data-toggle="tooltip" data-placement="top" id="direccioncol" maxlength="50" name="direccioncol" type="text" class="form-control" placeholder="Ingrese direccion del colegio" onkeypress="vdireccion(event);" onkeyup="validarcole2();" onclick="validarcole2();" onpaste="validarcole2();" onchange="validarcole2();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="parroquia" class="control-label col-xs-5">Parroquia:</label>
                    <div class="col-xs-5">
                      <select id="parroquiacol" name="parroquiacol" class="form-control" onchange="validarcole2();" onclick="validarcole2();">
                        <?php
                        require_once('../models/conexion.php');
                        $conexion3= new conexion();
                        $conexion3->conectar();
                        $sql2 = 'SELECT p.* FROM parroquia p INNER JOIN ciudad c on c.id_ciudad=p.id_ciudad INNER JOIN estado e on e.id_estado=c.id_estado INNER JOIN circuito cir on cir.id_estado=e.id_estado WHERE cir.id_circuito = '.$_SESSION['circuito'].' ORDER BY p.parroquia';
                        $resultados2 = $conexion3->conexion->query($sql2);

                        while($filas=mysqli_fetch_array($resultados2)){

                              echo "<option value='".$filas[0]."'>".$filas[1]."</option>";
                          }
                        ?>                       
                      </select>
                    </div>
                  </div>
                        <input name="circuitocol" id="circuitocol" class="form-control" type="hidden" value = <?php echo $_SESSION['circuito'];?>>                        
                  </form>
              </div>
              <div class="modal-footer">  
                <button onclick="limpiarnewcole();" type="reset" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
                <button onclick="registrar();limpiarnewcole();" type="button" id="actualizar2" name="actualizar2" class="btn btn-success" disabled="true">Registrar</button>
              </div>
            </div>
          </div>
        </div>