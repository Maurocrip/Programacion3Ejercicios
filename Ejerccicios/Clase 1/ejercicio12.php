<?php
/*Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.*/

$lapiceras = array(array('color'=> 'rojo', 'marca' => 'bic', 'trazo'=> 'fino', 'precio'=> 100));
array_push($lapiceras,array('color'=> 'azul', 'marca' => 'jing', 'trazo'=> 'robusto', 'precio'=> 500));
array_push($lapiceras,array('color'=> 'verde', 'marca' => 'tic', 'trazo'=> 'normal', 'precio'=> 300));
$i =1;

foreach($lapiceras as $lapicera)
{
    echo "La lapicera " . $i . ":";
    foreach($lapicera as $caracteristica => $descripcion)
    {
        echo $caracteristica ."=". $descripcion ."  ";
    }
    echo "<br>";
    $i++;
}
