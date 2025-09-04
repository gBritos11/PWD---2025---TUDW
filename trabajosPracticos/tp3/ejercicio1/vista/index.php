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
            <form id="formSubirArchivo" name="formSubirArchivo" action="../control/controladorFormSubirArchivo.php" method="post" enctype="multipart/form-data" novalidate>
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-file me-2"></i>Subir archivo
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
                    <div class="alert alert-info text-center">
                        <a class="link-primary me-2" href="'.$_SESSION['resultado'].'">Archivo subido</a>
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