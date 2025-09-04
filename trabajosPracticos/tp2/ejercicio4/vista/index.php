<?php
    include_once '../modelo/persona.php';
    include_once '../modelo/pelicula.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once '../../../includes/head.php'; ?>
</head>
<body>
    <form id="formRegistroPelicula" name="formRegistroPelicula"
          action="../control/controladorRegistroPelicula.php"
          method="post" class="container mt-4"
          enctype="multipart/form-data" novalidate>
        <fieldset class="border p-4 rounded shadow bg-light">
            <div class="bg-white shadow-sm rounded p-2 mb-4 text-primary fw-bold">
                <i class="bi bi-film me-2"></i>Cinem@s
            </div>
            <div class="row g-3">
                <!-- Columna izquierda -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" required>
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" name="director" id="director" placeholder="Director" required>
                    </div>
                    <div class="mb-3">
                        <label for="produccion" class="form-label">Producción</label>
                        <input type="text" class="form-control" name="produccion" id="produccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
                    </div>
                    <div class="mb-1 col-sm-6">
                        <label for="duracion" class="form-label">Duración</label>
                        <input type="number" class="form-control" name="duracion" id="duracion" min="1" max="999" step="1" required>
                    </div>
                    <div class="form-text mb-3 ms-1">En minutos</div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="4" required style="resize: none;"></textarea>
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="actores" class="form-label">Actores</label>
                        <input type="text" class="form-control" name="actores" id="actores" placeholder="Actor1, Actor2, Actor3..." required>
                    </div>
                    <div class="mb-3">
                        <label for="guion" class="form-label">Guión</label>
                        <input type="text" class="form-control" name="guion" id="guion" placeholder="Guión" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="anio" class="form-label">Año</label>
                        <input type="number" class="form-control" name="anio" id="anio" min="1000" max="2025" step="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" name="genero" id="genero" required>
                            <option value="comedia">Comedia</option>
                            <option value="drama">Drama</option>
                            <option value="terror">Terror</option>
                            <option value="romantica">Romántica</option>
                            <option value="suspenso">Suspenso</option>
                            <option value="otras">Otras</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label d-block mb-2">Restricciones de edad</label>
                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="restriccionEdad" id="todosLosPublicos" value="Todos los públicos" required>
                                <label class="form-check-label" for="todosLosPublicos">Todos los públicos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="restriccionEdad" id="mayores7" value="Mayores de 7 años">
                                <label class="form-check-label" for="mayores7">Mayores de 7 años</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="restriccionEdad" id="mayores18" value="Mayores de 18 años">
                                <label class="form-check-label" for="mayores18">Mayores de 18 años</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <label for="imagen" class="form-label">Subir póster</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>
                </div>

                <!-- Botones alineados a la derecha -->
                <div class="col-12 text-end">
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Enviar">
                    <input type="reset" class="btn btn-secondary" value="Borrar">
                </div>
            </div>
        </fieldset>
    </form>

    <!-- Obtengo el resultado -->
    <?php
        if (isset($_SESSION['resultado'])) {
            echo '<div class="alert w-50 mx-auto mt-4 alert-success">' . $_SESSION['resultado'] . '</div>';

            if (!empty($_SESSION['imagenSubida']) && file_exists($_SESSION['imagenSubida'])) {
                echo '<div class="card mx-auto mt-3" style="width: 18rem;">
                        <img src="' . $_SESSION['imagenSubida'] . '" alt="Póster de película" class="card-img-top">
                      </div>';
            } elseif (!empty($_SESSION['mensajeImagen'])) {
                echo '<div class="alert alert-danger w-50 mx-auto mt-3">' . htmlspecialchars($_SESSION['mensajeImagen']) . '</div>';
            }

            unset($_SESSION['resultado'], $_SESSION['imagenSubida'], $_SESSION['mensajeImagen']);
        }
        include_once '../../../includes/footer.php'
    ?>
    <script src="../vista/js/validacionRegistroPelicula.js"></script>
</body>
</html>