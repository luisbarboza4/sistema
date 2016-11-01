<?php 
	class colegios
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function registrar($nombre,$direccion,$parroquia,$circuito){
			$sql="INSERT INTO colegio VALUES(0,'$nombre','$direccion','$parroquia','$circuito')";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}

		function lista_colegios($valor,$circuito,$cantidad)
		{
			$sql = "SELECT c.id_colegio, c.nombre_colegio, c.direccion_colegio, p.parroquia, c.id_circuito, p.id_parroquia FROM colegio c INNER JOIN parroquia p on p.id_parroquia = c.id_parroquia WHERE c.id_circuito=".$circuito." AND (c.nombre_colegio like '%".$valor."%' or c.direccion_colegio like '%".$valor."%' or p.parroquia like '%".$valor."%') LIMIT 10 OFFSET ".$cantidad."";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function lista_coladmin($valor,$cantidad,$pag)
		{
			$sql = "SELECT c.id_colegio, c.nombre_colegio, c.direccion_colegio, p.parroquia, cir.nombre_circuito FROM colegio c INNER JOIN parroquia p on p.id_parroquia=c.id_parroquia INNER JOIN circuito cir on cir.id_circuito=c.id_circuito WHERE nombre_colegio like '%".$valor."%' or direccion_colegio like '%".$valor."%' LIMIT ".$pag." OFFSET ".$cantidad."";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function cantidad_coleadmin($valor)
		{
			$sql = "SELECT c.id_colegio, c.nombre_colegio, c.direccion_colegio, p.parroquia, cir.nombre_circuito FROM colegio c INNER JOIN parroquia p on p.id_parroquia=c.id_parroquia INNER JOIN circuito cir on cir.id_circuito=c.id_circuito WHERE nombre_colegio like '%".$valor."%' or direccion_colegio like '%".$valor."%'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function cantidad_colegios($valor,$circuito)
		{
			$sql = "SELECT c.id_colegio, c.nombre_colegio, c.direccion_colegio, p.parroquia, c.id_circuito, p.id_parroquia FROM colegio c INNER JOIN parroquia p on p.id_parroquia = c.id_parroquia WHERE c.id_circuito=".$circuito." AND (c.nombre_colegio like '%".$valor."%' or c.direccion_colegio like '%".$valor."%' or p.parroquia like '%".$valor."%')";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

			function eliminar($id){
			$sql2 = "SELECT * FROM usuarios WHERE id_colegio='$id'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql2);
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				return false;
			}
			$sql = "DELETE FROM colegio WHERE id_colegio='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();

		}

		function actualizar($id,$nombre,$direccion,$parroquia){
			$sql="UPDATE colegio SET nombre_colegio = '$nombre', direccion_colegio = '$direccion', id_parroquia = '$parroquia' WHERE id_colegio='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();
		}


		

			}
?>
