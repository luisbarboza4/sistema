<?php
	
		require_once('../models/circuitos.php');

		$boton=$_POST['boton'];
			
			switch ($boton) {
				case 'registrar':
					
					$nombre    = $_POST['nombrescir'];
					$estado    = $_POST['estadocir'];

					$instancia = new circuitos();
					if($instancia->registrar($nombre,$estado))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;

				case 'actualizar':
				
						$inst      = new circuitos();

						$id        = $_POST['id'];
						$nombre    = $_POST['nombrescire'];
						$estado    = $_POST['estadocire'];


					if($inst->actualizar($id,$nombre,$estado)){
						echo 'exito';
					}else{
						echo 'no se actualizo';
					}
				break;

				case 'eliminar':
				
				$id = $_POST['id'];
				$inst = new circuitos();

					if($inst->eliminar($id)){
						echo 'El circuito se eliminó correctamente';
					}else{
						echo 'No se puedo eliminar el circuito, debido a que posee contenido';
					}

				break;

				case 'buscar':

					$valor = $_POST['valor'];
					$cantidad = $_POST['cantidad'];
					$inst  = new circuitos();

					$r = $inst -> lista_circuitos($valor,$cantidad);

					echo json_encode($r);
					
				break;

				case 'cantidad':

					$valor = $_POST['valor'];
					$inst  = new circuitos();

					$r = $inst -> cantidad_circuitos($valor);

					echo json_encode($r);
					
				break;

							default:
				break;
		}

		
?>