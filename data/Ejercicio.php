<?php

/**
 * Description of Ejercicio
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Ejercicio {

    private $idEjercicio;
    private $ejercicio;
    private $idGrupoMuscular;

    public function __construct() {
        
    }

    function getIdEjercicio() {
        return $this->idEjercicio;
    }

    function getEjercicio() {
        return $this->ejercicio;
    }

    function getIdGrupoMuscular() {
        return $this->idGrupoMuscular;
    }

    function setIdEjercicio($idEjercicio) {
        $this->idEjercicio = $idEjercicio;
    }

    function setEjercicio($ejercicio) {
        $this->ejercicio = $ejercicio;
    }

    function setIdGrupoMuscular($idGrupoMuscular) {
        $this->idGrupoMuscular = $idGrupoMuscular;
    }

    /**
     * Método que obtiene todos los ejercicios almacenados en la BD
     * @return array Retorna un array con los resultados
     */
    public function getEjercicios() {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM ejercicio"; //QUERY
            $ejercicios = array(); //ARRAY PARA ALMACENAR LOS DETALLES
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY

            while ($r = mysql_fetch_array($rs)) {
                //INSTANCEANDO Y SETEANDO OBJETOS
                $ejercicio = new Ejercicio();

                $ejercicio->setIdEjercicio($r['id_ejercicio']);
                $ejercicio->setEjercicio($r['ejercicio']);
                $ejercicio->setIdGrupoMuscular($r['id_grupo_muscular']);

                array_push($ejercicios, $ejercicio); //INGRESANDO OBJETOS AL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $ejercicios; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que obtiene un ejercicio según su ID
     * @param int $idEjercicio id del ejercicio
     * @return \Ejercicio Retorna un objeto del tipo ejercicio
     */
    public function getEjercicioPorId($idEjercicio) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM ejercicio WHERE id_ejercicio='$idEjercicio'"; //QUERY

            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY

            while ($r = mysql_fetch_array($rs)) {
                //INSTANCEANDO Y SETEANDO OBJETOS
                $ejercicio = new Ejercicio();

                $ejercicio->setIdEjercicio($r['id_ejercicio']);
                $ejercicio->setEjercicio($r['ejercicio']);
                $ejercicio->setIdGrupoMuscular($r['id_grupo_muscular']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $ejercicio; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que obtiene todos los ejercicios asociados a un grupo muscular
     * @param int $idGrupoMuscular id del grupo muscular
     * @return array Retorna un array con los resultados obtenidos
     */
    public function getEjerciciosPorGrupoMuscular($idGrupoMuscular) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM ejercicio WHERE id_grupo_muscular='$idGrupoMuscular' "; //QUERY
            $ejercicios = array(); //ARRAY PARA ALMACENAR LOS DETALLES
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY

            while ($r = mysql_fetch_array($rs)) {
                //INSTANCEANDO Y SETEANDO OBJETOS
                $ejercicio = new Ejercicio();

                $ejercicio->setIdEjercicio($r['id_ejercicio']);
                $ejercicio->setEjercicio($r['ejercicio']);
                $ejercicio->setIdGrupoMuscular($r['id_grupo_muscular']);

                array_push($ejercicios, $ejercicio); //INGRESANDO OBJETOS AL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $ejercicios; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que actualiza un registro de la tabla ejercicio
     * @param Objeto $ejercicio Objeto del tipo ejercicio con los valores a modificar
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function actualizarEjercicio($ejercicio) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "UPDATE ejercicio SET ejercicio ='" . $ejercicio->getEjercicio() . "', id_grupo_muscular='" . $ejercicio->getIdGrupoMuscular() . "' "
                    . "WHERE id_ejercico='" . $ejercicio->getIdEjercicio() . "'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que ingresa un registro en la tabla ejercicio
     * @param Objeto $ejercicio Objeto del tipo ejercicio con los valores a ingresar
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function ingresarEjercicio($ejercicio) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO ejercicio(ejercicio,id_grupo_muscular) "
                    . "VALUES('" . $ejercicio->getEjercicio() . "','" . $ejercicio->getIdGrupoMuscular() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }    
    
    /**
     * Método que elimina un registro de la tabla ejercicio
     * @param type $idEjercicio
     * @return type
     */
    public function eliminarEjercicio($idEjercicio) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM ejercicio WHERE id_ejercicio='$idEjercicio'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
