<?php
/*Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. */ 

$año = Date("y");
$mes = Date("m");
$dia = Date("d");
$fecha = $año ."/". $mes ."/". $dia;

echo($fecha ."<br>");
switch($mes)
{
    case 12:
    case 1:
    case 2:
        echo("Es verano");
        break;
    case 3:
    case 4:
    case 5:
        echo("Es otoño");
        break;
    case 6:
    case 7:
    case 8:
        echo("Es invierno");
        break;
    case 9:
    case 10:
    case 11:
        echo("Es primavera");
        break;
}
