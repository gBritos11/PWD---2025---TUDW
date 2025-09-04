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
        <form id="formHoras" name="formHoras" action="../Control/controladorFormHoras.php" method="post" novalidate>
            <fieldset>
                <legend>Horas de cursada por dia PWD</legend>

                <?php
                    $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

                    for ($i=0; $i < 7; $i++) { 
                        echo '<label for="'.$dias[$i].'">'.$dias[$i].': </label>
                            <input type="number" name="'.$dias[$i].'" id="'.$dias[$i].'" min="0" max="12" step="0.5" value="0" required>
                        ';
                    }
                ?>
                <input type="submit" name="submit" value="Enviar">
            </fieldset>
        </form>
    

        <!-- Obtengo el resultado -->
        <?php
            if(isset($_SESSION['resultado'])){                
                echo "<h2>Total de horas:</h2>";
                echo "<p>".$_SESSION['resultado']."</p>";

                // Limpio la variable
                unset($_SESSION['resultado']);
            }

            include_once '../../../includes/footer.php';
        ?>

        <!-- Script para validar formulario Ejercicio2 -->
         <script src="../vista/js/validacionFormHoras.js"></script>
    </body>
</html>