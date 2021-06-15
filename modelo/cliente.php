<?php 
   class cliente{
        private $_conexion;
        private $_idCliente;
        private $_nombreCliente;
        private $_documentoCliente;
        private $_correoCliente;
        private $_paginacion=10;


        function __construct($_conexion,$_idCliente,$_nombreCliente,$_documentoCliente,$_correoCliente){
          $this->_conexion = $_conexion;
          $this->_idCliente = $_idCliente;
          $this->_nombreCliente=$_nombreCliente;
          $this->_documentoCliente=$_documentoCliente;
          $this->_correoCliente = $_correoCliente;
        }
        function __get($k){
            return $this->$k;
        }
         function __set($k,$v){
            $this->$k = $v;
        }
        function insertar(){
   
            $insercion = mysqli_query($this->_conexion,"INSERT INTO cliente (idCliente,nombreCliente,documentoCliente,correoCliente) VALUES (NULL,'$this->_nombreCliente','$this->_documentoCliente','$this->_correoCliente')");
            
            return $insercion;
            
        }
        function modificar(){
            
            $modificacion = mysqli_query($this->_conexion,"UPDATE cliente SET nombreCliente='$this->_nombreCliente',documentoCliente='$this->_documentoCliente',correoCliente='$this->_correoCliente' WHERE idCliente='$this->_idCliente'");
            
            return $modificacion;
            
        }
        function eliminar(){
            $eliminacion = mysqli_query($this->_conexion,"DELETE FROM cliente WHERE idCliente='$this->_idCliente' ");
            return $eliminacion;
            
        }
        function cantidadPaginas(){
            $cantidadBloques=mysqli_query($this->_conexion,"SELECT CEIL(COUNT (idCliente)/$this->_paginacion) AS cantidad from cliente") or die (mysqli_error($this->conexion));
            $unRegistro=mysqli_fetch_array(cantidadBloques);
            return $unRegistro['cantidad'];
            
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion,"SELECT * FROM cliente ORDER BY idCliente") or die (mysqli_error($this->_conexion));
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion,"SELECT * FROM cliente ORDER BY idCliente LIMIT $paginacionMin,$paginacionMax") or die (mysqli_error($this->conexion));
               
            }
            return $listado;
            
        }
        
   }
?>
