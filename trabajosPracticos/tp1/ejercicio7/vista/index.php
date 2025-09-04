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
        <form id="formOperacionMatematica" name="formOperacionMatematica" action="../Control/controladorOperacionMatematica.php" method="post">
            <fieldset>
                <legend>Operación Matemática</legend>
                <label for="operando1">Operando1: </label>
                <input type="text" name="operando1" id="operando1">
                <label for="operando2">Operando2: </label>
                <input type="text" name="operando2" id="operando2">
                <label for="operador">Operador: </label>
                <select name="operador" id="operador">
                    <option value="invalido">Elegir</option>
                    <option value="sumar">Sumar</option>
                    <option value="restar">Restar</option>
                    <option value="multiplicar">Multiplicar</option>
                    <option value="dividir">Dividir</option>
                </select>
                <input type="submit" name="submit" value="Enviar">
            </fieldset>
        </form>
    

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['resultado'])) {
                echo "<p>" . $_SESSION['resultado'] . "</p>";
                unset($_SESSION['resultado']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionFormOperacionMatematica.js"></script>
    </body>
</html>