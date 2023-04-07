<?php
/*Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por
parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la
misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma
de los precios o cero si no se pudo realizar la operación.

Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);*/

class Auto
{
    private String $_color;
    private float $_precio;
    private String $_marca;
    private DateTime $_fecha;

    function __construct(string $marca, string $color, int $precio =0, DateTime $fecha = new DateTime("now"))
    {
        $this -> _marca = $marca;
        $this -> _color = $color;
        $this -> _precio = $precio;
        $this -> _fecha = $fecha;        
    }    

    function AregarImpuestos(float $agregado)
    {
        $this-> _precio+=$agregado;
    }

    static function MostrarAuto(Auto $objeto)
    {
        echo "color: " . $objeto-> _color . "  marca: " . $objeto-> _marca . 
        "  precio: " . $objeto-> _precio . "  fehca: " . $objeto-> _fecha->format("y-m-d"); 
    }

    function Equals(Auto $auto) : bool
    {
        return $this-> _marca == $auto-> _marca;
    }
    
    static function Add(Auto $objeto1, Auto $objeto2) : float
    {
        $retorno =0;
        if($objeto1->Equals($objeto2) && $objeto1-> _color == $objeto2-> _color)
        {
            $retorno = $objeto1-> _precio + $objeto2-> _precio;
        }
        else
        {
            echo "<br>No comparten la misma marca o color<br>";
        }
        return $retorno;
    }
}

