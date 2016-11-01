        <div class="modal fade" id="circuito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h2 class="modal-title"><center>Datos del Circuito</center></h2>
              </div>
              <div class="modal-body">
                 <div class="alert alert-success" id="exitocir" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡El circuito se ha registrado!</span>
                </div>
                <div class="alert alert-danger" id="noexitocir" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>¡No se pudo registrar!</span>
                </div>
                <form class="form-horizontal" id="formCircuito">
                  <div class="alert alert-danger" id="falseCircuito" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span>¡Nombre de Circuito no disponible!</span>
                  </div>
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                      <input title="Puede contener letras y números. Máximo 25 caracteres" data-toggle="tooltip" data-placement="top" id="nombrescir" maxlength="25" name="nombrescir" type="text" class="form-control" placeholder="Ingrese nombre del circuito" onkeypress="ncir(event)" onkeyup="validarnombrecir();validarcir2();" onclick="validarnombrecir();validarcir2();" onpaste="validarnombrecir();validarcir2();" onchange="validarnombrecir();validarcir2();" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="estado" class="control-label col-xs-5">Estado:</label>
                    <div class="col-xs-5">
                        <select name="estadocir" id="estadocir" class="form-control" onchange="validarcir2();" onclick="validarcir2();">                        
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
                <button onclick="limpiarnewcir();" type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();limpiarnewcir();" type="button" id="actualizar2" name="actualizar2" class="btn btn-success" disabled="true">Registrar</button>
              </div>
            </div>
          </div>
        </div>