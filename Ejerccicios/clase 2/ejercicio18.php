<?php
/*Crear una función llamada EsPar que reciba un valor entero como parámetro y devuelva TRUE si
este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función EsImpar.*/

function EsPar(int $numero) : bool
{
    $retorno = false;
    if($numero%2 == 0)
    {
        $retorno = true;
    }
    return $retorno;
}

function EsImpar(int $numero) : bool
{
    return EsPar($numero)==false;
}

for($i =1;$i<3;$i++)
{
    echo "el numero $i es par?<br>";
    if(EsPar($i))
    {
        echo "si<br>";
    }
    else
    {
        echo "no<br>";
    }
    echo "el numero $i es impar?<br>";
    if(EsImpar($i))
    {
        echo "si<br>";
    }
    else
    {
        echo "no<br>";
    }
}