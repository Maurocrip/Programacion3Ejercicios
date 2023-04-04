<?php

/*Realizar un programa que en base al valor numérico de la variable $num, pueda mostrarse por
pantalla, el nombre del número que tenga dentro escrito con palabras, para los números entre
el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.*/
 $num = rand(20,61);
echo $num . "<br>";
//se puede hacer por swich

 function basico($numero) 
 {
    $valor = array ('veintiuno','vientidos ','veintitrés ', 'veinticuatro','veinticinco',
    'veintiséis','veintisiete','veintiocho','veintinueve');
    $retorno = $valor[$numero - 1];
    return $retorno;
}
    
function decenas($n) 
{
    $retorno[] = "hoola";
    if($n >20 && $n <30)
    {
        return basico($n);
    }
    else
    {
        $valor = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho',
        'nueve');
        $decenas = array (20=>'veinte',30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',);
        $x = $n % 10;
        if ( $x == 0 ) 
        {
            $retorno = $decenas[$n];
        } else 
        {
            $retorno = $decenas[$n - $x]."y". $valor($x);
        }            
    }
    return $retorno;
}

/*$valor = array ('uno','dos','tres','cuatro','cinco','seis','siete','ocho',
'nueve');
echo "valor del array unnitario =" . $valor[rand(0,9)];

$decenas = array (30=>'treinta',40=>'cuarenta',50=>'cincuenta',60=>'sesenta',);
$x = $n % 10;
if ( $x == 0 ) 
{
    $retorno[] = $decenas[$n];
} else 
{
    $retorno = $decenas[$n - $x]."y". $valor($x);
}            */



echo decenas($num);