<?php
/*Crear, en el directorio ./clases, la siguiente clase:

Mascota
Atributos (públicos):
nombre : string
tipo : string
edad: int
Métodos (públicos):
__construct(string, string, int)
toString() : string
mostrar(Mascota) : string
equals(Mascota) : bool

El constructor recibirá cómo parámetros requeridos el nombre y el tipo, mientras que la edad será opcional y su valor predeterminado será cero.

El método de instancia “toString“ retornará los atributos de la instancia actual con formato: nombre - tipo - edad 

El método de clase “mostrar” recibe un objeto de tipo “Mascota” por parámetro y retornará, en formato de cadena de texto,  todos los atributos de dicho objeto.

El método de instancia “equals” permitirá comparar al objeto de tipo ”Mascota” que recibe cómo parámetro, con la instancia actual. Sólo devolverá TRUE si ambas “Mascotas” tienen el mismo nombre y mismo tipo.

La clase Mascota debe estar en el namespace "Animalitos"*/

namespace Animalitos;

class Mascota
{
    public string $_nombre;
    public string $_tipo;
    public int $_edad;


    function __construct(string $nombre, string $tipo, int $edad =0)
    {
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_edad = $edad;
    }

    function toString() : string
    {
        return $this->_nombre . "-" . $this->_tipo . "-" . $this->_edad;
    }

    static function mostrar(Mascota $objeto) : string
    {
        return $objeto->toString();
    }

    function equals(Mascota $objeto) : bool
    {
        return $this->_nombre == $objeto->_nombre && $this->_tipo == $objeto->_tipo; 
    }
}