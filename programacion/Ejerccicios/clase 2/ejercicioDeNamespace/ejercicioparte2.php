<?php
/*Crear, en el directorio ./clases, la siguiente clase:

Guarderia
Atributos (públicos):
nombre : string
mascotas: array (de Mascotas)
Métodos (públicos):
__construct(string)
equals(Guarderia, Mascota) : bool
add(Mascota) : bool
toString() : string

El constructor recibirá cómo parámetro requerido el nombre.

El método de clase “equals” permitirá comparar al objeto de tipo "Guarderia" con el objeto de tipo ”Mascota”. Sólo devolverá TRUE si la “Mascota” está en la "Guarderia".

El método de instancia “add” permite agregar un objeto “Mascota” a la “Guarderia” (sólo si la mascota no está en dicha guardería, de lo contrario retorna false).

El método de instancia “toString“ retornará los atributos de la instancia actual con formato: nombre, el listado completo de las mascotas y el promedio de edad (de las mascotas). 

La clase Guarderia debe estar en el namespace "Negocios"*/
namespace Negocios;
require_once "./ejercicioparte1.php";

use Animalitos\Mascota;

class Guarderia
{
    public string $_nombre;
    public $_mascotas;


    function __construct(string $nombre)
    {
        $this->_nombre = $nombre;
        $this->_mascotas =[];
    }

    function toString() : string
    {
        $retorno =  $this->_nombre . "<br>";
        $promedioEdad=0;
        foreach($this->_mascotas as $mascota)
        {
            $retorno .= $mascota->ToString() . "<br>";
            $promedioEdad+=$mascota->_edad;
        }
        $retorno .= "-" . $promedioEdad;
        
        return $retorno;
    }

    function add(Mascota $objeto) : string
    {
        $retorno =false;
        if(!Guarderia::equals($this,$objeto))
        {
            array_push($this->_mascotas,$objeto);
            $retorno =true;
        }
        return $retorno;
    }

    static function equals(Guarderia $guarderia, Mascota $objeto) : bool
    {
        $retorno = false;
        foreach($guarderia-> _mascotas as $mascota)
        {
            if($mascota == $objeto)
            {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }
}