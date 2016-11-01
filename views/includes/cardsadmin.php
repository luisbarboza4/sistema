			 <div class="col-sm-3">
                        <div class="cards">
                            <div class="content">                                
                                <h3>Usuarios</h3>
                                <?php   
                                    require_once('../models/conexion.php');
                                    $conexion= new conexion();
                                    $conexion->conectar();
                                    $sql = 'SELECT id_usuario FROM usuarios WHERE level != 0';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados = $conexion->conexion->query($sql);
                                    $users = mysqli_num_rows($resultados);
                                ?>
                                <h4><span class="glyphicon glyphicon-user"></span>  <?php echo $users; ?></h4>
                                <a href="userslist.php" type="button" class="btn btn-default"><strong>Ver Usuarios</strong></a>
                            </div>
                        </div>
                    </div>

			<div class="col-sm-3">
                        <div class="cardscir">
                            <div class="content">
                                <h3>Circuitos</h3>
                                <?php
                                    $sql2 = 'SELECT id_circuito FROM circuito';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados2 = $conexion->conexion->query($sql2);
                                    $circuitos = mysqli_num_rows($resultados2);
                                ?>
                                <h4><span class="glyphicon glyphicon-globe"></span>  <?php echo $circuitos; ?></h4>
                                <a href="circuitos.php" type="button" class="btn btn-default"><strong>Ver Circuitos</strong></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="cardscol">
                            <div class="content">
                                <h3>Colegios</h3>
                                <?php
                                    $sql3 = 'SELECT * FROM colegio';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados3 = $conexion->conexion->query($sql3);
                                    $colegios = mysqli_num_rows($resultados3);
                                ?>
                                <h4><span class="glyphicon glyphicon-home"></span>  <?php echo $colegios; ?></h4>
                                <a href="colegiosadmin.php" type="button" class="btn btn-default"><strong>Ver Colegios</strong></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="cardsdoc">
                            <div class="content">
                                <h3>Archivos</h3>
                               <?php
                                    $sql4 = 'SELECT id_documento FROM documento';
                                    $conexion->conexion->set_charset('utf8');
                                    $resultados4 = $conexion->conexion->query($sql4);
                                    $documentos = mysqli_num_rows($resultados4);
                                    $conexion->conexion->close();
                                ?>
                                <h4><span class="glyphicon glyphicon-folder-open">  </span> <?php echo $documentos; ?></h4>
                                <a href="documents.php" type="button" class="btn btn-default"><strong>Ver Archivos</strong></a>
                            </div>
                        </div>
                    </div>