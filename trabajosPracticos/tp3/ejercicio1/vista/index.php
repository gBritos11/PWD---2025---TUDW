<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            // header
            include_once '../../../includes/head.php';
        ?>
    </head>
    <body>
        
        <form id="formSubirArchivo" name="formSubirArchivo" action="../control/controladorFormSubirArchivo.php" method="post" enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Subir Archivo</legend>
                <label for="archivo">Subir Archivo</label>
                <input type="file" name="archivo" id="archivo">
                <input type="submit" value="Enviar">
            </fieldset>
        </form>

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['resultado'])) {
                echo '<a href="'.$_SESSION['resultado'].'">Archivo subido</a>';
            }elseif(isset($_SESSION['mensaje'])){
                echo '<p>'.$_SESSION['mensaje'].'</p>';
            }

            unset($_SESSION['resultado'], $_SESSION['mensaje']); // Limpio para que no quede persistente
            include_once '../../../includes/footer.php';
        ?>

    </body>
</html>