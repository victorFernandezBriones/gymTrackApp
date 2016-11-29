<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoDieta
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class TipoDieta {

    private $idTipoDieta;
    private $tipoDieta;

    public function __construct() {
        
    }

    function getIdTipoDieta() {
        return $this->idTipoDieta;
    }

    function getTipoDieta() {
        return $this->tipoDieta;
    }

    function setIdTipoDieta($idTipoDieta) {
        $this->idTipoDieta = $idTipoDieta;
    }

    function setTipoDieta($tipoDieta) {
        $this->tipoDieta = $tipoDieta;
    }

    
    /**
     * Método que obtiene los tipos de dietas registrados en la base de datos
     * @return array Retorna un array con los tipos de dieta presente en la db
     */
    public function getTipoDietas() {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM tipo_dieta"; //QUERY
            $tipoDietas = array();
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $tipoDieta = new TipoDieta();
                $tipoDieta->setIdDieta($r['id_tipo_dieta']);
                $tipoDieta->setDescripcionDieta($r['tipo_dieta']);

                array_push($tipoDietas, $tipoDieta);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $tipoDietas; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
