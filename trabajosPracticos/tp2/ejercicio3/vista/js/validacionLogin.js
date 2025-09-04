// Cuando el HTML este completamente cargado se ejecuta el codigo
$(document).ready(function(){
    // Defino método personalizado
    $.validator.addMethod("soloLetras", function(value, element){
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Por favor, ingresar nombre valido y no números");

    $.validator.addMethod("noSoloNumeros", function(value, element) {
        return this.optional(element) || /\D/.test(value);
    }, "La contraseña no puede ser solo números.");

    $.validator.addMethod("diferentes", function(value, element) {
        return this.optional(element) || value !== $("#username").val();
    }, "La contraseña debe ser diferente al username.");

    // Indico el formulario y sus reglas
    $("#formLogin").validate({
        errorClass: "invalid-feedback", // clase Bootstrap
    errorElement: "div", // para que sea un div debajo del input
    highlight: function(element) {
        $(element).addClass("is-invalid");
    },
    unhighlight: function(element) {
        $(element).removeClass("is-invalid");
    },
        // Reglas:
        rules:{
            username:{
                required: true,
                minlength: 3,
                soloLetras: true
            },
            password:{
                required: true,
                minlength: 8,
                noSoloNumeros: true,
                diferentes: true
            }
        },
        // Mensajes
        messages:{
            username:{
                required: "Por favor ingresá un username",
                minlength: "El username debe tener al menos 3 caracteres",
                soloLetras: "El username debe tener caracteres alfabeticos"
            },
            password:{
                required: "Por favor ingresá una contraseña",
                minlength: "La contraseña debe tener al menos 8 caracteres"
            }
        }
    })
})