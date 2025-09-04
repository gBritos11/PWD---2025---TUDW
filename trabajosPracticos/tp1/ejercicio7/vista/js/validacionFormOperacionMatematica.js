// Cuando el HTML este completamente cargado se ejecuta el codigo
$(document).ready(function(){
    // Metodo personalizado
    $.validator.addMethod("divisionPorCero", function(value, element){
        let bandera = true
        let operador = $("#operador").val(); // obtengo el valor del operador
        let operando2 = $("#operando2").val() // obtengo el valor del operando2

        if(operador === "dividir" && operando2 == 0){
            bandera = false
        }

        return bandera
    }, "No se puede dividir por 0"),

    // Indico el formulario y sus reglas
    $("#formOperacionMatematica").validate({
        // Reglas:
        rules:{
            operando1:{
                required: true,
                number: true
            },
            operando2:{
                required: true,
                number: true,
                divisionPorCero: true
            },
            operador:{
                required: true
            }
        },
        // Mensajes
        messages:{
            operando1:{
                required: "Por favor, ingresá un número",
                number: "Ingresar un caracter númerico"
            },
            operando2:{
                required: "Por favor, ingresá un número",
                number: "Ingresar un caracter númerico"
            },
            operador:{
                required: "Por favor, seleccionar una operación"
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