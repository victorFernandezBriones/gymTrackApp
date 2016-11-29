<?php

/**
 * Description of Dieta
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Dieta {

    private $idDieta;
    private $descripcionDieta;
    private $idTipoDieta;
    private $idEvaluacion;

    public function __construct() {
        
    }

    function getIdDieta() {
        return $this->idDieta;
    }

    function getDescripcionDieta() {
        return $this->descripcionDieta;
    }

    function getIdTipoDieta() {
        return $this->idTipoDieta;
    }

    function setIdDieta($idDieta) {
        $this->idDieta = $idDieta;
    }

    function setDescripcionDieta($descripcionDieta) {
        $this->descripcionDieta = $descripcionDieta;
    }

    function setIdTipoDieta($idTipoDieta) {
        $this->idTipoDieta = $idTipoDieta;
    }

    function getIdEvaluacion() {
        return $this->idEvaluacion;
    }

    function setIdEvaluacion($idEvaluacion) {
        $this->idEvaluacion = $idEvaluacion;
    }

    /**
     * Método que obtiene la dieta por evaluacion
     * @return array Retorna un array con los resultados
     */
    public function getDietaPorEvaluacion($idEvaluacion) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM dieta WHERE id_evaluacion='$idEvaluacion' "; //QUERY

            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $dieta = new Dieta();
                $dieta->setIdDieta($r['id_dieta']);
                $dieta->setDescripcionDieta($r['descripcion_dieta']);
                $dieta->setIdTipoDieta($r['id_tipo_dieta']);
                $dieta->setIdEvaluacion($r['id_evaluacion']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $dieta; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Método que inserta un registro de dieta en la base de datos
     * @param Objeto $dieta objeto con los atributos a ingresar
     * @return int Retorna 1 si la operacion es correcta, - 1 si no lo es
     */
    public function ingresarDieta($dieta) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO dieta(descripcion_dieta,id_tipo_dieta,id_evaluacion) "
                    . "VALUES('" . $dieta->getDescripcionDieta() . "','" . $dieta->getIdTipoDieta() . "','" . $dieta->getIdEvaluacion() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function eliminarDieta($idDieta) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM dieta WHERE id_dieta='$idDieta'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
