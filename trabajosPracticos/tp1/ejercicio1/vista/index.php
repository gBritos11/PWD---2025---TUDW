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
        <form id="formNum" name="formNum" action="../Control/controladorFormNum.php" method="post" novalidate>
            <fieldset>
                <legend>Números</legend>
                <label for="num">Ingresar número</label> 
                <input type="number" name="num" id="num">
                <input type="submit" name="submit" value="Enviar">
            </fieldset>
        </form>
    

        <!-- Obtengo el resultado -->
        <?php
            if(isset($_SESSION['resultado'])){
                echo '<p>'.$_SESSION['resultado'].'</p>';
                // limpio la variable
                unset($_SESSION['resultado']);
            }

            include_once '../../../includes/footer.php'
        ?>
        <!-- Script para validar formulario Ejercicio1 -->
        <script src="../vista/js/validacionFormNum.js"></script>
    </body>
</html>