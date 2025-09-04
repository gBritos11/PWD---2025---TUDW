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
            <form id="formOperacionMatematica" name="formOperacionMatematica" action="../Control/controladorOperacionMatematica.php" method="post">
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-calculator me-2"></i>Operación matemática
                    </div>

                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="operando1">Operando1: </label>
                        <input class="form-control" type="text" name="operando1" id="operando1">
                    </div>

                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="operando2">Operando2: </label>
                        <input class="form-control" type="text" name="operando2" id="operando2">
                    </div>

                    <div class="mb-2 mx-auto">
                        <label class="form-label" for="operador">Operador: </label>
                        <select name="operador" id="operador" class="form-select">
                            <option value="invalido">Elegir</option>
                            <option value="sumar">Sumar</option>
                            <option value="restar">Restar</option>
                            <option value="multiplicar">Multiplicar</option>
                            <option value="dividir">Dividir</option>
                        </select>
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
                echo '<div class="alert alert-info text-center">' . $_SESSION['resultado'] . '</div>';
                unset($_SESSION['resultado']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionFormOperacionMatematica.js"></script>
    </body>
</html>