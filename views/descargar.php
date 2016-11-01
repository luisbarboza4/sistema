<?php

        $valor= $_GET['id'];
        require_once('../models/conexion.php');
        $conexion= new conexion();
        $conexion->conectar();
        $sql = "SELECT id_documento, nombre_documento, extension FROM documento WHERE id_documento =".$valor."";
            $conexion->conexion->set_charset('utf8');
            $resultados = $conexion->conexion->query($sql);
            $id = "";
            $extension = "";
            while ($re=$resultados->fetch_array(MYSQL_NUM)) {
                $id=$re[0];
                $nombre=$re[1];
                $extension=$re[2];
            }
            //obtiene el nombre del archivo a descargar pasado por 'url'
            $file = $id;
            //seencuentra en el directorio 'export/' en el servidor
            $url = dirname(__FILE__)."/archivo/".$file;
            if(file_exists($url)){
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.$nombre.".".$extension);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($url));
                ob_clean();
                flush();
                readfile($url);
            }else{
                echo '<script>';
                echo 'alert("Archivo no disponible");';
                echo 'window.location.href = "documents.php";';
                echo '</script>';
            }
            exit;
?>
