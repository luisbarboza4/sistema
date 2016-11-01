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