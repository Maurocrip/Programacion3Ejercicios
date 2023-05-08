<?php
/*Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”*/

$animal = [];
$numero = [];
$lenguaje = [];

array_push($animal,"Perro", "Gato", "Ratón", "Araña", "Mosca");
array_push($numero,"1986", "1996", "2015", "78", "86");
array_push($lenguaje,"php", "mysql", "html5", "typescript", "ajax");

echo "array 1:<br>";
foreach($animal as $contenido)
{
    echo $contenido . "  ";
}

echo "<br>array 2:<br>";
foreach($numero as $contenido)
{
    echo $contenido . "  ";
}

echo "<br>array 3:<br>";
foreach($lenguaje as $contenido)
{
    echo $contenido . "  ";
}

echo "<br>array conjunto:<br>";

$arrayConjunto = array_merge($animal,$numero,$lenguaje);

foreach($arrayConjunto as $contenido)
{
    echo $contenido . "<br>";
}
