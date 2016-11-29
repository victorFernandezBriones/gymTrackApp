<!DOCTYPE html>
<?php require_once 'negocio/login/procesarLogin.php'; ?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="pa/js/wow-js/animations.css">
        <link rel="stylesheet" type="text/css" href="pa/css/materialize/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="pa/css/style.css">  
        <link rel="stylesheet" type="text/css" href="pa/css/font-awesome-4.6.3/css/font-awesome.min.css">  
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Login</title>
    </head>
    <body id="fondoLogin">
        <div class="row">
            <div class="col m12">
                <div id="login" class="card white z-depth-4">
                    <div class="card-content black-text">
                        <div class="center blue lighten-2">
                            <h4 class="card-title white-text">Login</h4>
                        </div>
                        <div class="row">
                            <form id="formLogin" name="formLogin" method="POST" action="index.php" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="fa fa-user fa-2x prefix"></i>                                           
                                        <input id="nombreUsuario" name="nombreUsuario" type="text" class="validate">
                                        <label for="first_name">Nombre Usuario</label>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="fa fa-lock fa-2x prefix"></i>    
                                        <input id="contrasena" name="contrasena" type="text" class="validate">
                                        <label for="contrasena">Contrase&ntilde;a</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12 col m8 offset-m1">
                                        <button class="btn waves-effect waves-light" id="btnIngresar" name="btnIngresar" type="submit" name="action">Ingresar
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>                       
                        <?php if ($error != "") : ?>

                            <div class="card-panel red white-text error"><p> <i class="material-icons">error_outline</i>&nbsp;<?php echo $error; ?></p></div>

                            <?php
                        endif;
                        ?>
                        <div class="row">
                            <div class="col-s12 center">
                                <div id="linkRegistro">
                                    <a class="modal-trigger" href="#crearCuenta">¿No tienes cuenta? ¡Registrate!</a>
                                </div>
                            </div>                            
                        </div>

                    </div>                  
                </div>
            </div>
        </div>



        <!-- modal -->

        <div id="crearCuenta" class="modal">
            <div class="modal-content">
                <div class="blue lighten-2">
                    <h4 class="center white-text">Registro</h4>             
                </div>

                <form id="formCrearUsuario" name="formCrearUsuario">
                    <div class="row">
                        <div class="input-field col m6 s12">                                                                 
                            <input id="nombre" name="nombre" type="text">
                            <label for="nombre">Nombre</label>
                            <div></div>
                        </div>
                        <div class="input-field col m6 s12">                                                                  
                            <input id="apellido" name="apellido" type="text">
                            <label for="apellido">Apellido</label>
                            <div></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">                                                                   
                            <input id="correo" name="correo" type="email">
                            <label for="correo">Correo</label>
                            <div></div>
                        </div>
                        <div class="input-field col m6 s12">                                                   
                            <input id="nombreUsuario" name="nombreUsuario" type="text">
                            <label for="nombreUsuario">Usuario</label>
                            <div></div>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="input-field col m6 s12">                                                           
                            <input id="contrasena" name="contrasena" type="text">
                            <label for="contrasena">Contrase&ntilde;a</label>
                            <div></div>
                        </div>
                        <div class="input-field col m6 s12">                                                           
                            <input id="reContrasena" name="reContrasena" type="text">
                            <label for="reContrasena">Repita Contrase&ntilde;a</label>
                            <div></div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12">                                                           
                            <button class="btn waves-effect waves-light" type="submit" id="btnRegistrar" name="btnRegistrar">Registrar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>           
        </div>






        <script src="pa/js/jquery.min.js"></script>
        <script src="pa/css/materialize/js/materialize.min.js"></script>
        <script src="pa/js/jquery.validate.min.js"></script>
        <script src="pa/js/validacionesCustom.js"></script>
        <script src="pa/funcionesJS/funcionesLogin.js"></script>
       
    </body>
</html>
