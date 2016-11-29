<?php

require_once 'data/Usuario.php';

if ($_POST) {

    $serviceUsuario = new Usuario();

    $nombreUsuario = htmlspecialchars($_POST['nombreUsuario']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    $usuario = $serviceUsuario->verificarLogin($nombreUsuario, $contrasena);

    if ($usuario != "") {
        
        session_start();
        $_SESSION['usuario'] = $usuario;
        
        header("location:pa/inicio.php");
    } else {
        $error = "Error, nombre o contrase&ntilde;a incorrecta";
    }
}