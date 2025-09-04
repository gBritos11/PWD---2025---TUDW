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
        
        <form id="formSubirArchivoTXT" name="formSubirArchivoTXT" action="../control/controladorFormSubirArchivoTXT.php" method="post" enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Subir Archivo TXT</legend>
                <label for="archivo">Subir Archivo</label>
                <input type="file" name="archivo" id="archivo">
                <input type="submit" value="Enviar">
            </fieldset>
        </form>

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['resultado'])) {
                echo '<label for="contenido">Contenido del archivo:</label>';
                echo '
                    <textarea id="contenido" rows="10" cols="80" readonly>'
                    . htmlspecialchars($_SESSION['resultado']) .
                    '</textarea>
                ';
            }elseif(isset($_SESSION['mensaje'])){
                echo '<p>'.$_SESSION['mensaje'].'</p>';
            }

            unset($_SESSION['resultado'], $_SESSION['mensaje']); // Limpio para que no quede persistente
            include_once '../../../includes/footer.php';
        ?>

    </body>
</html>