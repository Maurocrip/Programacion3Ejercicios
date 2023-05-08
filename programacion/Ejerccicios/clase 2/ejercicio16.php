<?php
/*Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las
letras del Array.
Ejemplo: Se recibe la palabra c y luego queda “ALOH”.*/

$palabra ="hola";

function invertir(string $arrayCaracteres) : string
{
    strrev($arrayCaracteres);
    return strrev($arrayCaracteres);;
}

echo "palabra: " . $palabra . "<br>";
echo invertir($palabra);