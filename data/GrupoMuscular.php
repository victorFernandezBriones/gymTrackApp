<?php

/**
 * Description of GrupoMuscular
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class GrupoMuscular {
    
    private $idGrupoMuscular;
    private $grupoMuscular;
    
    public function __construct() {
        
    }
    
    function getIdGrupoMuscular() {
        return $this->idGrupoMuscular;
    }

    function getGrupoMuscular() {
        return $this->grupoMuscular;
    }

    function setIdGrupoMuscular($idGrupoMuscular) {
        $this->idGrupoMuscular = $idGrupoMuscular;
    }

    function setGrupoMuscular($grupoMuscular) {
        $this->grupoMuscular = $grupoMuscular;
    }

/**
 * Método que ingresa un registro en la tabla registro Muscular
 * @param String $grupoMuscular Grupo muscular a ingresar
 * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
 */
    public function ingresarGrupoMuscular($grupoMuscular) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO grupo_muscular(grupo_muscular) "
                    . "VALUES('$grupoMuscular')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    /**
     * Método que actualiza un registro de la tabla grupo muscular
     * @param Objeto $grupoMuscular Objeto tipo grupo muscular que contiene los valores a actualizar
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function actualizarGrupoMuscular($grupoMuscular) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "UPDATE grupo_muscular SET grupo_muscular='".$grupoMuscular->getGrupoMuscular()."' "
                    . "WHERE id_grupo_muscular='".$grupoMuscular->getIdGrupoMuscular()."'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    /**
     * Método que elimina un registro de la tabla grupo_muscular
     * @param int $idGrupoMuscular id del grupo muscular
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function eliminarGrupoMuscular($idGrupoMuscular) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM grupo_muscular WHERE id_grupo_muscular='$idGrupoMuscular'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1;

            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    
    
    /**
     * Método que obtiene todos los grupos musculares registrados en la BD
     * @return Array Retorna un array con los resultados obtenidos
     */
    public function getGruposMusculares() {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM grupo_muscular"; //QUERY
            $gruposMusculares = array();
            $rs=  mysqli_query($cnx, $sql);
            
            while ($r = mysql_fetch_array($rs)) {
                //seteando e instanceando objetos
                $grupoMuscular= new GrupoMuscular();
                $grupoMuscular->setIdGrupoMuscular($r['id_grupo_muscular']);
                $grupoMuscular->setGrupoMuscular($r['grupo_muscular']);
                
                array_push($gruposMusculares, $grupoMuscular);
                
            }
            

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $gruposMusculares; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    
    
    public function getGrupoMuscularPorId($idGrupoMuscular) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM grupo_muscular WHERE id_grupo_muscular='$idGrupoMuscular'"; //QUERY
           
            $rs=  mysqli_query($cnx, $sql);
            
            while ($r = mysql_fetch_array($rs)) {
                //seteando e instanceando objetos
                $grupoMuscular= new GrupoMuscular();
                $grupoMuscular->setIdGrupoMuscular($r['id_grupo_muscular']);
                $grupoMuscular->setGrupoMuscular($r['grupo_muscular']);                
                
            }
            

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $grupoMuscular; //RETORNANDO RESULTADOS 
            
        } catch (Exception $ex) {

            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }
    
    
}
