<?php
// Exporto clases desde modelo
require_once '../modelo/usuario.php';
require_once '../modelo/sistemaUsuario.php';

// Inicio sesión
session_start();

// Recuperar SistemaUsuario de la sesión o crear uno nuevo
if(isset($_SESSION['sistemaUsuarios'])){
    $sistemaUsuarios = $_SESSION['sistemaUsuarios'];
} else {
    $sistemaUsuarios = new SistemaUsuario;
}

// Comprobación de variables
if(
    isset(
        $_POST['username'],
        $_POST['password']
    ) &&
    $_POST['username'] <> $_POST['password'] &&
    strlen($_POST['password']) >= 8 &&
    strlen($_POST['username']) > 2
){
    // Obtengo las variables
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $mensaje = "Fallo en el registro";

    if($sistemaUsuarios->existeUsuario($username)){
        if($sistemaUsuarios->verificarUsuario($username, $password)){
            $mensaje = "Bienvenido $username!";
        }else{
            $mensaje = "La contraseña no coincide con el usuario";
        }
    }else{
        $sistemaUsuarios->agregarUsuario($username, $password);
        $mensaje = "Usuario registrado con exito!";
    }

    // Guardar SistemaUsuario actualizado en la sesión
    $_SESSION['sistemaUsuarios'] = $sistemaUsuarios;

    $_SESSION['resultado'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}else{
    // Faltan datos o hay errores
    $mensaje = "Por favor completá todos los campos correctamente.";
    $_SESSION['resultado'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}