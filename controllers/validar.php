<?php
	
		require_once('../models/validaciones.php');

		$boton=$_POST['boton'];
			
			switch ($boton) {
				case 'username':
					
					$valor    = $_POST['valor'];

					$instancia = new validar();
					if($instancia->username($valor))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;

				case 'email':
				
						$valor    = $_POST['valor'];

					$instancia = new validar();
					if($instancia->email($valor))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;
				case 'emailp':
				
						$valor = $_POST['valor'];
						$id    = $_POST['id'];

					$instancia = new validar();
					if($instancia->emailp($valor,$id))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;

				case 'nombrecole':
				
				$valor    = $_POST['valor'];

					$instancia = new validar();
					if($instancia->nombrecole($valor))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;
				case 'nombrecole2':
				
					$valor    = $_POST['valor'];
					$id    = $_POST['id'];

					$instancia = new validar();
					if($instancia->nombrecole2($valor,$id))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;

				case 'nombrecir':

					$valor    = $_POST['valor'];

					$instancia = new validar();
					if($instancia->nombrecir($valor))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;
				case 'nombrecir2':

					$valor    = $_POST['valor'];
					$id    = $_POST['id'];

					$instancia = new validar();
					if($instancia->nombrecir2($valor,$id))
					{
						echo "exito";
					}
					else{
						echo "noexito";
					}

				break;

							default:
				break;
		}

		
?>