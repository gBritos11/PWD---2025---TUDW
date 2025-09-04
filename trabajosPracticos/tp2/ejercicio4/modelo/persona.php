<?php
// Clase Persona
class Persona{
    private string $nombre;
    private string $apellido;
    private string $rol;// Actor, guionista, director

    // Constructor
    public function __construct(
        string $nombre,
        string $apellido,
        string $rol
    ){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rol = $rol;
    }

    // Getters
    public function getNombre(): string{
        return $this->nombre;
    }

    public function getApellido(): string{
        return $this->apellido;
    }

    public function getRol(): string{
        return $this->rol;
    }

    // Setters
    public function setNombre(string $nombre) : void{
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void{
        $this->apellido = $apellido;
    }

    public function setRol(string $rol){
        $rolesValidos = ['actor', 'guion', 'director'];
        if(in_array(strtolower($rol), $rolesValidos)){
            $this->rol = $rol;
        }
    }

    // toString
    public function __toString(): string{
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();

        return "$nombre $apellido";
    }
}