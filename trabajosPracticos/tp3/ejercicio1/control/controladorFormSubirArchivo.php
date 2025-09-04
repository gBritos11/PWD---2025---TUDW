<?php
// Exporto clases
require_once '../modelo/archivo.php';

// Inicio sesión
session_start();

// Proceso el archivo
$mensajeArchivo = "";
$_SESSION['mensaje'] = "";
if(
    isset($_FILES['archivo']) &&
    $_FILES['archivo']['error'] !== UPLOAD_ERR_NO_FILE &&
    $_FILES['archivo']['error'] <= 0
){
    $archivo = $_FILES['archivo'];
    $tipoPermitidos = ['application/msword', 'application/pdf'];

    $objArchivo = new archivo(
        $archivo['name'],
        $archivo['type'],
        $archivo['size'],
        $archivo['tmp_name'],
        $archivo['error']
    );

    if($objArchivo->validarTipoMime($tipoPermitidos)){
        if($objArchivo->validarTamanio(2)){
            if($objArchivo->getError() !== UPLOAD_ERR_OK){
                $ruta = "../vista/archivos/";
                $nombreUnico = $objArchivo->generarNombreUnico();
                $rutaFinal = $ruta . $nombreUnico;

                if(move_uploaded_file($objArchivo->getRuta(), $rutaFinal)){
                    $_SESSION['resultado'] = $rutaFinal;
                } else {
                    $mensajeArchivo = "Error al mover el archivo a la carpeta destino.";
                }
            }else{
                $mensajeArchivo = "Ocurrio un erro al subir el archivo";
            }
        }else{
            $mensajeArchivo = "El archivo supero el tamaño permitido";
        }
    }else{
        $mensajeArchivo = "El tipo de MIME no es valido";
    }

    // Guardo el resultado
    $_SESSION['mensaje'] = $mensajeArchivo;
    header('Location:../vista/index.php');
    exit();
}else{
    // Faltan datos o hay errores
    $mensaje = "Por favor subí un archivo.";
    $_SESSION['mensaje'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}