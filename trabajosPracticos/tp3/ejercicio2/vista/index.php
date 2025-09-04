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
    <body class="bg-secondary">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <form id="formSubirArchivoTXT" name="formSubirArchivoTXT" action="../control/controladorFormSubirArchivoTXT.php" method="post" enctype="multipart/form-data" novalidate>
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-file-earmark-text me-2"></i>Subir archivo TXT
                    </div>
                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="archivo">Subir Archivo</label>
                        <input class="form-control" type="file" name="archivo" id="archivo">
                    </div>
                    <div class="d-grid mb-2">
                        <input class="btn btn-success" type="submit" name="submit" value="Enviar">
                    </div>
                </fieldset>
            </form>
        </div>

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['resultado'])) {
                echo '
                    <div class="mb-3 class="alert alert-info text-center">
                        <label for="contenido" class="form-label">Contenido del archivo: </label>
                        <textarea id="contenido" rows="10" cols="80" readonly class="form-control bg-light">
                        '.htmlspecialchars($_SESSION['resultado']).'
                        </textarea>
                    </div>
                ';
            }elseif(isset($_SESSION['mensaje'])){
                echo '<div class="alert alert-info text-center">'.$_SESSION['mensaje'].'</div>';
            }

            unset($_SESSION['resultado'], $_SESSION['mensaje']); // Limpio para que no quede persistente
            include_once '../../../includes/footer.php';
        ?>

    </body>
</html>