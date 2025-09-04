<?php
// Clase Usuario
class Usuario{
    private string $username;
    private string $password;

    // Constructor
    public function __construct(
        string $username,
        string $password
    )
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Getters
    public function getUsername(): string{
        return $this->username;
    }

    public function getPassword(): string{
        return $this->password;
    }

    // Setters
    public function setUsername(string $username): void{
        $this->username = $username;
    }

    public function setPassword(string $password): void{
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // toString
    public function __toString(): string{
        return "Usuario: ".$this->getUsername();
    }

    /**
     * Verifica si la contraseña es correcta
     * 
     * @param string $password - contraseña
     * @return bool - true si coincide, false caso contrario
    */
    public function verificarPassword(string $password): bool {
        return password_verify($password, $this->getPassword());
    }
}