<?php
// Clase Persona
class Persona{
    private string $nombre;
    private string $apellido;
    private int $edad;
    private string $direccion;
    private string $estudio;
    private string $sexo;
    private array $deporte;

    // Constructor
    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        string $direccion,
        string $estudio,
        string $sexo,
        array $deporte
    )
    {
        $this->nombre = htmlspecialchars(trim($nombre));
        $this->apellido = htmlspecialchars(trim($apellido));
        $this->edad = (int)$edad;
        $this->direccion = htmlspecialchars($direccion);
        $this->estudio = $estudio;
        $this->sexo = $sexo;
        $this->deporte = $deporte;
    }

    // Getters
    public function getNombre(): string{
        return $this->nombre;
    }

    public function getApellido(): string{
        return $this->apellido;
    }

    public function getEdad(): int{
        return $this->edad;
    }

    public function getDireccion(): string{
        return $this->direccion;
    }

    public function getEstudio(): string{
        return $this->estudio;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function getDeporte(): array{
        return $this->deporte;
    }

    // Setters
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void{
        $this->apellido = $apellido;
    }

    public function setEdad(int $edad): void{
        $this->edad = $edad;
    }

    public function setDireccion(string $direccion): void{
        $this->direccion = $direccion;
    }

    public function setEstudio(string $estudio): void{
        $this->estudio = $estudio;
    }

    public function setSexo(string $sexo): void{
        $this->sexo = $sexo;
    }

    public function setDeporte(array $deporte): void{
        $this->deporte = $deporte;
    }
    
    // toString
    public function __toString(): string{
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $edad = $this->getEdad();
        $direccion = $this->getDireccion();
        $estudio = $this->getEstudio();
        $sexo = $this->getSexo();
        $deportes = $this->getDeporte();
        $cadenaDeporte = implode(", ", $deportes);

        return"
            Nombre: $nombre<br>
            Apellido: $apellido\n<br>
            Sexo: $sexo\n<br>
            Edad: $edad\n<br>
            Direccion: $direccion\n<br>
            Estudios: $estudio\n<br>
            Deportes: $cadenaDeporte<br>
        ";
    }

    /**
     * Devuelve si la persona es mayor o menor de edad
     * 
     * @param int $edad
     * @return bool
    */
    public function esMayorEdad(int $edad): bool{
        // Bandera
        $esMayor = false;

        if($edad >= 18){
            $esMayor = true;
        }

        return $esMayor;
    }

    /**
     * Devuelve cuantos deportes juega
     * 
     * @return int $cantDeportes
    */
    public function cantDeporte(): int{
        $cantDeportes = count($this->getDeporte());
        return $cantDeportes;
    }

    // 
    public function presentacion():string{
        $mensaje =
            "Hola, esta es mi información personal: <br>".$this->__toString().
            "Como verán soy ".($this->esMayorEdad($this->getEdad()) ? "mayor" : "menor") . " de edad".
            " y juego a ".$this->cantDeporte()." deportes."
        ;

        return $mensaje;
    }
}