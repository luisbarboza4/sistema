<?php
	
		require_once('../models/usuario.php');

		$boton=$_POST['boton'];

		switch ($boton) {
			case 'cerrar':
					session_start();
					session_destroy();
				break;
			case 'ingresar':

					$username    = addslashes($_POST['username']);
					$password 	 = addslashes($_POST['password']);

					$ins = new usuario();
					$array=$ins->identificar($username,$password);
					if ($array[0]==0) 
					{
						echo '0';
					}
					else
					{
						session_start();

						$_SESSION['ingreso']  	 = 'YES';
						$_SESSION['id']       	 = $array[0];
						$_SESSION['nombre']   	 = $array[1];
						$_SESSION['apellido'] 	 = $array[2];
						$_SESSION['email']   	 = $array[3];
						$_SESSION['username']    = $array[4];
						$_SESSION['level']    	 = $array[6];
						$_SESSION['circuito'] 	 = $array[9];
						$_SESSION['colegio']  	 = $array[10];
						if($array[6]!=0){
							$narray=$ins->nombres($array[6],$array[9],$array[10]);
							$_SESSION['ncircuito'] 	 = $narray[0];
							$_SESSION['ncolegio'] 	 = $narray[1];
						}
					}
				break;
				
				case 'buscar':
				
					$valor = $_POST['valor'];
					$cantidad = $_POST['cantidad'];
					$pag = $_POST['pag'];

					$inst  = new usuario();
					$r     = $inst -> lista_users($valor,$cantidad,$pag);
					echo json_encode($r);

				break;

				case 'cantidad':
				
					$valor = $_POST['valor'];

					$inst  = new usuario();
					$r     = $inst -> cantidad_users($valor);
					echo json_encode($r);

				break;

				case 'actualizar':

					$inst     = new usuario();

					$id       	 = $_POST['id'];
					$nombre   	 = $_POST['nombres'];
					$apellido 	 = $_POST['apellidos'];
					$email    	 = $_POST['email2'];
					$level       = $_POST['level'];


					if($inst->actualizar($id,$nombre,$apellido,$email,$level)){
						echo 'exito';
					}else{
						echo 'no se actualizo';
					}

				break;

				case 'eliminar':

				$id   = $_POST['id'];

				$inst = new usuario();

					if($inst->eliminar($id)){
						echo 'El usuario se eliminó correctamente';
					}else{
						echo 'No se puedo eliminar el usuario';
					}

				break;

				case 'editprofile':

				$id        = $_POST['id'];
				$nombres   = $_POST['nombres'];
				$apellidos = $_POST['apellidos'];
				$email     = $_POST['email'];
				$telefono  = $_POST['telefono'];
				$pregunta  = $_POST['preguntas'];		
				$respuesta = $_POST['respuestas'];
				
				$inst    = new usuario();

				if($inst->editprofile($id,$nombres,$apellidos,$email,$telefono,$pregunta,$respuesta)){
						echo 'exito';
					}else{
						echo 'noexito';
					}

				break;

				case 'changepass':

					$id = $_POST['id'];
					$valor = $_POST['pass'];

					$inst  = new usuario();
					$r     = $inst -> changepass($id,$valor);
					echo json_encode($r);

				break;

				case 'changepasslost':

					$username = $_POST['username'];
					$valor = $_POST['pass'];

					$inst  = new usuario();
					$r     = $inst -> changepasslost($username,$valor);
					echo json_encode($r);

				break;

				case 'editdatos':

					$valor = $_POST['id'];

					$inst  = new usuario();
					$r     = $inst -> consultar($valor);
					echo json_encode($r);

				break;

			default:
				break;
		}

		
?>