<?php
// Inicio sesión
session_start();

// Exporto clase de Operacion desde modelo
require_once '../modelo/cliente.php';

// Comprobación de variables
if(
    isset(
        $_POST['nombre'],
        $_POST['edad'],
        $_POST['esEstudiante']
    ) &&
    is_numeric($_POST['edad']) &&
    !is_numeric($_POST['nombre'])
){
    // Creo una instancia de Cliente
    $cliente = new Cliente(
        htmlspecialchars(trim($_POST['nombre'])),
        (int)$_POST['edad'],
        (bool)$_POST['esEstudiante']
    );

    $_SESSION['precio'] = $cliente->getNombre() . " el valor de tu entrada es de $" . $cliente->calcularPrecio();
    header('Location:../vista/index.php');
    exit();
}else{
    // Faltan datos o hay errores
    $mensaje = "Por favor completá todos los campos correctamente.";
    $_SESSION['precio'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}