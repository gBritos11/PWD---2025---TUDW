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
    <body>
        <form id="formDatosPersonas" name="formDatosPersonas" action="../Control/controladorFormDatosPersonas.php" method="post" novalidate>
            <fieldset>
                <legend>Datos Persona</legend>
                <div class="datosPersonales">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre">
                    <label for="apellido">Apellido: </label>
                    <input type="text" name="apellido" id="apellido">
                    <label for="edad">Edad: </label>
                    <input type="number" name="edad" id="edad" min="0" step="1">
                    <label for="direccion">Direccion: </label>
                    <input type="text" name="direccion" id="direccion">
                </div>
                <div class="fieldsetSexoEstudios">
                    <fieldset>
                        <legend>Estudios: </legend>
                        <label for="sinEstudios">Sin estudios</label>
                        <input value="-" type="radio" name="estudios" id="sinEstudios">
                        <label for="estudiosPrimarios">Primarios</label>
                        <input value="primarios" type="radio" name="estudios" id="estudiosPrimarios">
                        <label for="estudiosSecundarios">Secundarios</label>
                        <input value="secundarios" type="radio" name="estudios" id="estudiosSecundarios">
                        <label for="estudiosUniversitarios">Universitarios</label>
                        <input value="universitarios" type="radio" name="estudios" id="estudiosUniversitarios">
                    </fieldset>
                    <fieldset>
                        <legend>Sexo: </legend>
                        <label for="masc">Masculino</label>
                        <input value="masculino" type="radio" name="sexo" id="masc">
                        <label for="fem">Femenino</label>
                        <input value="femenino" type="radio" name="sexo" id="fem">
                        <label for="noBinario">No binario</label>
                        <input value="no binario" type="radio" name="sexo" id="noBinario">
                    </fieldset>
                    <fieldset>
                        <legend>Deportes: </legend>
                        <label for="futbol">Futbol</label>
                        <input type="checkbox" name="deporte[]" id="futbol" value="futbol">
                        <label for="basquet">Basquet</label>
                        <input type="checkbox" name="deporte[]" id="basquet" value="basquet">
                        <label for="tenis">Tenis</label>
                        <input type="checkbox" name="deporte[]" id="tenis" value="tenis">
                        <label for="voley">Voley</label>
                        <input type="checkbox" name="deporte[]" id="voley" value="voley">
                    </fieldset>
                </div>
                <input type="submit" name="submit" value="Enviar">
            </fieldset>
        </form>
    

        <!-- Obtengo el resultado -->
        <?php
            if (isset($_SESSION['mensaje'])) {
                echo "<p>" . $_SESSION['mensaje'] . "</p>";
                unset($_SESSION['mensaje']); // Limpio para que no quede persistente
            }

            include_once '../../../includes/footer.php';
        ?>

        <script src="../vista/js/validacionFormDatosPersonas.js"></script>
    </body>
</html>