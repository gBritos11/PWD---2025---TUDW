<?php
// Inicio sesión
session_start();

// Exporto clase de Operacion desde modelo
require_once '../modelo/operacion.php';

// Comprobación de variables
if(
    isset(
        $_POST['operando1'],
        $_POST['operando2']    
    ) &&
    is_numeric($_POST['operando1']) &&
    is_numeric($_POST['operando2']) &&
    $_POST['operador'] != "invalido"
){
    // Creo una instancia del objeto Operacion
    $operacion = new Operacion(
        $_POST['operando1'],
        $_POST['operando2'],
        $_POST['operador']
    );

    $_SESSION['resultado'] = $operacion->__toString().$operacion->resolver();
    header('Location:../vista/index.php');
    exit();
}else{
    // Faltan datos o hay errores
    $mensaje = "Por favor completá todos los campos correctamente.";
    $_SESSION['resultado'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}