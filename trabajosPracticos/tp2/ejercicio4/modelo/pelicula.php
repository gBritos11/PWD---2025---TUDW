<?php
// Clase Pelicula
class pelicula{
    private string $titulo;
    private array $colPersonas; // Personas(actores, director, guionista)
    private string $produccion;
    private int $anio;
    private string $nacionalidad;
    private string $genero;
    private int $duracion;
    private string $restriccionEdad;
    private string $sinopsis;

    // Constructor
    public function __construct(
        string $titulo,
        array $colPersonas,
        string $produccion,
        int $anio,
        string $nacionalidad,
        string $genero,
        int $duracion,
        string $restriccionEdad,
        string $sinopsis
    )
    {
        $this->titulo = $titulo;
        $this->colPersonas = $colPersonas;
        $this->produccion = $produccion;
        $this->anio = $anio;
        $this->nacionalidad = $nacionalidad;
        $this->genero = $genero;
        $this->duracion = $duracion;
        $this->restriccionEdad = $restriccionEdad;
        $this->sinopsis = $sinopsis;
    }

    // Getters
    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getColPersonas(): array{
        return $this->colPersonas;
    }

    public function getProduccion(): string{
        return $this->produccion;
    }

    public function getAnio(): int{
        return $this->anio;
    }

    public function getNacionalidad(): string{
        return $this->nacionalidad;
    }

    public function getGenero(): string{
        return $this->genero;
    }

    public function getDuracion(): int{
        return $this->duracion;
    }

    public function getRestriccionEdad(): string{
        return $this->restriccionEdad;
    }

    public function getSinopsis(): string{
        return $this->sinopsis;
    }

    // Setters
    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }

    public function setColPersonas(array $colPersonas): void{
        $this->colPersonas = $colPersonas;
    }

    public function setProduccion(string $produccion): void{
        $this->produccion = $produccion;
    }

    public function setAnio(int $anio): void{
        $this->anio = $anio;
    }

    public function setNacionalidad(string $nacionalidad): void{
        $this->nacionalidad = $nacionalidad;
    }

    public function setGenero(string $genero): void{
        $this->genero = $genero;
    }

    public function setDuracion(int $duracion): void{
        $this->duracion = $duracion;
    }

    public function setRestriccionEdad(string $restriccionEdad): void{
        $this->restriccionEdad = $restriccionEdad;
    }

    public function setSinopsis(string $sinopsis): void{
        $this->sinopsis = $sinopsis;
    }

    // toString
    public function __toString(): string{
        $titulo = $this->getTitulo();
        $produccion = $this->getProduccion();
        $anio = $this->getAnio();
        $nacionalidad = $this->getNacionalidad();
        $genero = $this->getGenero();
        $duracion = $this->getDuracion();
        $restriccionEdad = $this->getRestriccionEdad();
        $sinopsis = $this->getSinopsis();
        $colPersonas = $this->getColPersonas();
        $actores = [];
        $director = "";
        $guion = "";

        foreach ($colPersonas as $persona) {
            $rol = $persona->getRol();

            if($rol == "actor"){
                $actores[] = (string)$persona;
            }else if($rol == "director"){
                $director = "$persona";
            }else{
                $guion = "$persona";
            }
        }

        $cadenaActores = "Actores: ".implode(", ", $actores);

        return '
            <h2 class="alert-heading text-primary">La película introducida es</h2>
            <p>
                <span class="fw-bold">Título:</span> '.$titulo.'<br>'.
                '<span class="fw-bold">Actores:</span> '.$cadenaActores.'<br>'.
                '<span class="fw-bold">Director:</span> '.$director.'<br>'.
                '<span class="fw-bold">Guión:</span> '.$guion.'<br>'.
                '<span class="fw-bold">Producción:</span> '.$produccion.'<br>'.
                '<span class="fw-bold">Año:</span> '.$anio.'<br>'.
                '<span class="fw-bold">Nacionalidad:</span> '.$nacionalidad.'<br>'.
                '<span class="fw-bold">Género:</span> '.$genero.'<br>'.
                '<span class="fw-bold">Duración:</span> '.$duracion.'<br>'.
                '<span class="fw-bold">Restricciones de edad:</span> '.$restriccionEdad. '<br>'.
                '<span class="fw-bold">Sinopsis:</span> '.$sinopsis.'
            </p>
        ';
    }
}