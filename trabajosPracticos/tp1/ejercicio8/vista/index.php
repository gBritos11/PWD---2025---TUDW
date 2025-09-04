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
            <form id="formCalcularPrecio" name="formCalcularPrecio" action="../Control/controladorCalcularPrecio.php" method="post">
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-currency-dollar me-2"></i>Calcular precio
                    </div>
                    
                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="nombre">Nombre: </label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                    </div>

                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="edad">Edad: </label>
                        <input class="form-control" type="number" name="edad" id="edad" min="0" step="1" required>
                    </div>

                    
                    <fieldset class="mb-3">
                        <legend class="form-label">¿Estudiante?</legend>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="esEstudiante" id="estudiante_si" value="1">
                            <label class="form-check-label" for="estudiante_si">Sí</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="esEstudiante" id="estudiante_no" value="0">
                            <label class="form-check-label" for="estudiante_no">No</label>
                        </div>
                    </fieldset>


                    <div class="d-flex gap-2 mt-3">
                        <input type="submit" name="submit" value="Calcular precio" class="btn btn-primary">
                        <input type="reset" value="Deshacer" class="btn btn-secondary">
                    </div>
                </fieldset>
            </form>
        </div>
    

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['precio'])) {
                echo '<div class="alert alert-info text-center">';
                echo "<h2 h4 text-primary mb-3 >Precio:</h2>";
                echo $_SESSION['precio'] . '</div>';
                unset($_SESSION['precio']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionCalcularPrecio.js"></script>
    </body>
</html>