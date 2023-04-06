<?php
/*Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que
las calcule invocando la función pow).*/

function potencia() : void
{
    for($i =1; $i<5; $i++)
    {
        echo "numero: ".$i. "<br>";
        for($j =1; $j<5; $j++)
        {
            echo pow($i,$j) . "<br>";
        }
    }
}

potencia();