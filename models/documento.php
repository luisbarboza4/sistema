<?php 
	class documento
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function lista_doc($valor,$level,$circuito,$cantidad,$pag)
		{
			if($level==0){
				$sql = "SELECT d.id_documento, d.nombre_documento, d.fecha, d.extension, u.nombre_usuario,u.apellido_usuario,d.descripcion,u.id_usuario,u.level,u.id_circuito FROM documento d INNER JOIN usuarios u ON u.id_usuario=d.id_usuario WHERE d.nombre_documento like '%".$valor."%' OR u.nombre_usuario like '%".$valor."%' ORDER BY d.fecha DESC";
			}else{
				$sql = "SELECT d.id_documento, d.nombre_documento, d.fecha, d.extension, u.nombre_usuario,u.apellido_usuario,d.descripcion,u.id_usuario,u.level,u.id_circuito FROM documento d INNER JOIN usuarios u ON u.id_usuario=d.id_usuario WHERE (u.id_circuito='".$circuito."' OR u.level=0) AND (d.nombre_documento like '%".$valor."%' OR u.nombre_usuario like '%".$valor."%') ORDER BY d.fecha DESC";
			}
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
				/*if($level == 0){
					$arreglo[]=$re;
				}
				if($level == 1){
					if($circuito==$re[9] || $re[8]==0){
						$arreglo[]=$re;
					}
				}if($level == 2){
					$aux = false;
					if($re[8]==0){
						$aux = true;
					}else{
						$sql2 = "SELECT * FROM usuarios WHERE id_usuario='".$re[7]."' AND id_circuito='".$circuito."'";
						$resultados2 = $this->conexion->conexion->query($sql2);
						while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
							$aux = true;
						}
					}
				}
				if($aux){
					$arreglo[]=$re;
				}*/
			}
			return $arreglo;
			$this->conexion->cerrar();
		}	

		function cantidad_doc($valor,$level,$circuito)
		{
			//$aux = false;
			if($level==0){
				$sql = "SELECT d.id_documento, d.nombre_documento, d.fecha, d.extension, u.nombre_usuario,u.apellido_usuario,d.descripcion,u.id_usuario,u.level,u.id_circuito FROM documento d INNER JOIN usuarios u ON u.id_usuario=d.id_usuario WHERE d.nombre_documento like '%".$valor."%' OR u.nombre_usuario like '%".$valor."%' ORDER BY d.fecha DESC";
			}else{
				$sql = "SELECT d.id_documento, d.nombre_documento, d.fecha, d.extension, u.nombre_usuario,u.apellido_usuario,d.descripcion,u.id_usuario,u.level,u.id_circuito FROM documento d INNER JOIN usuarios u ON u.id_usuario=d.id_usuario WHERE (u.id_circuito='".$circuito."' OR u.level=0) AND (d.nombre_documento like '%".$valor."%' OR u.nombre_usuario like '%".$valor."%') ORDER BY d.fecha DESC";
			}
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
				/*if($level == 0){
					$arreglo[]=$re;
				}
				if($level == 1){
					if($circuito==$re[9] || $re[8]==0){
						$arreglo[]=$re;
					}
				}if($level == 2){
					$aux = false;
					if($re[8]==0){
						$aux = true;
					}else{
						$sql2 = "SELECT * FROM usuarios WHERE id_usuario='".$re[7]."' AND id_circuito='".$circuito."'";
						$resultados2 = $this->conexion->conexion->query($sql2);
						while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
							$aux = true;
						}
					}
				}
				if($aux){
					$arreglo[]=$re;
				}*/
			}
			return $arreglo;
			$this->conexion->cerrar();
		}	

		function permiso($id,$circuito){
			$sql = "SELECT * FROM usuarios WHERE id_usuario='".$id."' AND id_circuito='".$circuito."'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				return true;
			}
			return false;
			$this->conexion->cerrar();
		}

		function eliminar($id){
			$sql = "DELETE FROM documento WHERE id_documento='$id'";
			if(file_exists(dirname(dirname(__FILE__))."/views/archivo/".$id)){
				unlink(dirname(dirname(__FILE__))."/views/archivo/".$id);
			}
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();

		}
	}
?>