<?php
// Clase Operacion
class Operacion{
    private float $operando1;
    private float $operando2;
    private string $operador;

    // Constructor
    public function __construct(
        float $operando1,
        float $operando2,
        string $operador
    )
    {
        $this->operando1 = (float)$operando1;
        $this->operando2 = (float)$operando2;
        $this->operador = $operador;
    }

    // Getters
    public function getOperando1(): float{
        return $this->operando1;
    }

    public function getOperando2(): float{
        return $this->operando2;
    }

    public function getOperador(): string{
        return $this->operador;
    }

    // Setters
    public function setOperando1(float $operando1): void{
        $this->operando1 = $operando1;
    }

    public function setOperando2(float $operando2): void{
        $this->operando2 = $operando2;
    }

    public function setOperador(string $operador): void{
        $this->operador = $operador;
    }

    // toString
    public function __toString(): string{
        $operando1 = $this->getOperando1();
        $operando2 = $this->getOperando2();
        $operador = $this->getOperador();

        return "
            Operando 1 = $operando1<br>
            Operando 2 = $operando2<br>
            Operador = $operador<br>
        ";
    }

    /**
     * Devulve el resultado de operar los operandos con la operación correspondiente
     * 
     * @return string $resultado
    */
    public function resolver(): string{
        $operando1 = $this->getOperando1();
        $operando2 = $this->getOperando2();
        $operador = $this->getOperador();

        switch ($operador) {
            case 'sumar':
                $resultado = "$operando1 + $operando2 = ".$operando1+$operando2;
                break;
            case 'restar':
                $resultado = "$operando1 - $operando2 = ".$operando1-$operando2;
                break;
            case 'multiplicar':
                $resultado = "$operando1 * $operando2 = ".$operando1*$operando2;
                break;
            case 'dividir':
                $resultado = $operando2 == 0 ? "La división por cero es invalida" : "$operando1 / $operando2 = ".$operando1/$operando2;
                break;
            default:
                $resultado = "Operación invalida. Vuelva a intentar";
        }

        return $resultado;
    }
}