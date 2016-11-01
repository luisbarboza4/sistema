<?php
    if(!isset($_SESSION['img'])){      
      if(file_exists(dirname(dirname(__FILE__))."/imgperfil/".$_SESSION['id'])){
        $_SESSION['img'] = "imgperfil/".$_SESSION['id'];
      }else{
        $_SESSION['img'] = "imgperfil/perfil.png";
      }
    }
?>
<nav id="top-menu" class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Circuitos Educativos TEG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        

        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
             <i class="fa fa-comments-o"></i>
               Mensajes 
             <span class="bubble">12</span>
          </a>
        </li>-->

        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--<span><img id="img3" src="<?php echo  $_SESSION['img'] ?>" class="" style="width:25%;height:25%;max-width:50px; max-height:50px;"></img></span>-->
                        <strong><?php
                                $username = $_SESSION['nombre'];
                                echo ucwords($username);
                                ?>
                        </strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <!--<div class="col-lg-4">
                                        <p class="text-center">
                                            <img id="img2" src="<?php //echo  $_SESSION['img'] ?>" class="" style="width:100%;height:100%;max-width:150px; max-height:150px;"></img>
                                        </p>
                                    </div>-->
                                    <div class="col-lg-12">
                                    
                                        <p class="text-left"><strong><?php
                                                                        $username = $_SESSION['nombre'];
                                                                        $usernamea = $_SESSION['apellido'];
                                                                        $mix = $username ." ". $usernamea;
                                                                        echo ucwords($mix);
                                                                        ?>
                                                            </strong></p>
                                        <p class="text-left small"> <strong>Email: </strong><?php
                                                                                $email = $_SESSION['email'];
                                                                                echo ($email);
                                                                                            ?>

                                                                                   </p>
                                        <p class="text-left small"> <strong>Cargo: </strong><?php if($_SESSION['level']==0){
                                                                                   echo "Administrador";
                                                                                   }elseif ($_SESSION['level']==1) {
                                                                                   echo "Facilitador";
                                                                                   }elseif ($_SESSION['level']==2) {
                                                                                   echo "Director";
                                                                                   }?>
                                                                                   </p>

                                        <p class="text-left">
                                            <a href="editprofile.php" class="btn btn-primary btn-block btn-sm"><span class="glyphicon glyphicon-cog"></span> Editar Perfil</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="javascript: void(0)" onclick='cerrar();' class="btn btn-danger btn-block">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- /top memu -->