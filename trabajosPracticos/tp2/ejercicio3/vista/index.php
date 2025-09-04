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
            <div class="card shadow rounded-4 p-4">
                <form id="formLogin" name="formLogin" action="../control/controladorLogin.php" method="post" novalidate>
                    <fieldset>
                        <legend class="text-center mb-4">Member Login</legend>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Username">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="password" class="form-control border-start-0" placeholder="Password" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="d-grid">
                            <input class="btn btn-success" type="submit" name="submit" value="Login">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['resultado'])) {
                echo '<div class="alert alert-info text-center">' . $_SESSION['resultado'] . "</div>";
                unset($_SESSION['resultado']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionLogin.js"></script>
    </body>
</html>