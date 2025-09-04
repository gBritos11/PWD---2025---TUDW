<?php
// Clase Cliente
class Cliente{
    private string $nombre;
    private int $edad;
    private bool $esEstudiante;

    // Constructor
    public function __construct(
        string $nombre,
        int $edad,
        bool $esEstudiante
    )
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->esEstudiante = $esEstudiante;
    }

    // Getters
    public function getNombre(): string{
        return $this->nombre;
    }

    public function getEdad(): int{
        return $this->edad;
    }

    public function getEsEstudiante(): bool{
        return $this->esEstudiante;
    }

    // Setters
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }

    public function setEdad(int $edad): void{
        $this->edad = $edad;
    }

    public function setEsEstudiante(bool $esEstudiante): void{
        $this->esEstudiante = $esEstudiante;
    }

    // toString
    public function __toString(): string{
        $nombre = $this->getNombre();
        $edad = $this->getEdad();
        $esEstudiante = $this->getEsEstudiante();

        return "
            Nombre: $nombre
            Edad: $edad
            Estudiante: " . ($esEstudiante ? "si" : "no")
        ;
    }

    /**
     * Devuelve el valor de la entrada al cine
     * 
     * @return float
    */
    public function calcularPrecio(): float{
        $edad = $this->getEdad();
        $esEstudiante = $this->getEsEstudiante();
        $precio = 0;

        if($esEstudiante && $edad < 12){
            $precio = 160;
        }elseif ($esEstudiante && $edad >= 12){
            $precio = 180;
        }else{
            $precio = 300;
        }

        return $precio;
    }
}