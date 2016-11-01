        <div class="modal fade" id="editcircuito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Modificar Datos</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡Circuito editado correctamente!</span>
                </div>
                <div class="alert alert-danger" id="noexito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo editar el circuito!</span>
                </div>
                <form class="form-horizontal" id="editcircuitoform">
                  <div class="form-group">
                    <div class="col-xs-5">
                      <input id="id" name="id" type="hidden" class="form-control">
                    </div>
                    </div>
                    <div class="alert alert-danger" id="falseCircuito2" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span>¡Nombre de Circuito no disponible!</span>
                    </div>
                    <div class="form-group" id="nombres">
                    <label for="nombrescire" class="control-label col-xs-5">Nombres:</label>
                    <div class="col-xs-5">
                      <input title="Puede contener letras y números. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombrescire" maxlength="25" name="nombrescire" type="text" class="form-control" placeholder="Ingrese sus Nombres" onkeypress="ncir(event)" onkeyup="validarnombrecir2();validarcir();" onclick="validarnombrecir2();validarcir();" onpaste="validarnombrecir2();validarcir();" onchange="validarnombrecir2();validarcir();" required="true">
                    </div>
                  </div>
                  <div class="form-group" id="estado">
                    <label for="estadocire" class="control-label col-xs-5">Estado:</label>
                    <div class="col-xs-5">
                        <select name="estadocire" id="estadocire" class="form-control" onchange="validarcir();" onclick="validarcir();">                        
                        <?php
                        require_once('../models/conexion.php');
                        $conexion3= new conexion();
                        $conexion3->conectar();
                        $sql2 = 'SELECT * FROM estado';
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
                <button onclick="limpiareditcir();" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="guardar();limpiareditcir();" type="button" id="actualizar" name="actualizar" class="btn btn-success" disabled="true">Actualizar</button>
              </div>
            </div>
          </div>
        </div>