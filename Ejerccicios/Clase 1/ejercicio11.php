<?php
/*Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';*/

$v = array(1=>90, 30=>7, 'e'=>99, 'hola'=> 'mundo');

foreach($v as $indice => $contenido)
{
    echo "en el indice " . $indice . " esta: " . $contenido . "<br>";
}