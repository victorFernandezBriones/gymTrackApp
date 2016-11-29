<?php

/**
 * Description of Conexion
 *
 * @author vfernandez
 */
class Conexion {

    private $servidor = "localhost";
    private $usuario = "gymtrack";
    private $contrasena = "Gymtrack.2016.db";
    private $db = "gymtrack";
    public $idConexion;
    public $error;

    public function __construct() {
        
    }

    /**
     * Metodo que realiza la conexion a la base de datos
     * @return conexion Retorna el link de conexion a la base de datos
     */
    public function conectar() {
        try {
            //ejecutando el metodo para conectar a la base de datos
            $this->idConexion = mysqli_connect($this->servidor, $this->usuario, $this->contrasena, $this->db);

            if (!$this->idConexion) {//si no se realiza la conexion se retorna un error
                return $this->error = "Error, no se ha podido conectar a la base de datos";
            }


            return $this->idConexion; //retornando el link de la conexion
        } catch (Exception $ex) {
            echo $ex->getMessage(); //mensaje de la excepcion
        }
    }

    
    /**
     * Metodo que cierra la conexion con la base de datos
     * @return Boolean Retorna true si la operacion es correcta, false si no lo es
     */
    public function cerrarConexion() {     
        
        return mysql_close($this->idConexion);//cerrando y retornando el resultado del metodo
    }

}
