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