<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            // header
            include_once '../../../includes/head.php';
            echo '<link rel="stylesheet" href="css/styleEjercicio3.css">';
        ?>
    </head>
    <body class="bg-secondary">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <form id="formDatosPersonas" name="formDatosPersonas" action="../Control/controladorFormDatosPersonas.php" method="post" novalidate>
                <fieldset class="border p-4 rounded shadow bg-light">
                    <div class="p-2 fw-bold">
                        <i class="bi bi-person me-2"></i>Datos Persona
                    </div>

                    <div class="datosPersonales">
                        <div class="mb-2 mx-auto">
                            <label class="form-label" for="nombre">Nombre: </label>
                            <input class="form-control" type="text" name="nombre" id="nombre">
                        </div>

                        <div class="mb-2 mx-auto">
                            <label class="form-label" for="apellido">Apellido: </label>
                            <input class="form-control" type="text" name="apellido" id="apellido">
                        </div>
                        
                        <div class="mb-2 mx-auto">
                            <label class="form-label" for="edad">Edad: </label>
                            <input class="form-control" type="number" name="edad" id="edad" min="0" step="1">
                        </div>
                        
                        <div class="mb-2 mx-auto">
                            <label class="form-label" for="direccion">Direccion: </label>
                            <input class="form-control" type="text" name="direccion" id="direccion">
                        </div>
                    </div>

                    <div class="fieldsetSexoEstudios">
                        <fieldset class="mg-3">
                            <legend class="fs-5">Estudios:</legend>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="estudios" id="sinEstudios" value="-">
                                <label class="form-check-label" for="sinEstudios">Sin estudios</label>
                            </div>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="estudios" id="estudiosPrimarios" value="primarios">
                                <label class="form-check-label" for="estudiosPrimarios">Primarios</label>
                            </div>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="estudios" id="estudiosSecundarios" value="secundarios">
                                <label class="form-check-label" for="estudiosSecundarios">Secundarios</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="estudios" id="estudiosUniversitarios" value="universitarios">
                                <label class="form-check-label" for="estudiosUniversitarios">Universitarios</label>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <legend class="fs-5">Sexo:</legend>

                            <div class="form-check mb-1">
                                <input class="form-check-input" value="masculino" type="radio" name="sexo" id="masc">
                                <label class="form-check-label" for="masc">Masculino</label>
                            </div>

                            <div class="form-check mb-1">
                                <input class="form-check-input" value="femenino" type="radio" name="sexo" id="fem">
                                <label class="form-check-label" for="fem">Femenino</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" value="no binario" type="radio" name="sexo" id="noBinario">
                                <label class="form-check-label" for="noBinario">No binario</label>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <legend class="fs-5">Deportes:</legend>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="checkbox" name="deporte[]" id="futbol" value="futbol">
                                <label class="form-check-label" for="futbol">Fútbol</label>
                            </div>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="checkbox" name="deporte[]" id="basquet" value="basquet">
                                <label class="form-check-label" for="basquet">Básquet</label>
                            </div>

                            <div class="form-check mb-1">
                                <input class="form-check-input" type="checkbox" name="deporte[]" id="tenis" value="tenis">
                                <label class="form-check-label" for="tenis">Tenis</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="deporte[]" id="voley" value="voley">
                                <label class="form-check-label" for="voley">Vóley</label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="d-grid mb-2">
                        <input class="btn btn-success" type="submit" name="submit" value="Enviar">
                    </div>
                </fieldset>
            </form>
        </div>
    

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['mensaje'])) {
                echo '<div class="alert alert-info text-center" >' . $_SESSION['mensaje'] . '</div>';
                unset($_SESSION['mensaje']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionFormDatosPersonas.js"></script>
    </body>
</html>