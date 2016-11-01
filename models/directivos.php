<?php 
	class directivo
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

				
		function registrar($nombres,$apellidos,$email,$telefono,$username,$password,$level,$circuito,$colegio){
			$pass= sha1($password);
			$sql="INSERT INTO usuarios VALUES(0,'$nombres','$apellidos','$email','$username','$pass','$level',null,null,'$circuito','$colegio','$telefono');";
			
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}

		function lista_directivos($valor,$circuito,$cantidad,$pag)
		{
			$sql = "SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.email_usuario, u.username, u.level, c.nombre_colegio, u.id_circuito FROM usuarios u INNER JOIN colegio c on c.id_colegio=u.id_colegio WHERE (u.id_circuito=".$circuito." AND u.level=2) AND (u.nombre_usuario like '%".$valor."%' OR u.apellido_usuario like '%".$valor."%' OR u.email_usuario like '%".$valor."%' OR c.nombre_colegio like '%".$valor."%') LIMIT ".$pag." OFFSET ".$cantidad."";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function cantidad_directivos($valor,$circuito)
		{
			$sql = "SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario, u.email_usuario, u.username, u.level, c.nombre_colegio, u.id_circuito FROM usuarios u INNER JOIN colegio c on c.id_colegio=u.id_colegio WHERE (u.id_circuito=".$circuito." AND u.level=2) AND (u.nombre_usuario like '%".$valor."%' OR u.apellido_usuario like '%".$valor."%' OR u.email_usuario like '%".$valor."%' OR c.nombre_colegio like '%".$valor."%')";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
		
	}
?>