<?php 
    class Conexion {
        function conectar(){
            $conexion = mysqli_connect("localhost","root","","phpguia") or die("Error en:".mysqli_error($conexion));
            mysqli_query($conexion , "SET NAMES 'utf8'");
            return $conexion;
        }

        function desconectar($conexion){
            mysqli_close($conexion);
        }
    }
?>