<?php
// Incluyo clase Usuario
include_once 'usuario.php';

// Clase SistemaUsuario
class SistemaUsuario{
    private array $arrayUsuarios;

    // Constructor
    public function __construct(){
        $this->arrayUsuarios = [];
    }

    // Getters
    public function getArrayUsuarios(): array{
        return $this->arrayUsuarios;
    }

    // Setters
    public function setArrayUsuarios(array $arrayUsuarios): void{
        $this->arrayUsuarios = $arrayUsuarios;
    }

    // toString
    public function __toString(): string{
        $arrayUsuarios = $this->getArrayUsuarios();
        $cadenaArrayUsuarios = "";
        $cantUsuarios = 1;

        foreach ($arrayUsuarios as $usuario) {
            $cadenaArrayUsuarios .= 
                "$cantUsuarios - $usuario\n"
            ;

            $cantUsuarios++;
        }

        return $cadenaArrayUsuarios;
    }

    /**
     * Verifica si el usuario ya está en el array de usuarios(sin mirar la contraseña)
     * 
     * @param string $username - username del usuario
     * @return bool - true si existe, false caso contrario
    */
    public function existeUsuario(string $username) : bool{
        $exito = false;
        $arrayUsuarios = $this->getArrayUsuarios();
        $cantUsuarios = count($arrayUsuarios);
        $i = 0;

        while ($i < $cantUsuarios && $exito == false) {
            if( $arrayUsuarios[$i]->getUsername() === $username ){
                $exito = true;// username coinciden con un usuario ya registrado
            }

            $i++;
        }

        return $exito;
    }

    /**
     * Agrega usuarios al array de usuarios siempre y cuando no este registrado
     * 
     * @param string $username - username del usuario
     * @param string $password - contraseña del usuario
     * @return void
    */
    public function agregarUsuario(string $username, string $password): void{
        $usuario = new Usuario($username, $password);
        $arrayUsuarios = $this->getArrayUsuarios();
        $arrayUsuarios[] = $usuario;
        $this->setArrayUsuarios($arrayUsuarios);
    }

    /**
     * Recibe por parametros usuario, contraseña y los busca
     * en el array para verificar si coinciden con algún usuario registrado.
     * 
     * @param string $username
     * @param string $password
     * @return bool - true si username+password coinciden, false en caso contrario
    */
    public function verificarUsuario(string $username, string $password): bool{
        $exito = false;// No se encuentra coincidencia entre username y contraseña
        $arrayUsuarios = $this->getArrayUsuarios();
        $cantUsuarios = count($arrayUsuarios);
        $i = 0;

        while($i < $cantUsuarios && $exito == false){
            if(
                $arrayUsuarios[$i]->getUsername() === $username &&
                $arrayUsuarios[$i]->verificarPassword($password)
            ){
                $exito = true; // Usuario y contraseña coinciden
            }

            $i++;
        }

        return $exito;
    }
}