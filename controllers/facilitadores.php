<?php
	
		require_once('../models/facilitadores.php');


		$boton=$_POST['boton'];

		switch ($boton) {
							
				case 'registrar':
					
					$nombres   		 = $_POST['nombresfac'];
					$apellidos 		 = $_POST['apellidosfac'];
					$email     		 = $_POST['emailfac'];
					$telefono     	 = $_POST['telefonofac'];
					$username    	 = $_POST['usernamefac'];
					$password  		 = $_POST['passwordfac'];
					$level     		 = $_POST['levelfac'];
					$circuito  		 = $_POST['circuitofac'];

					$instancia = new facilitador();
					if($instancia->registrar($nombres,$apellidos,$email,$telefono,$username,$password,$level,$circuito))
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