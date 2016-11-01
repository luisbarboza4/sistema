<?php
	
		require_once('../models/colegios.php');


		$boton=$_POST['boton'];
			
			switch ($boton) {
				case 'registrar':
					
					$nombre    = $_POST['nombrecol'];
					$direccion = $_POST['direccioncol'];
					$parroquia = $_POST['parroquiacol'];
					$circuito  = $_POST['circuitocol'];

					$instancia = new colegios();

					if($instancia->registrar($nombre,$direccion,$parroquia,$circuito))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}
				break;

				case 'actualizar':

					$inst      = new colegios();

					$id        = $_POST['id'];
					$nombre    = $_POST['nombrecole'];
					$direccion = $_POST['direccioncole'];
					$parroquia = $_POST['parroquiacole'];

					if($inst->actualizar($id,$nombre,$direccion,$parroquia)){
						echo 'exito';
					}else{
						echo 'no se actualizo';
					}
				break;

				case 'eliminar':
				
				$id   = $_POST['id'];
				$inst = new colegios();

					if($inst->eliminar($id)){
						echo 'El colegio se eliminó correctamente';
					}else{
						echo 'No se puedo eliminar el colegio, porque posee un directivo';
					}

				break;

				case 'buscar':

					$valor = $_POST['valor'];
					$circuito = $_POST['circuito'];
					$cantidad = $_POST['cantidad'];
					
					$inst  = new colegios();
					$r = $inst -> lista_colegios($valor,$circuito,$cantidad);
					echo json_encode($r);
				break;

				case 'buscarcol':

					$valor = $_POST['valor'];
					$cantidad = $_POST['cantidad'];
					$pag = $_POST['pag'];
					
					$inst  = new colegios();
					$r = $inst -> lista_coladmin($valor,$cantidad,$pag);
					echo json_encode($r);
				break;

				case 'cantidadcol':

					$valor = $_POST['valor'];
					
					$inst  = new colegios();
					$r = $inst -> cantidad_coleadmin($valor);
					echo json_encode($r);
				break;

				case 'cantidad':

					$valor = $_POST['valor'];
					$circuito = $_POST['circuito'];
					
					$inst  = new colegios();
					$r = $inst -> cantidad_colegios($valor,$circuito);
					echo json_encode($r);
				break;

							default:
				break;
		}

		
?>