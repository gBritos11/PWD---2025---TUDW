<?php
// Inicio sesión
session_start();

$dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
$horas = [];


for ($i=0; $i < 7; $i++) { 
    if(!isset($_POST[$dias[$i]]) || $_POST[$dias[$i]] === "" || !is_numeric($_POST[$dias[$i]]) || $_POST[$dias[$i]] < 0 ||  $_POST[$dias[$i]] > 12 || fmod($_POST[$dias[$i]], 0.5) !== 0.0){
        // Mensaje de error
        $_SESSION['resultado'] = 'Por favor, ingresar valores validos';
        header('Location: ../vista/index.php');
        exit();
    }else{
        $horas[] = (float) $_POST[$dias[$i]];
    }
}

// Proceso de datos
$totalHoras = array_sum($horas);

// Devuelvo el resultado
$_SESSION['resultado'] = "Durante la semana se cursan $totalHoras horas de PWD.";
header('Location: ../vista/index.php');
exit();