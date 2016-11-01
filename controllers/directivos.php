<?php
	
		require_once('../models/directivos.php');


		$boton=$_POST['boton'];

		switch ($boton) {
							
				case 'registrar':
					
					$nombres 	= $_POST['nombresdir'];
					$apellidos 	= $_POST['apellidosdir'];					
					$email 		= $_POST['emaildir'];
					$telefono	= $_POST['telefonodir'];
					$username 	= $_POST['usernamedir'];
					$password 	= $_POST['passworddir'];
					$level 		= $_POST['leveldir'];
					$circuito 	= $_POST['circuitodir'];
					$colegio 	= $_POST['colegiodir'];

					$instancia = new directivo();
					if($instancia->registrar($nombres, $apellidos, $email,$telefono, $username, $password, $level, $circuito, $colegio))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}
				break;

				case 'buscar':

					$valor = $_POST['valor'];
					$circuito = $_POST['circuito'];
					$cantidad = $_POST['cantidad'];
					$pag = $_POST['pag'];

					$inst  = new directivo();
					$r     = $inst -> lista_directivos($valor,$circuito,$cantidad,$pag);
					echo json_encode($r);

				break;

				case 'cantidad':

					$valor = $_POST['valor'];
					$circuito = $_POST['circuito'];

					$inst  = new directivo();
					$r     = $inst -> cantidad_directivos($valor,$circuito);
					echo json_encode($r);

				break;


				
			default:
				break;
		}

		
?>