<?php
/*Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.*/
$arrayNumeros = array();

for($i=0; count($arrayNumeros)<10;$i++)
{
    if($i%2!=0)
    {
        array_push($arrayNumeros,$i);
    }
}

echo "mostrado por for: <br>";
for($i=0; count($arrayNumeros)>$i;$i++)
{
    echo $arrayNumeros[$i] . "<br>";
}

$i=0;

echo "mostrado por while: <br>";
while(count($arrayNumeros)>$i)
{
    echo $arrayNumeros[$i] . "<br>";
    $i++;
}

echo "mostrado por foreach: <br>";
foreach($arrayNumeros as $numero)  //recorre el array de numeros y por cada indice copia su valor en $numero.
{
    echo $numero . "<br>";
}