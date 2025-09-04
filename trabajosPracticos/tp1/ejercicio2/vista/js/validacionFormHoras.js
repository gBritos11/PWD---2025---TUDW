$(document).ready(function(){
    // Defino un método personalizado
    $.validator.addMethod("enteroMedio", function(value, element) {
        return this.optional(element) || /^(?:\d+|\d+\.5)$/.test(value);
    }, "Por favor, ingresá un número entero o terminado en .5");

    // Inicializo la validación en el formulario con opciones personalizadas
    $("#formHoras").validate({
        errorClass: "invalid-feedback", // clase Bootstrap
        errorElement: "div", // para que sea un div debajo del input
        highlight: function(element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) {
            $(element).removeClass("is-invalid");
        },
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element); // mensaje debajo del input
        }
    });

    // Recorro todos los inputs numéricos dentro del formulario
    $("#formHoras input[type=number]").each(function(){
        $(this).rules("add", {
            required: true,
            enteroMedio: true,
            messages:{
                required: "Por favor, ingresá un número",
                enteroMedio: "Las horas solamente aceptan valores enteros (0,1,2...) o medios (0.5, 1.5, 2.5...)"
            }
        });
    });
});
