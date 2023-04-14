<?php
/*Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que
mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si
el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage”
(sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);*/

require_once "../ejercicio21/claseAuto.php";

class Garage
{
    private String $_razonSocial;
    private float $_precioPorHora;
    private array $_autos;

    function __construct(string $razonSocial, int $precioPorHora)
    {
        $this -> _razonSocial = $razonSocial;
        $this -> _precioPorHora = $precioPorHora;
        $this -> _autos =[];    
    }    

    function MostrarGarage()
    {
        echo "razon social: " . $this-> _razonSocial . "  precio por hora: " . $this-> _precioPorHora;
        foreach($this->_autos as $auto)
        {
            Auto::MostrarAuto($auto);
        }
    }

    function Equals(Auto $auto2) : bool
    {
        $retorno = false;
        foreach($this-> _autos as $auto)
        {
            if($auto == $auto2)
            {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }

    function Add(Auto $auto) : bool
    {
        $retorno =false;
        if(!$this->Equals($auto))
        {
            array_push($this->_autos,$auto);
            $retorno =true;
        }
        return $retorno;
    }

    function Remove(Auto $auto) : bool
    {
        $retorno =false;
        if($this->Equals($auto))
        {            
            unset($this->_autos[array_search($auto,$this->_autos)]);
            $retorno =true;
        }
        return $retorno;
    }
}