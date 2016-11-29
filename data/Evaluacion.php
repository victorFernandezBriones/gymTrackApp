<?php

/**
 * Description of Evaluacion
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Evaluacion {

    private $idEvaluacion;
    private $altura;
    private $peso;
    private $imc;
    private $porcentajeGrasa;
    private $fechaEvaluacion;
    private $objetivo;
    private $idUsuario;

    public function __construct() {
        
    }

    function getIdEvaluacion() {
        return $this->idEvaluacion;
    }

    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function getImc() {
        return $this->imc;
    }

    function getPorcentajeGrasa() {
        return $this->porcentajeGrasa;
    }

    function getFechaEvaluacion() {
        return $this->fechaEvaluacion;
    }

    function getObjetivo() {
        return $this->objetivo;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdEvaluacion($idEvaluacion) {
        $this->idEvaluacion = $idEvaluacion;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setImc($imc) {
        $this->imc = $imc;
    }

    function setPorcentajeGrasa($porcentajeGrasa) {
        $this->porcentajeGrasa = $porcentajeGrasa;
    }

    function setFechaEvaluacion($fechaEvaluacion) {
        $this->fechaEvaluacion = $fechaEvaluacion;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Método que obtiene todas las evaluaciones por usuario
     * @param type $idUsuario
     * @return array
     * 
     */
    public function getEvaluacionesPorUsuario($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM evaluacion WHERE id_usuario='$idUsuario' ORDER BY fecha_evaluacion"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            $evaluaciones = array();
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $evaluacion = new Evaluacion();
                $evaluacion->setIdEvaluacion($r['id_evaluacion']);
                $evaluacion->setAltura($r['altura']);
                $evaluacion->setPeso($r['peso']);
                $evaluacion->setImc($r['imc']);
                $evaluacion->setPorcentajeGrasa($r['porcentaje_grasa']);
                $evaluacion->setFechaEvaluacion($r['fecha_evaluacion']);
                $evaluacion->setObjetivo($r['objetivo']);
                $evaluacion->setIdUsuario($r['id_usuario']);

                array_push($evaluaciones, $evaluacion); //INSERTANDO EL USUARIO EN EL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $evaluaciones; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que obtiene el id mayor de la evaluacion de un usuario
     * @param int $idUsuario id del usuario
     * @return int Retorna el id max de una evaluacion de un usuario
     */
    public function obtenerMaxIdEvaluacionPorUsuario($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT MAX(id_evaluacion) as max_id FROM evaluacion WHERE id_usuario='$idUsuario'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            $maxId = 0;
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $maxId = $r['max_id'];
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $maxId; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    
    /**
     * Método que obtiene las evaluaciones de un usuario
     * @param int $idUsuario id del usuario
     * @return array Retorna un array con los resultados
     */
    public function getUltimaEvaluacionPorUsuario($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION

            $maxId = $this->obtenerMaxIdEvaluacionPorUsuario($idUsuario);

            $sql = "SELECT * FROM evaluacion WHERE id_usuario='$idUsuario' AND id_evaluacion='$maxId'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $evaluacion = new Evaluacion();
                $evaluacion->setIdEvaluacion($r['id_evaluacion']);
                $evaluacion->setAltura($r['altura']);
                $evaluacion->setPeso($r['peso']);
                $evaluacion->setImc($r['imc']);
                $evaluacion->setPorcentajeGrasa($r['porcentaje_grasa']);
                $evaluacion->setFechaEvaluacion($r['fecha_evaluacion']);
                $evaluacion->setObjetivo($r['objetivo']);
                $evaluacion->setIdUsuario($r['id_usuario']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $evaluacion; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    
    /**
     * Método que ingresa una evaluación en la base de datos
     * @param Objeto $evaluacion Objeto evaluación
     * @return int Retorna 1 si la operacion es correcta, - 1 si no lo es
     */
    public function ingresarEvaluacion($evaluacion) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO evaluacion(altura,peso,imc,porcentaje_grasa,fecha_evaluacion,objetivo,id_usuario) "
                    . "VALUES('" . $evaluacion->getAltura() . "','" . $evaluacion->getPeso() . "','" . $evaluacion->getImc() . "',"
                    . "'" . $evaluacion->getPorcentajeGrasa() . "','" . $evaluacion->getFechaEvaluacion() . "','" . $evaluacion->getObjetivo() . "',"
                    . "'" . $evaluacion->getIdUsuario() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
