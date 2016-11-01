        <div class="modal fade" id="editcolegio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Modificar Datos</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Colegio modificado correctamente!</span>
                </div>
                <div class="alert alert-danger" id="noexito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo modificar el Colegio!</span>
                </div>
                <form class="form-horizontal" id="editcolegioform">
                  <div class="form-group">
                    <div class="col-xs-5">
                      <input id="id" name="id" type="hidden" class="form-control">
                    </div>
                    </div>
                    <div class="alert alert-danger" id="falseColegio2" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span>¡Nombre de Colegio no disponible!</span>
                  </div>
                    <div class="form-group" id="nombre">
                    <label for="nombrecole" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                      <input id="nombrecole" name="nombrecole" type="text" maxlength="25" class="form-control" placeholder="nombre de colegio" onkeypress="ncol(event);" onkeyup="validarnombrecole2();validarcole();" onclick="validarnombrecole2();validarcole();" onpaste="validarnombrecole2();validarcole();" onchange="validarnombrecole2();validarcole();" required="true">
                    </div>
                  </div>
                  <div class="form-group" id="direccion">
                    <label for="direccioncole" class="control-label col-xs-5">Direccion:</label>
                    <div class="col-xs-5">
                      <input id="direccioncole" name="direccioncole" type="text" maxlength="50" class="form-control" placeholder="Ingrese direccion" onkeypress="vdireccion(event);" onkeyup="validarcole();" onclick="validarcole();" onpaste="validarcole();" onchange="validarcole();" required="true">
                    </div>
                  </div>
                  <div class="form-group" id="parroquia">
                    <label for="parroquia" class="control-label col-xs-5">Parroquia:</label>
                    <div class="col-xs-5">
                      <select id="parroquiacole" name="parroquiacole" class="form-control" onchange="validarcole();" onclick="validarcole();">
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
                </form>
              </div>
              <div class="modal-footer">  
                <button onclick="limpiareditcole();" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="guardar();limpiareditcole();" type="button" id="actualizar" name="actualizar" class="btn btn-success" disabled="true">Actualizar</button>
              </div>
            </div>
          </div>
        </div>