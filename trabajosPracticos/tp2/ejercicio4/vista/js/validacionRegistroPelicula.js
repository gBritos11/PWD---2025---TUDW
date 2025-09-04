$(document).ready(function () {
    // Validación personalizada: evitar caracteres especiales
    $.validator.addMethod("sinCaracteresEspeciales", function (value, element) {
        return this.optional(element) || /^[a-zA-ZÁÉÍÓÚáéíóúÑñ0-9\s,.-]+$/.test(value);
    }, "No se permiten caracteres especiales.");

    // Validación personalizada: nombre y apellido separados por espacio
    $.validator.addMethod("nombreCompleto", function (value, element) {
        return this.optional(element) || /\w+\s+\w+/.test(value);
    }, "Debe ingresar nombre y apellido.");

    // Año actual dinámico
    const anioActual = new Date().getFullYear();

    $("#formRegistroPelicula").validate({
        rules: {
            titulo: {
                required: true,
                minlength: 2,
                sinCaracteresEspeciales: true
            },
            director: {
                required: true,
                minlength: 2,
                nombreCompleto: true
            },
            produccion: {
                required: true,
                minlength: 2,
                sinCaracteresEspeciales: true
            },
            nacionalidad: {
                required: true,
                minlength: 2,
                sinCaracteresEspeciales: true
            },
            duracion: {
                required: true,
                digits: true,
                min: 30,
                max: 300
            },
            actores: {
                required: true,
                minlength: 2,
                sinCaracteresEspeciales: true,
                nombreCompleto: true
            },
            guion: {
                required: true,
                minlength: 2,
                nombreCompleto: true
            },
            anio: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4,
                min: 1900,
                max: anioActual
            },
            genero: {
                required: true
            },
            restriccionEdad: {
                required: true
            },
            sinopsis: {
                required: true,
                minlength: 5,
                sinCaracteresEspeciales: true
            },
            imagen:{
                extension: "jpg|jpeg|png|webp"
            }
        },
        messages: {
            titulo: {
                required: "Por favor, ingrese un título.",
                minlength: "Debe tener al menos 2 caracteres.",
                sinCaracteresEspeciales: "No se permiten símbolos raros."
            },
            director: {
                required: "Ingrese el nombre del director.",
                minlength: "Debe tener al menos 2 caracteres.",
                nombreCompleto: "Ingrese nombre y apellido."
            },
            produccion: {
                required: "Ingrese la productora.",
                minlength: "Debe tener al menos 2 caracteres.",
                sinCaracteresEspeciales: "No se permiten símbolos raros."
            },
            nacionalidad: {
                required: "Ingrese la nacionalidad.",
                minlength: "Debe tener al menos 2 caracteres.",
                sinCaracteresEspeciales: "No se permiten símbolos raros."
            },
            duracion: {
                required: "Ingrese la duración.",
                digits: "Solo números.",
                min: "Mínimo 30 minutos.",
                max: "Máximo 300 minutos."
            },
            actores: {
                required: "Ingrese al menos un actor.",
                minlength: "Debe tener al menos 2 caracteres.",
                sinCaracteresEspeciales: "No se permiten símbolos raros.",
                nombreCompleto: "Ingrese nombre y apellido."
            },
            guion: {
                required: "Ingrese el guionista.",
                minlength: "Debe tener al menos 2 caracteres.",
                nombreCompleto: "Ingrese nombre y apellido."
            },
            anio: {
                required: "Ingrese el año.",
                digits: "Solo números.",
                minlength: "Debe tener 4 dígitos.",
                maxlength: "Debe tener 4 dígitos.",
                min: "Mínimo año 1900.",
                max: `Máximo año ${anioActual}.`
            },
            genero: {
                required: "Seleccione un género."
            },
            restriccionEdad: {
                required: "Seleccione una restricción de edad."
            },
            sinopsis: {
                required: "Ingrese una sinopsis.",
                minlength: "Debe tener al menos 5 caracteres.",
                sinCaracteresEspeciales: "No se permiten símbolos raros."
            },
            imagen:{
                extension: "Solo se permiten archivos JPG, PNG o WEBP."
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if (element.prop("type") === "radio") {
                error.appendTo(element.closest(".col-md-12"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});
