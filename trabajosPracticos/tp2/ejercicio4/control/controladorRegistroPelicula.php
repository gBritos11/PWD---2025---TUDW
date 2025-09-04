<?php
// Exporto clases desde modelo
require_once '../modelo/persona.php';
require_once '../modelo/pelicula.php';
require_once '../../../tp3/ejercicio1/modelo/archivo.php';

// Inicio sesión
session_start();

// Comprobación variable
if(
    isset(
        $_POST['titulo'],
        $_POST['director'],
        $_POST['produccion'],
        $_POST['nacionalidad'],
        $_POST['duracion'],
        $_POST['actores'],
        $_POST['guion'],
        $_POST['anio'],
        $_POST['genero'],
        $_POST['restriccionEdad'],
        $_POST['sinopsis']
    ) &&
    is_numeric($_POST['anio']) &&
    $_POST['anio'] > 999 &&
    $_POST['anio'] < 2026 &&
    is_numeric($_POST['duracion']) &&
    $_POST['duracion'] > 0 &&
    $_POST['duracion'] < 1000
){
    // Obtengo las variable
    $titulo = trim($_POST['titulo']);
    $director = trim($_POST['director']);
    $produccion = trim($_POST['produccion']);
    $nacionalidad = trim($_POST['nacionalidad']);
    $duracion = (int)$_POST['duracion'];
    $inputActores = trim($_POST['actores']);// nombre + apellido de los actores separados por comas
    $guion = trim($_POST['guion']);
    $anio = (int)$_POST['anio'];
    $genero = $_POST['genero'];
    $restriccionEdad = $_POST['restriccionEdad'];
    $sinopsis = trim($_POST['sinopsis']);

    // Creo instancias de personas para actor
    // Separos los actores en nombre + apellido y los guardo en un array
    $arrayActores = explode(",", $inputActores);
    // Array actores
    $personas = [];

    // Recorro el array de actores para obtener el nombre y apellido de cada uno
    foreach($arrayActores as $nombreActores){
        $nombreActor = trim($nombreActores);

        // Separo en palabra
        $partes = explode(" ", $nombreActor);

        // Primera palabra nombre del actor, el resto apellido
        $nombre = $partes[0];
        $apellido = implode(" ", array_slice($partes, 1));

        // Creo las instancias de actor
        $actor = new Persona($nombre, $apellido, 'actor');

        // Las guardo en un array
        $personas[] = $actor;
    }

    // Creo instacia de persona para director
    $partesDirector = explode(" ", $director);
    $nombreDirector = $partesDirector[0];
    $apellidoDirector = implode(" ", array_slice($partesDirector, 1));
    $director = new Persona($nombreDirector, $apellidoDirector, "director");
    $personas[] = $director;

    // Creo instancia de persona para guion
    $partesGuion = explode(" ", $guion);
    $nombreGuion = $partesGuion[0];
    $apellidoGuion = implode(" ", array_slice($partesGuion, 1));
    $guion = new Persona($nombreGuion, $apellidoGuion, "guion");
    $personas[] = $guion;

    $pelicula = new pelicula(
        $titulo,
        $personas,
        $produccion,
        $anio,
        $nacionalidad,
        $genero,
        $duracion,
        $restriccionEdad,
        $sinopsis
    );

    // Proceso la imagen
    // Verifico que se haya subido una imagen y sin error
    $_SESSION['imagenSubida'] = "";
    $mensajeImagen = "";
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] !== UPLOAD_ERR_NO_FILE){
        $imagen = $_FILES['imagen'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];

        $archivo = new archivo(
            $imagen['name'],
            $imagen['type'],
            $imagen['size'],
            $imagen['tmp_name'],
            $imagen['error']
        );

        if($archivo->validarTipoMime($tiposPermitidos)){
            if($archivo->validarTamanio(8)){
                if($archivo->getError() !== UPLOAD_ERR_OK){
                    $ruta = "../vista/imagenes/";
                    $nombreUnico = $archivo->generarNombreUnico();
                    $rutaFinal = $ruta . $nombreUnico;

                    if(move_uploaded_file($archivo->getRuta(), $rutaFinal)){
                        $_SESSION['imagenSubida'] = $rutaFinal;
                    } else {
                        $mensajeImagen = "Error al mover la imagen a la carpeta destino.";
                    }
                } else {
                    $mensajeImagen = "Error al subir la imagen. Código de error: " . $imagen['error'];
                }
            } else {
                $mensajeImagen = "La imagen es demasiado grande. Máximo permitido: 8 MB.";
            }
        } else {
            $mensajeImagen = "Formato de imagen no permitido. Solo JPG, PNG o WEBP.";
        }
    }else{
        $mensajeImagen = "No se subio ninguna imagen";
    }

    // Guardo el resultado
    $_SESSION['resultado'] = $pelicula;
    $_SESSION['mensajeImagen'] = $mensajeImagen;
    header('Location:../vista/index.php');
    exit();
}else{
    // Faltan datos o hay errores
    $mensaje = "Por favor completá todos los campos correctamente.";
    $_SESSION['resultado'] = $mensaje;
    header('Location:../vista/index.php');
    exit();
}