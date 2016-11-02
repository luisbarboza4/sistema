<?php 
	class usuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function identificar($username,$password)
		{
			$pass=sha1($password);
			$sql="SELECT * FROM usuarios WHERE username='$username' && pass_usuario='$pass'";
			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows > 0) {
				$r=$resulatdos->fetch_array();
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}
		
		function registrar($nombre,$apellido,$email,$password,$level){
			$pass= sha1($password);
			$sql="INSERT INTO usuarios VALUES(0,'$nombre','$apellido','$email','$pass','$level',null)";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}

		function lista_users($valor,$cantidad,$pag)
		{
			$sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, email_usuario, username, level, id_colegio, id_circuito, telefono FROM usuarios WHERE level!=0 AND (nombre_usuario like '%".$valor."%' or apellido_usuario like '%".$valor."%' or email_usuario like '%".$valor."%' or username like '%".$valor."%') ORDER BY level ASC LIMIT ".$pag." OFFSET ".$cantidad."";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$aux=0;
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[$aux][0]=$re[0];
				$arreglo[$aux][1]=$re[1];
				$arreglo[$aux][2]=$re[2];
				$arreglo[$aux][3]=$re[3];
				$arreglo[$aux][4]=$re[4];
				$arreglo[$aux][5]=$re[5];
				$arreglo[$aux][8]=$re[8];
				if($re[6]==null){
					$sql2 = "SELECT nombre_circuito FROM circuito  WHERE id_circuito ='".$re[7]."'";
					$resultados2 = $this->conexion->conexion->query($sql2);
					while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
						$arreglo[$aux][6] = $re2[0];
					}
				}else{
					$sql2 = "SELECT nombre_colegio FROM colegio  WHERE id_colegio='".$re[6]."'";
					$resultados2 = $this->conexion->conexion->query($sql2);
					while ($re2=$resultados2->fetch_array(MYSQL_NUM)) {
						$arreglo[$aux][6] = $re2[0];
					}
				}
				$aux = $aux + 1;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function cantidad_users($valor)
		{
			$sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, email_usuario, username, level, id_colegio, id_circuito, telefono FROM usuarios WHERE level!=0 AND (nombre_usuario like '%".$valor."%' or apellido_usuario like '%".$valor."%' or email_usuario like '%".$valor."%' or username like '%".$valor."%') ORDER BY level ASC";
			$this->conexion->conexion->set_charset('utf8');
			$resultados = $this->conexion->conexion->query($sql);
			$arreglo = array();
			$aux=0;
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[$aux][0]=$re[0];
				$arreglo[$aux][1]=$re[1];
				$arreglo[$aux][2]=$re[2];
				$arreglo[$aux][3]=$re[3];
				$arreglo[$aux][4]=$re[4];
				$arreglo[$aux][5]=$re[5];
				$arreglo[$aux][8]=$re[8];
				$aux = $aux + 1;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}

		function actualizar($id,$nombre,$apellido,$email,$level){
			$sql="UPDATE usuarios SET nombre_usuario = '$nombre', apellido_usuario = '$apellido', email_usuario = '$email', level = '$level' WHERE id_usuario='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();
		}


		function changepass($id,$pass){
			$password= sha1($pass);
			$sql="UPDATE usuarios SET pass_usuario = '$password' WHERE id_usuario='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();
		}

		function changepasslost($username,$pass){
			$password= sha1($pass);
			$sql="UPDATE usuarios SET pass_usuario = '$password' WHERE username='$username'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();
		}

		function eliminar($id){
			$sql = "DELETE FROM usuarios WHERE id_usuario='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();

		}

		function nombres($level,$id_circuito,$id_colegio){
				if($level==1){
					$sql = "SELECT cir.nombre_circuito FROM circuito cir WHERE cir.id_circuito='$id_circuito'";
				}
				if($level==2){
					$sql = "SELECT cir.nombre_circuito,co.nombre_colegio FROM circuito cir, colegio co WHERE cir.id_circuito='$id_circuito' AND co.id_colegio='$id_colegio'";
				}
				$this->conexion->conexion->set_charset('utf8');
				$resultados = $this->conexion->conexion->query($sql);
				$arreglo = array();
				while ($re=$resultados->fetch_array(MYSQL_NUM)) {
					$arreglo[0]=$re[0];
					$arreglo[1]=$re[1];
				}
				return $arreglo;
				$this->conexion->cerrar();
		}

		function editprofile($id,$nombres,$apellidos,$email,$telefono,$pregunta,$respuesta){
			$sql = "UPDATE usuarios SET nombre_usuario = '$nombres', apellido_usuario = '$apellidos', email_usuario = '$email', telefono='$telefono', pregunta_secreta = '$pregunta', respuesta_secreta = '$respuesta' WHERE id_usuario = '$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}$this->conexion->cerrar();

		}

		function consultar($id)
		{
			$sql="SELECT nombre_usuario, apellido_usuario, email_usuario, pregunta_secreta, respuesta_secreta,telefono FROM usuarios WHERE id_usuario='$id'";
			$resultados = $this->conexion->conexion->query($sql);
			if ($resultados->num_rows > 0) {
				while($r=$resultados->fetch_assoc()){
					$data[0]=$r['nombre_usuario'];
					$data[1]=$r['apellido_usuario'];
					$data[2]=$r['email_usuario'];
					$data[5]=$r['telefono'];
					if($r['pregunta_secreta']!=null){
						$data[3]=$r['pregunta_secreta'];
					}else $data[3]="";
					if($r['respuesta_secreta']!=null){
						$data[4]=$r['respuesta_secreta'];
					}else $data[4]="";
				}
				return $data;
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}
	
	}
?>