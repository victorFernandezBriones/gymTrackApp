$(document).ready(function () {
    //INICIALIZANDO MODAL
    $('.modal-trigger').leanModal();
    //ESCONDIENDO ERROR AL FOCUSEAR UN INPUT 
    $(':input').focus(function () {
        $('.error').hide("fast");
    });


//VALIDANDO Y ENVIADO FORMULARIO
    $("#formCrearUsuario").validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 15,
                letterswithbasicpunc: true,
                espacioBlanco: true
            },
            apellido: {
                required: true,
                maxlength: 25,
                letterswithbasicpunc: true,
                espacioBlanco: true
            },
            correo: {
                required: true,
                email: true
            },
            nombreUsuario: {
                required: true,
                maxlength: 20,
                espacioBlanco: true
            },
            contrasena: {
                required: true,
                maxlength: 20,
                espacioBlanco: true
            },
            reContrasena: {
                required: true,
                equalTo: "#contrasena"
            }
        },
        messages: {
            nombre: {
                required: "Por Favor, ingrese Nombre",
                maxlength: "Error, máximo de caracteres excedido(15)",
                letterswithbasicpunc: "Error, ingrese letras solamente",
                espacioBlanco: "Error, no rellene con espacios"
            },
            apellido: {
                required: "Por Favor, ingrese Apellido",
                maxlength: "Error, máximo de caracteres excedido(25)",
                letterswithbasicpunc: "Error, ingrese letras solamente",
                espacioBlanco: "Error, no rellene con espacios"
            },
            correo: {
                required: "Por favor, ingrese Correo",
                email: "Error, formato incorrecto"
            },
            nombreUsuario: {
                required: "Por Favor, ingrese Nombre de Usuario",
                maxlength: "Error, máximo de caracteres excedido(20)",
                espacioBlanco: "Error, no rellene con espacios"
            },
            contrasena: {
                required: "Por favor, ingrese contraseña",
                maxlength: "Error, máximo de caracteres excedido(20)",
                espacioBlanco: "Error, no rellene con espacios"
            },
            reContrasena: {
                required: "Por favor, confirme contrasena",
                equalTo: "Error, las contraseñas no coinciden"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function () {



        }



    });

});
