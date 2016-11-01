<?php 
	class validar
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function username($valor)
		{
			$sql = "SELECT * FROM usuarios u WHERE u.username ='".$valor."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}

		function email($valor)
		{
			$sql = "SELECT * FROM usuarios u WHERE u.email_usuario ='".$valor."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}
		function emailp($valor,$id)
		{
			$sql = "SELECT * FROM usuarios u WHERE u.email_usuario ='".$valor."' AND u.id_usuario!='".$id."'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}

		function nombrecole($valor)
		{
			$sql = "SELECT * FROM colegio c WHERE c.nombre_colegio ='".$valor."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}

		function nombrecole2($valor,$id)
		{
			$sql = "SELECT * FROM colegio c WHERE c.nombre_colegio ='".$valor."' AND c.id_colegio!='".$id."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}


		function nombrecir($valor)
		{
			$sql = "SELECT * FROM circuito c WHERE c.nombre_circuito ='".$valor."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}

		function nombrecir2($valor,$id)
		{
			$sql = "SELECT * FROM circuito c WHERE c.nombre_circuito ='".$valor."' AND c.id_circuito!='".$id."'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while($re=$resultados->fetch_array(MYSQL_NUM)){
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}


			}
?>
