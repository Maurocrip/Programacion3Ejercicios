<?php
/*Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.*/
$listaNumeros = array(rand(0,10),rand(0,10),rand(0,10),rand(0,10),rand(0,10));

for($i = 0; $i < count($listaNumeros); $i++)
{
    echo $listaNumeros[$i].",";
}

$promedio =0;
for($i = 0; $i < count($listaNumeros); $i++)
{
    $promedio += $listaNumeros[$i];
}

$promedio = $promedio/count($listaNumeros);

if($promedio==6)
{
    echo "el promedio es igual a 6";
}
else if($promedio < 6)
{
    echo "el promedio es menor que 6";
}
else
{
    echo "el promedio es mayor que 6";
}