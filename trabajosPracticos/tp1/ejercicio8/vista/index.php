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
        <form id="formCalcularPrecio" name="formCalcularPrecio" action="../Control/controladorCalcularPrecio.php" method="post">
            <fieldset>
                <legend>Calcular Precio</legend>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad" min="0" step="1" required>
                <fieldset>
                    <legend>Estudiante?</legend>
                    <label for="estudiante_si">Si</label>
                    <input type="radio" name="esEstudiante" id="estudiante_si" value="1">
                    <label for="estudiante_no">No</label>
                    <input type="radio" name="esEstudiante" id="estudiante_no" value="0">
                </fieldset>
                <input type="submit" name="submit" value="Calcular precio">
                <input type="reset" value="Deshacer">
            </fieldset>
        </form>
    

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['precio'])) {
                echo "<h2>Precio:</h2>";
                echo "<p>" . $_SESSION['precio'] . "</p>";
                unset($_SESSION['precio']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionCalcularPrecio.js"></script>
    </body>
</html>