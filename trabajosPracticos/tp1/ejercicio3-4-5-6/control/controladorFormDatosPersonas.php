<?php
// Inicio session
session_start();

// Exporto clase Persona desde modelo
require_once '../modelo/persona.php';

// Compruebo que las variables existan y no sean nulas
if (
    isset(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['edad'],
        $_POST['direccion'],
        $_POST['estudios'],
        $_POST['sexo']
    ) &&
    !is_numeric($_POST['nombre']) &&
    !is_numeric($_POST['apellido']) &&
    is_numeric($_POST['edad'])
){
    // Si ['deporte'] no es nulo lo guardo en un array, si es nulo simplemnte dejo el array vacio
    $deporte = $_POST['deporte'] ?? [];
    
    // Con los datos no nulos y validos, creo una instacia de persona
    $persona = new Persona(
        $_POST['nombre'],
        $_POST['apellido'],
        (int)$_POST['edad'],
        $_POST['direccion'],
        $_POST['estudios'],
        $_POST['sexo'],
        $deporte
    );

    $_SESSION['mensaje'] = $persona->presentacion();
    header('Location:../vista/index.php');
    exit();
} else {
    // Faltan datos o hay errores
    $mensaje = "Por favor completá todos los campos correctamente.";
    $_SESSION['mensaje'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}