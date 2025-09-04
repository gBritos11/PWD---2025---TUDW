// Cuando el HTML esté completamente cargado se ejecuta el código
$(document).ready(function(){
    // Defino un método personalizado
    $.validator.addMethod("enteroMedio", function(value, element) {
        return this.optional(element) || /^(?:\d+|\d+\.5)$/.test(value);
    }, "Por favor, ingresá un número entero o terminado en .5");

    // Inicializo la validación en el formulario
    $("#formHoras").validate();

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
