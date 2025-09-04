<?php
// Inicio sesión
session_start();

// Obtengo el numero enviado por el formulario
$num = (int)$_POST['num'];

// Verifico que el campo exista y sea un número
if(isset($num) && is_numeric($num)){
    // Defino el mensaje del resultado
    if($num == 0){
        $resultado = 'El número ingresado es 0';
    }elseif($num > 0){
        $resultado = 'El número ingresado es positivo';
    }else{
        $resultado = 'El número ingresado es negativo';
    }

    // Devuelvo el resultado
    $_SESSION['resultado'] = $resultado;
    header('Location: ../vista/index.php');
    exit();
}else{
    // Devuelvo mensaje de error
    $_SESSION['resultado'] = 'Error: debe ingresar un número válido';
    header('Location: ../vista/index.php');
    exit();
}