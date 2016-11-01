<?php	
		require_once('../models/chat.php');
		$boton=$_POST['boton'];

		switch ($boton) {
							
				case 'delete':
					
					$circuito 	= $_POST['circuito'];

					$instancia = new chat();
					if($instancia->delete($circuito))
					{
					}
					else{
						echo "No se pudo borrar el historial";
					}
				break;

			default:
				break;
		}		
?>