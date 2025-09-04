// Cuando el HTML este completamente cargado se ejecuta el codigo
$(document).ready(function(){
    // Defino método personalizado
    $.validator.addMethod("soloLetras", function(value, element){
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Por favor, ingresar nombre valido y no números");

    // Indico el formulario y sus reglas
    $("#formCalcularPrecio").validate({
        // Reglas:
        rules:{
            nombre:{
                required: true,
                minlength: 2,
                soloLetras: true
            },
            edad:{
                required: true,
                number: true,
                min: 1,
                max: 120
            },
            esEstudiante:{
                required: true
            }
        },
        // Mensajes
        messages:{
            nombre:{
                required: "Por favor, ingresá tu nombre",
                minlength: "El nombre debe tener al menos 2 caracteres"
            },
            edad:{
                required: "Por favor, ingresá tu edad",
                number: "Debe ser un número válido",
                min: "La edad mínima es 1",
                max: "Edad máxima permitida: 120"
            },
            esEstudiante:{
                required: "Ingresar su condición de estudiante por favor"
            }
        },
        errorClass: "invalid-feedback", // clase Bootstrap
        errorElement: "div", // para que sea un div debajo del input
        highlight: function(element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) {
            $(element).removeClass("is-invalid");
        },
        // Para que el mensaje se ubique correctamente
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        }
    })
})