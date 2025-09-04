# JQuery

Es una librería de JavaScript creada para simplificar tareas comunes como:

* Manipular el DOM (elementos HTML).
* Manejar eventos (click, submit, etc.).
* Hacer animaciones.
* Trabajar con AJAX.

## Sintaxis:

La sintaxis de jQuery es más corta y legible que JS puro.

Por ejemplo:

JS->	document.getElementById("nombre").value;

JQuery->	$("#nombre").val();


Otra ventaja es que cuenta con muchos plugins para usar, tales como JQuery Validation Plugin para validar formularios


### Utilizar JQuery y JQuery Validation

Para ello utilizaremos las siguientes líneas:

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> // JQuery


<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script> // JQuery Validation


### Funciones principales

Dos de las funciones que más se utilizan son:


$(document).ready(function(){

&nbsp;   // código acá

});

-> Está función dice: cuando el documento HTML esté cargado y listo, ejecutá el código que está adentro


$("#miFormulario").validate({

&nbsp;   // reglas y mensajes acá

});

-> Esto aplica el plugin jQuery Validate sobre el formulario con id="miFormulario". Básicamente le dice al plugin: “Valida este formulario con las reglas que yo defina”