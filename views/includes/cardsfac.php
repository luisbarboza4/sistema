             <div class="col-sm-4">
                        <div class="cards">
                            <div class="content">                                
                                <h3>Directivos</h3>
                                <?php   
                                    require_once('../models/conexion.php');
                                    $conexion= new conexion();
                                    $conexion->conectar();
                                    $sql = 'SELECT id_usuario FROM usuarios WHERE level = 2 AND id_circuito = '.$circuito.'';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados = $conexion->conexion->query($sql);
                                    $users = mysqli_num_rows($resultados);
                                ?>
                                <h4><span class="glyphicon glyphicon-user"></span>  <?php echo $users; ?></h4>
                                <a href="dirlist.php" type="button" class="btn btn-default"><strong>Ver Directivos</strong></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="cardscol">
                            <div class="content">
                                <h3>Colegios</h3>
                                <?php
                                    $sql3 = 'SELECT nombre_colegio FROM colegio WHERE id_circuito = '.$circuito.'';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados3 = $conexion->conexion->query($sql3);
                                    $colegios = mysqli_num_rows($resultados3);
                                ?>
                                <h4><span class="glyphicon glyphicon-home"></span>  <?php echo $colegios; ?></h4>
                                <a href="colegios.php" type="button" class="btn btn-default"><strong>Ver Colegios</strong></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="cardsdoc">
                            <div class="content">
                                <h3>Archivos</h3>
                               <?php
                                    $sql4 = 'SELECT * FROM documento d INNER JOIN usuarios u ON u.id_usuario = d.id_usuario WHERE u.id_circuito = "'.$circuito.'" OR u.level=0';

                                    $conexion->conexion->set_charset('utf8');
                                    $resultados4 = $conexion->conexion->query($sql4);
                                    $documentos = mysqli_num_rows($resultados4);
                                    $conexion->conexion->close();
                                ?>
                                <h4><span class="glyphicon glyphicon-folder-open"> </span>  <?php echo $documentos; ?></h4>
                                <a href="documents.php" type="button" class="btn btn-default"><strong>Ver Archivos</strong></a>
                            </div>
                        </div>
                    </div>