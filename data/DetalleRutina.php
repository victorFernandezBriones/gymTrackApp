<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleRutina
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class DetalleRutina {

    private $idDetalleRutina;
    private $repeticiones;
    private $pesoEjercicio;
    private $idEjercicio;
    private $idRutina;

    public function __construct() {
        
    }

    function getIdDetalleRutina() {
        return $this->idDetalleRutina;
    }

    function getRepeticiones() {
        return $this->repeticiones;
    }

    function getPesoEjercicio() {
        return $this->pesoEjercicio;
    }

    function getIdEjercicio() {
        return $this->idEjercicio;
    }

    function setIdDetalleRutina($idDetalleRutina) {
        $this->idDetalleRutina = $idDetalleRutina;
    }

    function setRepeticiones($repeticiones) {
        $this->repeticiones = $repeticiones;
    }

    function setPesoEjercicio($pesoEjercicio) {
        $this->pesoEjercicio = $pesoEjercicio;
    }

    function setIdEjercicio($idEjercicio) {
        $this->idEjercicio = $idEjercicio;
    }

    function getIdRutina() {
        return $this->idRutina;
    }

    function setIdRutina($idRutina) {
        $this->idRutina = $idRutina;
    }

    /**
     * Método que inserta un registro de detalle de rutina en la base de datos
     * @param type $detalleRutina
     * @return type
     */
    public function insertarDetalleRutina($detalleRutina) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO detalle_rutina(repeticiones,peso_ejercicio,id_rutina,id_ejercicio) "
                    . "VALUES('" . $detalleRutina->getDetalleRutina() . "','" . $detalleRutina->getPesoEjercicio() . "',"
                    . "'" . $detalleRutina->getIdRutina() . "','" . $detalleRutina->getIdEjercicio() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function getDetallesPorRutina($idRutina) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM detalle_rutina WHERE id_rutina='$idRutina'"; //QUERY
            $detalleRutinas = array(); //ARRAY PARA ALMACENAR LOS DETALLES
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY

            while ($r = mysql_fetch_array($rs)) {
                //INSTANCEANDO Y SETEANDO OBJETOS
                $detalleRutina = new DetalleRutina();

                $detalleRutina->setIdDetalleRutina($r['id_detalle_rutina']);
                $detalleRutina->setRepeticiones($r['repeticiones']);
                $detalleRutina->setPesoEjercicio($r['peso_ejercicio']);
                $detalleRutina->setIdRutina($r['id_rutina']);

                array_push($detalleRutinas, $detalleRutina); //INGRESANDO OBJETOS AL ARRAY
            }


            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $detalleRutinas; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function eliminarDetalleRutina($idDetalleRutina) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM detalle_rutina WHERE id_detalle_rutina='$idDetalleRutina'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function actualizarDetalle($detalleRutina) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION

            $sql = "UPDATE detalle_rutina  SET repeticiones='" . $detalleRutina->getRepeticiones() . "',"
                    . "peso_ejercicio='" . $detalleRutina->getPesoEjercicio() . "', "
                    . "id_ejercicio='" . $detalleRutina->getIdEjercicio() . "' "
                    . " WHERE id_detalle_rutina='" . $detalleRutina->getIdDetalleRutina() . "'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SE OTORGA 1 SI LA OEPRACION ES CORRECTA, -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
