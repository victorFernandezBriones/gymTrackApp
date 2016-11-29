<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rutina
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Rutina {

    private $idRutina;
    private $idEvaluacion;

    public function __construct() {
        
    }

    function getIdRutina() {
        return $this->idRutina;
    }

    function getIdEvaluacion() {
        return $this->idEvaluacion;
    }

    function setIdRutina($idRutina) {
        $this->idRutina = $idRutina;
    }

    function setIdEvaluacion($idEvaluacion) {
        $this->idEvaluacion = $idEvaluacion;
    }

    /**
     * Método q obtiene la rutina por evaluacion
     * @param int $idEvaluacion id de la evaluacion
     * @return \Rutina Retorna un obj rutina con los datos requeridos
     */
    public function getRutinaPorEvaluacion($idEvaluacion) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM rutina WHERE id_evaluacion='$idEvaluacion'"; //QUERY

            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $rutina = new Rutina();
                $rutina->setIdDieta($r['id_rutina']);
                $rutina->setDescripcionDieta($r['id_evaluacion']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $rutina; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function ingresarRutina($idEvaluacion) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO rutina(id_evaluacion) "
                    . "VALUES('$idEvaluacion')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function eliminarRutina($idRutina) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM rutina WHERE id_rutina ='$idRutina'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
