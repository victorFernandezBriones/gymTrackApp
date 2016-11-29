<?php

/**
 * Description of Usuario
 *
 * @author vfernandez
 */
require_once 'Conexion.php';

class Usuario {

    private $idUsuario;
    private $pNombre;
    private $apellidoP;
    private $nombreUsuario;
    private $contrasena;
    private $edad;
    private $correo;
    private $idTipoUsuario;
    private $idEntrenador;

    public function __construct() {
        
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getPNombre() {
        return $this->pNombre;
    }

    function getApellidoP() {
        return $this->apellidoP;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getEdad() {
        return $this->edad;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getIdTipoUsuario() {
        return $this->idTipoUsuario;
    }

    function getIdEntrenador() {
        return $this->idEntrenador;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setPNombre($pNombre) {
        $this->pNombre = $pNombre;
    }

    function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setIdTipoUsuario($idTipoUsuario) {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    function setIdEntrenador($idEntrenador) {
        $this->idEntrenador = $idEntrenador;
    }

    /**
     * Metodo que obtiene todos los usurios de la base de datos
     * @return array Retorna un array con todos los usuarios
     */
    public function getUsuarios() {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM usuario"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            $usuarios = array(); //ARRAY PARA ALMACENAR LOS USUARIOS
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $usuario = new Usuario();
                $usuario->setIdUsuario($r['id_usuario']);
                $usuario->setPNombre($r['p_nombre']);
                $usuario->setApellidoP($r['apellido_p']);
                $usuario->setNombreUsuario($r['nombre_usuario']);
                $usuario->setContrasena($r['contrasena']);
                $usuario->setEdad($r['edad']);
                $usuario->setCorreo($r['correo']);
                $usuario->setIdEntrenador($r['id_entrenador']);
                $usuario->setIdTipoUsuario($r['id_tipo_usuario']);


                array_push($usuarios, $usuario); //INSERTANDO EL OBJ USUARIO EN EL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $usuarios; //RETORNANDO RESULTADOS           
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Metodó que verifica el login y permite ingresar a la aplicación
     * @param String $nombreUsuario Nombre del usuario
     * @param String $contrasena Contraseña del usuario
     * @return \Usuario Retorna un obj usuario de acuerdo a los parametros ingresados
     */
    public function verificarLogin($nombreUsuario, $contrasena) {

        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM usuario WHERE nombre_usuario='$nombreUsuario' AND contrasena='$contrasena'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $usuario = new Usuario();
                $usuario->setIdUsuario($r['id_usuario']);
                $usuario->setPNombre($r['p_nombre']);
                $usuario->setApellidoP($r['apellido_p']);
                $usuario->setNombreUsuario($r['nombre_usuario']);
                $usuario->setContrasena($r['contrasena']);
                $usuario->setEdad($r['edad']);
                $usuario->setCorreo($r['correo']);
                $usuario->setIdEntrenador($r['id_entrenador']);
                $usuario->setIdTipoUsuario($r['id_tipo_usuario']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $usuario; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Metodo que obtiene a un usuario segun su ID
     * @param int $idUsuario id del usuario a buscar
     * @return \Usuario Retorna un obj usuario de acuerdo a los parametros ingresados
     */
    public function getUsuarioPorID($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM usuario WHERE id_usuario='$idUsuario'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $usuario = new Usuario();
                $usuario->setIdUsuario($r['id_usuario']);
                $usuario->setPNombre($r['p_nombre']);
                $usuario->setApellidoP($r['apellido_p']);
                $usuario->setNombreUsuario($r['nombre_usuario']);
                $usuario->setContrasena($r['contrasena']);
                $usuario->setEdad($r['edad']);
                $usuario->setCorreo($r['correo']);
                $usuario->setIdEntrenador($r['id_entrenador']);
                $usuario->setIdTipoUsuario($r['id_tipo_usuario']);
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $usuario; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Metodo que obtiene todos los usuarios asociados a un entrenador
     * @param int $idEntrenador id del entrenador
     * @return array Retorna un array con los resultados
     */
    public function getUsuarioPorEntrenador($idEntrenador) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "SELECT * FROM usuario WHERE id_entrenador='$idEntrenador'"; //QUERY
            $rs = mysqli_query($cnx, $sql); //RESULTSET DE LA QUERY
            $usuarios = array();
            //
            //OBTENIENDO RESULTADOS
            while ($r = mysqli_fetch_array($rs)) {
                //instanceando y seteando objeto
                $usuario = new Usuario();
                $usuario->setIdUsuario($r['id_usuario']);
                $usuario->setPNombre($r['p_nombre']);
                $usuario->setApellidoP($r['apellido_p']);
                $usuario->setNombreUsuario($r['nombre_usuario']);
                $usuario->setContrasena($r['contrasena']);
                $usuario->setEdad($r['edad']);
                $usuario->setCorreo($r['correo']);
                $usuario->setIdEntrenador($r['id_entrenador']);
                $usuario->setIdTipoUsuario($r['id_tipo_usuario']);

                array_push($usuarios, $usuario); //INSERTANDO EL USUARIO EN EL ARRAY
            }

            //LIBERANDO RECURSOS
            mysqli_free_result($rs);
            mysqli_close($cnx);

            return $usuarios; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Metodo que actualiza un usuario(edad,correo,entrenador,contrasena)
     * @param type $usuario
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function actualizarUsuario($usuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "UPDATE usuario SET edad='" . $usuario->getEdad() . "', correo='" . $usuario->getCorreo() . "', "
                    . "id_entrenador='" . $usuario->getIdEntrenador() . "',contrasena='" . $usuario->getContrasena() . "' "
                    . "WHERE id_usuario='" . $usuario->getIdUsuario() . "'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SI LA ACCION ES CORRECTA SE ASIGNA UN 1, Y UN -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    /**
     * Metodo que elimina un usuario segun su ID
     * @param int $idUsuario id del usuario
     * @return int Retorna 1 si la operacion es correcta, -1 si no lo es
     */
    public function eliminarUsuario($idUsuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "DELETE FROM usuario WHERE id_usuario='$idUsuario'"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SI LA ACCION ES CORRECTA SE ASIGNA UN 1, Y UN -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

    public function ingresarUsuario($usuario) {
        try {
            $serviceCnx = new Conexion(); //SERVICIO PARA LA CONEXION
            $cnx = $serviceCnx->conectar(); //ASIGNANDO EL LINK DE LA CONEXION
            $sql = "INSERT INTO usuario(p_nombre,apellido_p,nombre_usuario,contrasena,edad,correo,id_entrenador,id_tipo_usuario) "
                    . "VALUES('" . $usuario->getPNombre() . "','" . $usuario->getApellidoP() . "','" . $usuario->getNombreUsuario() . "','" . $usuario->getContrasena() . "',"
                    . "'" . $usuario->getEdad() . "','" . $usuario->getCorreo() . "','" . $usuario->getIdEntrenador() . "','" . $usuario->getIdTipoUsuario() . "')"; //QUERY

            $exito = mysqli_query($cnx, $sql) == TRUE ? 1 : -1; //SI LA ACCION ES CORRECTA SE ASIGNA UN 1, Y UN -1 SI NO LO ES
            //LIBERANDO RECURSOS
            mysqli_close($cnx);

            return $exito; //RETORNANDO RESULTADOS 
        } catch (Exception $ex) {
            echo $ex->getMessage(); //MENSAJE DE EXCEPCION
        }
    }

}
