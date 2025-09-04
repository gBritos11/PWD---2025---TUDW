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
            <form id="formHoras" name="formHoras" action="../Control/controladorFormHoras.php" method="post" novalidate>
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-clock me-2"></i>Horas cursadas por día de PWD
                    </div>

                    <?php
                        $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];

                        for ($i=0; $i < 7; $i++) { 
                            echo '
                                <div class="mb-2 mx-auto">
                                    <label class="form-label" for="'.$dias[$i].'">'.$dias[$i].': </label>
                                    <input class="form-control" type="number" name="'.$dias[$i].'" id="'.$dias[$i].'" min="0" max="12" step="0.5" value="0" required>
                                </div>
                            ';
                        }
                    ?>

                    <div class="d-grid mb-2">
                        <input class="btn btn-success" type="submit" name="submit" value="Enviar">
                    </div>

                </fieldset>
            </form>
        </div>
        
        <!-- Obtengo el resultado -->
        <?php
            if(isset($_SESSION['resultado'])){   
                echo '<div class="alert alert-info text-center mb-0">';
                echo "<h2>Total de horas:</h2>";
                echo "<p>".$_SESSION['resultado']."</p>";
                echo '</div>';

                // Limpio la variable
                unset($_SESSION['resultado']);
            }

            include_once '../../../includes/footer.php';
        ?>

        <!-- Script para validar formulario Ejercicio2 -->
         <script src="../vista/js/validacionFormHoras.js"></script>
    </body>
</html>