<?php 
	class circuitos
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function lista_circuitos($valor,$cantidad)
		{
			$sql = "SELECT c.id_circuito, c.nombre_circuito, e.estado, e.id_estado FROM circuito c INNER JOIN estado e on e.id_estado = c.id_estado WHERE c.nombre_circuito like '%".$valor."%' or e.estado like '%".$valor."%' LIMIT 10 OFFSET ".$cantidad."";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$cont = 0;
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[$cont][0]=$re[0];
				$arreglo[$cont][1]=$re[1];
				$arreglo[$cont][2]=$re[2];
				$arreglo[$cont][5]=$re[3];
				$sql2 = "SELECT u.nombre_usuario,u.apellido_usuario FROM usuarios u WHERE u.id_circuito='".$re[0]."' AND u.level = 1";
				$this->conexion->conexion->set_charset('utf8');
				$resultados2 = $this->conexion->conexion->query($sql2);
				while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
					$arreglo[$cont][3]=$re2[0];
					$arreglo[$cont][4]=$re2[1];
				}
				$cont++;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function cantidad_circuitos($valor)
		{
			$sql = "SELECT c.id_circuito, c.nombre_circuito, e.estado, e.id_estado FROM circuito c INNER JOIN estado e on e.id_estado = c.id_estado WHERE c.nombre_circuito like '%".$valor."%' or e.estado like '%".$valor."%'";
			
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$cont = 0;
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[$cont][0]=$re[0];
				$arreglo[$cont][1]=$re[1];
				$arreglo[$cont][2]=$re[2];
				$arreglo[$cont][5]=$re[3];
				$sql2 = "SELECT u.nombre_usuario,u.apellido_usuario FROM usuarios u WHERE u.id_circuito='".$re[0]."' AND u.level = 1";
				$this->conexion->conexion->set_charset('utf8');
				$resultados2 = $this->conexion->conexion->query($sql2);
				while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
					$arreglo[$cont][3]=$re2[0];
					$arreglo[$cont][4]=$re2[1];
				}
				$cont++;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

			function eliminar($id){
			$sql = "DELETE FROM circuito WHERE id_circuito='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();

		}

		function actualizar($id,$nombre,$estado){
			$sql="UPDATE circuito SET nombre_circuito = '$nombre', id_estado = '$estado' WHERE id_circuito='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();
		}


		function registrar($nombre,$estado){
			$sql="INSERT INTO circuito VALUES(0,'$nombre','$estado')";
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
