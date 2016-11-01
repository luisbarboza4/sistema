<?php 
	class facilitador
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

				
		function registrar($nombres,$apellidos,$email,$telefono,$username,$password,$level,$circuito){
			$pass= sha1($password);
			$sql="INSERT INTO usuarios VALUES(0,'$nombres','$apellidos','$email','$username','$pass','$level',null,null,'$circuito',null,'$telefono');";
			
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}

		
	}
?>