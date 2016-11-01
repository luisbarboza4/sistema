<?php
	
		require_once('../models/documento.php');


		$boton=$_POST['boton'];

		switch ($boton) {
				case 'buscar':

					$valor = $_POST['valor'];
					$level = $_POST['level'];
					$circuito = $_POST['circuito'];
					$cantidad = $_POST['cantidad'];
					$pag = $_POST['pag'];
					$inst  = new documento();
					$r = $inst -> lista_doc($valor,$level,$circuito,$cantidad,$pag);
					echo json_encode($r);

				break;

				case 'permiso':

					$valor = $_POST['valor'];
					$circuito = $_POST['circuito'];

					$inst  = new documento();
					if($inst -> permiso($valor,$circuito)){
						echo "true";
					}else{
						echo "false";
					}


				break;

				case 'cantidad':

					$valor = $_POST['valor'];
					$level = $_POST['level'];
					$circuito = $_POST['circuito'];
					$inst  = new documento();
					$r = $inst -> cantidad_doc($valor,$level,$circuito);
					echo json_encode($r);

				break;

				case 'eliminar':

				$id   = $_POST['id'];
				
				$inst = new documento();

					if($inst->eliminar($id)){
						echo 'El documento se eliminó correctamente';
					}else{
						echo 'No se puedo eliminar el documento';
					}

				break;

			default:
				break;
		}

		
?>