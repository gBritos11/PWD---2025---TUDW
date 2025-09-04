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
            <form id="formNum" name="formNum" action="../Control/controladorFormNum.php" method="post" novalidate>
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-bar-chart me-2"></i>Números
                    </div>

                    <div class="mb-2 mx-auto">
                        <label for="num" class="form-label">Ingresar número</label> 
                        <input type="number" name="num" id="num" class="form-control">
                    </div>

                    <div class="d-grid mb-2">
                        <input type="submit" class="btn btn-success" name="submit" value="Enviar">
                    </div>
                
                    <!-- Obtengo el resultado -->
                    <?php
                        if(isset($_SESSION['resultado'])){
                            echo '<div class="alert alert-info text-center">'.$_SESSION['resultado'].'</div>';
                            // limpio la variable
                            unset($_SESSION['resultado']);
                        }

                        include_once '../../../includes/footer.php'
                    ?>

                </fieldset>
            </form>
        </div>

        <!-- Script para validar formulario Ejercicio1 -->
        <script src="js/validacionFormNum.js"></script>
    </body>
</html>