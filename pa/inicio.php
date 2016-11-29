<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="js/wow-js/animations.css">
        <link rel="stylesheet" type="text/css" href="css/materialize/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">       
        <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css">       
        <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.theme.css">       
        <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.transitions.css">       
        <link rel="stylesheet" type="text/css" href="css/Hover-master/css/hover.css" media="all">       
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Shojumaru" rel="stylesheet"> 

        <title>GymTrack</title>
    </head>
    <body>
        <div class="navbar-fixed ">
            <nav class="white z-depth-2 fixed " role="navigation">


                <div class="nav-wrapper">
                    <div class="container">
                        <!--<a id="logo-container" href="#" class="brand-logo black-text"><img id="brand" class="responsive-img" src="media/batman-musculos-negros.png" alt="brand"/></a>-->
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#descripcion" class="hvr-underline-from-center" >Perf&iacute;l</a></li>
                            <li><a href="#descripcion" class="hvr-underline-from-center" >Ingresar Evaluación</a></li>
                            <li><a href="#progreso" class="hvr-underline-from-center">Progreso</a></li>
                            <li><a href="#evaluaciones" class="hvr-underline-from-center">Evaluaciones</a></li>
                            <li><a href="#portafolio" class="hvr-underline-from-center">Registros Fotográficos</a></li>
                            <li><a href="#sobreGymTrack" class="hvr-underline-from-center">Sobre Gym Track</a></li>
                            <li><a href="../index.php" class="hvr-underline-from-center">Salir</a></li>
                        </ul>
                        <!-- Side Nav -->
                        <ul id="slide-out" class="side-nav">
                            <li><div class="userView">
                                    <img class="background" src="media/fondo1.jpg">
                                    <a href="#!user"><img class="circle" src="media/icono.png"></a>
                                    <a href="#!name"><span class="white-text name">Juan Pérez</span></a>
                                    <a href="#!email"><span class="white-text email">juanperez@gmail.com</span></a>
                                </div></li>
                            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                            <li><a href="#!">Second Link</a></li>
                            <li><div class="divider"></div></li>
                            <li><a class="subheader">Subheader</a></li>
                            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                        </ul>
                        <!-- -->
                        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons black-text">menu</i></a>
                    </div>

                </div>

            </nav> 
        </div>       
        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">
                    <h1 class="header center customFont white-text">Gym Track Progress</h1>
                    <div class="row center">
                        <h5 class="header col s12 light">La mejor forma de seguir tu progreso</h5>
                    </div>      

                </div>
            </div>

            <div class="parallax "><img src="media/imagen2.jpg" alt="bannerGimnasio"/></div>
        </div>        
        <div id="divUsuario">
            <section id="descripcion">
                <div class="container paddingTop">
                    <div class="row">
                        <div class="col s12 m4  paddingTop justify wow bounceIn ">
                            <h3 class="title customFont">Objetivo</h3>
                            <p class="light hvr-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                        <div class="col s12 m4 paddingTop wow bounceIn">
                            <div class="icon-block">
                                <div class="card-panel z-depth-4 marco hoverable">
                                    <img src="media/icono.png" alt="fotoPerfil" class="responsive-img">
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 paddingTop wow bounceIn ">
                            <div class="icon-block">   
                                <div class="card-panel z-depth-4 marco hoverable">
                                    <table class="bordered responsive-table">
                                        <tr>
                                            <td>Nombre: </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Edad: </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Peso: </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Estatura: </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>IMC: </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>% Grasa: </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </section>

            <section id="progreso">
                <div  class="row">
                    <div class="container paddingTop paddingBottom">                    
                        <div class="col s12 m12">
                            <h3 class="title center customFont wow bounceIn">Estadísticas</h3>
                            <div class="card z-depth-4 wow bounceIn hoverable">                       
                                <div class="card-content justify">
                                    <canvas id="canvas" height="300" width="600"></canvas>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div> 
            </section>

            <section id="evaluaciones">
                <div class="row">
                    <div class="container paddingTop paddingBottom">
                        <div class="col s12 m12">
                            <h3 class="center customFont">Evaluaciones</h3>
                        </div>
                        <div id="owl-example" class="owl-carousel">
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Agosto<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Septiembre<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Octubre<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Noviembre<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Diciembre<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">   
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="media/instrumentos-gimnasio.jpg">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title activator grey-text text-darken-4">Enero<i class="material-icons right">more_vert</i></span>

                                        <table class="bordered responsive-table">
                                            <tr>
                                                <td>Peso: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Estatura: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>IMC: </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>% Grasa: </td>
                                                <td></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Dieta Sugerida<i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>


            <section id="portafolio">
                <div class="row justify">
                    <div class="container paddingTop paddingBottom">
                        <div class="col m12">
                            <h3 class="center customFont">Registros Fotográficos</h3>

                            <div id="owlRegistros" class="owl-carousel">
                                <div class="item">  
                                    <div class="card  wow bounceIn hoverable">
                                        <div class="card-image">
                                            <img src="media/imagen2.jpg">
                                            <span class="card-title customFont">Agosto</span>
                                        </div>
                                        <div class="card-content">
                                            <p>I am a very simple card. I am good at containing small bits of information.
                                                I am convenient because I require little markup to use effectively.</p>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="card-action">
                                            <a href="#" class="blue-text">Ver m&aacute;s</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">  
                                    <div class="card  wow bounceIn hoverable">
                                        <div class="card-image">
                                            <img src="media/imagen2.jpg">
                                            <span class="card-title customFont">Septiembre</span>
                                        </div>
                                        <div class="card-content">
                                            <p>I am a very simple card. I am good at containing small bits of information.
                                                I am convenient because I require little markup to use effectively.</p>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="card-action">
                                            <a href="#" class="blue-text">Ver m&aacute;s</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">  
                                    <div class="card  wow bounceIn hoverable">
                                        <div class="card-image">
                                            <img src="media/imagen2.jpg">
                                            <span class="card-title customFont">Octubre</span>
                                        </div>
                                        <div class="card-content">
                                            <p>I am a very simple card. I am good at containing small bits of information.
                                                I am convenient because I require little markup to use effectively.</p>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="card-action">
                                            <a href="#" class="blue-text">Ver m&aacute;s</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">  
                                    <div class="card  wow bounceIn hoverable">
                                        <div class="card-image">
                                            <img src="media/imagen2.jpg">
                                            <span class="card-title customFont">Noviembre</span>
                                        </div>
                                        <div class="card-content">
                                            <p>I am a very simple card. I am good at containing small bits of information.
                                                I am convenient because I require little markup to use effectively.</p>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="card-action">
                                            <a href="#" class="blue-text">Ver m&aacute;s</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer id="sobreGymTrack" class="page-footer black">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Gym Progress Track</h5>
                        <p class="grey-text text-lighten-4 justify">Es una aplicación web que permite llevar un seguimiento de los progresos obtenidos mediante el entrenamiento f&iacute;sico en un gimnasio o en cualquier centro de actividad física.
                            Esta orientado para cualquier tipo de Usuario.</p>
                    </div>                
                    <div class="col l3 offset-l3 s12">
                        <h5 class="white-text">Links de inter&eacute;s</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                            <li><a class="white-text" href="#!">Link 2</a></li>
                            <li><a class="white-text" href="#!">Link 3</a></li>
                            <li><a class="white-text" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Copyrigth &COPY; <a class="brown-text text-lighten-3" target="_blank" href="http://www.consultoravial.cl/aplicaciones/fastsupport">Víctor Fernández Briones</a>
                </div>
            </div>
        </footer>

        <script src="js/jquery.min.js"></script>        
        <script src="css/materialize/js/materialize.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/wow-js/wow.min.js"></script> 
        <script>
            new WOW().init();
        </script>
        <script src="js/owl-carousel/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
        <script src="js/estadisticas.js"></script>

    </body>
</html>
