
   <div class="col-md-3">

        <div class="panel panel-default">
         <div class="panel-heading">
            <i class="fa fa-bars"></i> Menu
            <i class="showmenu fa fa-angle-up pull-right"></i>
         </div>
          <div id="sider-menu" class="panel-body">
  
                 <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                 <a href="documents.php"><i class="fa fa-folder-open-o"></i> Archivos</a>
                 <?php if($_SESSION['level']!=0){
                               ?><a href="chat.php"><i class="fa fa-comments-o"></i> Chat</a><?php
                               }else {
                               }?>
                 <a href="calendario.php"><i class="fa fa-calendar-check-o"></i> Planificador</a>                 
                 <?php if($_SESSION['level']==0){
                               ?><a href="circuitos.php"><i class="fa fa-feed"></i> Circuitos</a><?php
                               }elseif ($_SESSION['level']==1) {
                               ?><a href="colegios.php"><i class="fa fa-university"></i> Colegios</a><?php
                               }?>
                 <?php if($_SESSION['level']==0){
                               ?><a href="colegiosadmin.php"><i class="fa fa-university"></i> Colegios</a><?php
                               }?>          
                 <?php if($_SESSION['level']==0){
                               ?><a href="userslist.php"><i class="fa fa-users"></i> Usuarios</a><?php
                               }elseif ($_SESSION['level']>0) {
                               ?><a href="dirlist.php"><i class="fa fa-users"></i> Directivos</a><?php
                               }?>
                               <a href="contact.php"><i class="fa fa-comments-o"></i> Contacto</a>
          </div>
        </div>
   </div>

