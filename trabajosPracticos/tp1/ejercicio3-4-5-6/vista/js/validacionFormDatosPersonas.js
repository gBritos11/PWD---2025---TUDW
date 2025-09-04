// Cuando el HTML esté completamente cargado se ejecuta el código
$(document).ready(function(){
    // Defino un métodos personalizados
    $.validator.addMethod("soloLetras", function(value, element){
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Por favor, ingresar nombre valido y no números");

    $.validator.addMethod("direccionValida", function(value, element){
        return this.optional(element) || /^[a-zA-Z0-9\s\-\#\.\/]+$/.test(value);
    }, "Por favor, ingresá una dirección válida");

    // Inicializo la validación en el formulario
    $("#formDatosPersonas").validate({
        // reglas:
        rules:{
            nombre: {
            required: true,
            minlength: 2,
            soloLetras: true
        },
        apellido: {
            required: true,
            minlength: 2,
            soloLetras: true
        },
        edad: {
            required: true,
            number: true,
            min: 1,
            max: 120
        },
        direccion: {
            required: true,
            minlength: 5,
            direccionValida: true
        },
        estudios: {
            required: true
        },
        sexo: {
            required: true
        },
        deporte: {
            // No obligatorio
        }
    },
    messages: {
        nombre: {
            required: "Por favor, ingresá tu nombre",
            minlength: "El nombre debe tener al menos 2 caracteres"
        },
        apellido: {
            required: "Por favor, ingresá tu apellido",
            minlength: "El apellido debe tener al menos 2 caracteres"
        },
        edad: {
            required: "Por favor, ingresá tu edad",
            number: "Debe ser un número válido",
            min: "La edad mínima es 1",
            max: "Edad máxima permitida: 120"
        },
        direccion: {
            required: "Por favor, ingresá tu dirección",
            minlength: "La dirección debe tener al menos 5 caracteres"
        },
        estudios: {
            required: "Seleccioná tu nivel de estudios"
        },
        sexo: {
            required: "Seleccioná tu sexo"
        },
        deporte: {
            // Mensajes vacíos, ya que no es obligatorio
        }
        }
    })
})