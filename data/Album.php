<?php

/**
 * Description of Album
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Album {

    private $idAlbum;
    private $fechaAlbum;
    private $idUsuario;

    public function __construct() {
        
    }

    function getIdAlbum() {
        return $this->idAlbum;
    }

    function getFechaAlbum() {
        return $this->fechaAlbum;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdAlbum($idAlbum) {
        $this->idAlbum = $idAlbum;
    }

    function setFechaAlbum($fechaAlbum) {
        $this->fechaAlbum = $fechaAlbum;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Método que ingresa un registro en la tabla album
     * @param Objeto $album Objeto album con los valores a ingresar en la DB
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function ingresarAlbum($album) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO album(fecha_album,id_usuario) "
                    . "VALUES('" . $album->getFechaAlbum() . "','" . $album->getIdUsuario() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    
    /**
     * Método que lista todos los albumes asociados a un usuario
     * @param int $idUsuario id del usuario
     * @return array Retorna un array con los resultados obtenidos
     */
    public function listarAlbumPorUsuario($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM album WHERE id_usuario='$idUsuario' ORDER BY fecha_album "; //QUERY
            $albumes = array(); //ARRAY PARA ALMACENAR LOS DETALLES
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY

            while ($r = mysql_fetch_array($rs)) {
                //INSTANCEANDO Y SETEANDO OBJETOS
                $album = new Album();
                $album->setIdAlbum($r['id_album']);
                $album->setFechaAlbum($r['fecha_album']);
                $album->setIdUsuario($r['id_usuario']);

                array_push($albumes, $album);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $albumes; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    
    /**
     * Método que actualiza un registro en la tabla album
     * @param Objeto $album Objeto de tipo album que contiene los datos a modificar
     * @return int Retorna un 1 si la operacion es correcta, -1 si no lo es
     */
    public function actualizarAlbum($album) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "UPDATE album SET fecha_album='" . $album->getFechaAlbum() . "', id_usuario='" . $album->getIdUsuario() . "' "
                    . "WHERE id_album='" . $album->getIdAlbum() . "'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    
    /**
     * Método que elimina un registro de la tabla album
     * @param int $idAlbum id del album a borrar
     * @return int Retorna un 1 si la operacion es correcta, -1 si no lo es
     */
    public function eliminarAlbum($idAlbum) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM album WHERE id_album='$idAlbum'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
