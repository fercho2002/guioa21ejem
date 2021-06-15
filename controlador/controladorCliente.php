<?php 
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/cliente.php");

    $opcion = $_POST["fEnviar"];
    $idCliente = $_POST["fIdCliente"];
    $nombreCliente = $_POST["fNombreCliente"];
    $documentoCliente = $_POST["fDocumentoCliente"];
    $correoCliente = $_POST["fCorreoCliente"];

    $nombreCliente = htmlspecialchars($nombreCliente);
    $documentoCliente = htmlspecialchars($documentoCliente);
    $correoCliente = htmlspecialchars($correoCliente);

    $objetoCliente = new cliente($conexion,$idCliente,$nombreCliente,$documentoCliente,$correoCliente);
    header("location:../vista/formularioCliente.php?msj=0");

    switch($opcion){
        
        case "Ingresar":
            header("location:../vista/formularioCliente.php?msj=2");
            $objetoCliente->insertar();
            $mensaje = "Ingresado";
            break;
        case "Modificar":
            header("location:../vista/formularioCliente.php?msj=$documentoCliente");
            $objetoCliente->modificar();
            $mensaje = "Modificado";
            
            
            break;
        case "Eliminar":
            header("location:../vista/formularioCliente.php?msj=4");
            $objetoCliente->eliminar();
            $mensaje = "Eliminado";
            break;

            

    }
        $opcion = null;
        $idCliente = null;
        $nombreCliente = null;
        $documentoCliente = null;
        $correoCliente = null;
        $objetoConexion->desconectar($conexion);
        mysqli_free_result($objetoCliente);
        header("location:../vista/formularioCliente.php?msj=$documentoCliente");

?>