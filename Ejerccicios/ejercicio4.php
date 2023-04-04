<?php
/*Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/

$resultado = 0;
for($i = 0;$resultado < 1000; $i++)
{
    $resultado += $i;
}
echo("el numero obtenido fue $resultado y se sumaron $i numeros");