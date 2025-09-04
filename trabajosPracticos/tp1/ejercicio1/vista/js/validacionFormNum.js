// Cuando el HTML este completamente cargado se ejecuta el codigo
$(document).ready(function(){
    // Indico el formulario y sus reglas
    $("#formNum").validate({
        // Reglas:
        rules:{
            num:{
                required: true,
                number: true
            }
        },
        messages:{
            num:{
                required: "Por favor, ingresá un número",
                number: "Por favor, ingresá un caracter númerico"
            }
        }
    })
})