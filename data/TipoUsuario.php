<?php

/**
 * Description of TipoUsuario
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class TipoUsuario {

    private $idTipoUsuario;
    private $tipoUsuario;

    public function __construct() {
        
    }

    function getIdTipoUsuario() {
        return $this->idTipoUsuario;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setIdTipoUsuario($idTipoUsuario) {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    /**
     * Metodo que obtiene todos los tipos de usuarios almacenados en la base de datos
     * @return array Retorna un array con los datos obtenidos
     */
    public function getTiposUsuarios() {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM tipo_usuario"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            $tipoUsuarios = array(); //ARRAY PARA ALMACENAR LOS USUARIOS
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setIdUsuario($r['id_tipo_usuario']);
                $tipoUsuario->setPNombre($r['tipo_usuario']);

                array_push($tipoUsuarios, $tipoUsuario); //INSERTANDO EL OBJ USUARIO EN EL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $tipoUsuarios; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function getTipoUsuarioPorId($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario='$idUsuario'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setIdUsuario($r['id_tipo_usuario']);
                $tipoUsuario->setPNombre($r['tipo_usuario']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $tipoUsuario; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function ingresarTipoUsuario($tipoUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO tipo_usuario(tipo_usuario) "
                    . "VALUES('$tipoUsuario')"; //QUERY
           
            
            //OBTENIENDO RESULTADOS
            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;//SI LA ACCION ES CORRECTA SE ASIGNA UN 1, Y UN -1 SI NO LO ES
            
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
