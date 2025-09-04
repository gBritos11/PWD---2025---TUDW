<?php
// Clase Archivo
class archivo{
    private string $nombreInicial;
    private string $nombreFinal;
    private string $tipoMime;
    private int $tamanio;
    private string $ruta;
    private string $error;

    // Constructor
    public function __construct(
        string $nombreInicial,
        string $tipoMime,
        int $tamanio,
        string $ruta,
        string $error
    ){
        $this->nombreInicial = $nombreInicial;
        $this->nombreFinal = "";
        $this->tipoMime = $tipoMime;
        $this->tamanio = $tamanio;// MB
        $this->ruta = $ruta;
        $this->error = $error;
    }

    // Getters
    public function getNombreInicial(): string{
        return $this->nombreInicial;
    }

    public function getNombreFinal(): string{
        return $this->nombreFinal;
    }

    public function getTipoMime(): string{
        return $this->tipoMime;
    }

    public function getTamanio(): int{
        return $this->tamanio;
    }

    public function getRuta(): string{
        return $this->ruta;
    }

    public function getError(): string{
        return $this->error;
    }

    // Setters
    public function setNombreInicial(string $nombreInicial): void{
        $this->nombreInicial = $nombreInicial;
    }

    public function setNombreFinal(string $nombreFinal): void{
        $this->nombreFinal = $nombreFinal;
    }

    public function setTipoMime(string $tipoMime): void{
        $this->tipoMime = $tipoMime;
    }

    public function setTamanio(int $tamanio): void{
        $this->tamanio = $tamanio;
    }

    public function setRuta(string $ruta): void{
        $this->ruta = $ruta;
    }

    public function setError(string $error): void{
        $this->error = $error;
    }

    // toString
    public function __toString(): string{
        $nombreInicial = $this->getNombreInicial();
        $nombreFinal = $this->getNombreFinal();
        $tipoMime = $this->getTipoMime();
        $tamanio = $this->getTamanio();
        $ruta = $this->getRuta();;
        $error = $this->getError();

        return "
            Nombre inicial: $nombreInicial<br>
            Nombre final: $nombreFinal<br>
            Tipo MIME: $tipoMime<br>
            Tamaño: $tamanio<br>
            Ruta: $ruta<br>
            Error: $error<br>
        ";
    }

    /**
     * Verifica que el tipo de mime del archivo coincida con un array de mimes validos
     * 
     * @param array $tipoPermitidos - mimes permitidos
     * @return bool
    */
    public function validarTipoMime(array $tipoPermitidos): bool{
        $bandera = false;

        if(in_array($this->getTipoMime(), $tipoPermitidos)){
            $bandera = true;
        }
        
        return $bandera;
    }

    /**
     * Verifica que el archivo mas liviano que el tamaño pasado en MB
     * 
     * @param int $tamanioPermitido - MB disponibles
     * @return bool
    */
    public function validarTamanio(int $tamanioPermitido): bool{
        $bandera = false;

        if($this->getTamanio() <= $tamanioPermitido*1024*1024){
            $bandera = true;
        }

        return $bandera;
    }

    /**
     * Genera un nombre unico al archivo
     * 
     * @return string $nombreUnico
    */
    public function generarNombreUnico(): string{
        $extension = pathinfo($this->getNombreInicial(), PATHINFO_EXTENSION);
        $nombreUnico = uniqid('archivo_') . '.' . strtolower($extension);

        $this->setNombreFinal($nombreUnico);

        return $nombreUnico;
    }
}