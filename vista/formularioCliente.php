<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cliente</title>
</head>
<body>
    <header>
        <h1>Formulario Cliente</h1>
    </header>
    <table >
        <tbody>
            <tr>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Documento Cliente</th>
                <th scope="col">Email Cliente</th>
                <th scope="col"></th>
            </tr>

            <?php 
                include_once("../modelo/conexion.php");
                $objetoConexion = new conexion();
                $conexion = $objetoConexion->conectar();

                include_once("../modelo/cliente.php");
                $objetoCliente = new cliente($conexion,0,'nombre','documento','correo');
                $listaClientes = $objetoCliente->listar(0);
                while($unRegistro = mysqli_fetch_array($listaClientes)){
                    echo '<tr><form id="fModificarCliente"'.$unRegistro["idCliente"].' action="../controlador/controladorCliente.php" method="post">';
                    echo '<td><input type = "hidden" name = "fIdCliente" value="'.$unRegistro['idCliente'].'">';
                    echo '    <input type = "text" name = "fNombreCliente" value="'.$unRegistro['nombreCliente'].'"></td> ';
                    echo '<td><input type = "text"  name ="fDocumentoCliente" value="'.$unRegistro['documentoCliente'].'"></td>';
                    echo '<td><input type = "text" name = "fCorreoCliente" value="'.$unRegistro['correoCliente'].'"></td>';
                    echo '<td><button type="submit" name="fEnviar"  value="Modificar">modificar</button>
                              <button type="submit" name="fEnviar"  value="Eliminar">eliminar</button></td>';
                    echo '</form></tr>';
                    
                }
            ?>

                <tr><form id="fIngresarCliente" action="../controlador/controladorCliente.php" method="post">
                <td><input type="hidden" name="fIdCliente" value="0"></td>
                <td><input type="text" name="fNombreCliente" ></td>
                <td><input type="number" name="fDocumentoCliente" ></td>
                <td><input type="email" name="fCorreoCliente" ></td>
                <td><button type="submit" name="fEnviar" value="Ingresar">ingresar</button>
                    <button type="reset"  name="fEnviar" value="Limpiar">limpiar</button></td>
                </form></tr>
        </tbody>
    </table>
    <?php  
    mysqli_free_result($listaClientes);
    $objetoConexion->desconectar($conexion);
    ?>
</body>
</html>