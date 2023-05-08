<?php
$numero1 = isset($_POST["numero1"]) ? (int) $_POST["numero1"] : null;
$operador = isset($_POST["operador"]) ? $_POST["operador"] : null;
$numero2 = isset($_POST["numero2"]) ? (int)  $_POST["numero2"] : null;

$resultado; 
if( isset($numero1) && isset($operador) && isset($numero2) )
{      
       
    switch($operador)
    {
        case "+":
            $resultado = $numero1 + $numero2;
        break;
        case "-":
            $resultado = $numero1 - $numero2;
        break;
        case "/":
            $resultado = $numero1 / $numero2;
        break;
        case "*":
            $resultado = $numero1 * $numero2;
        break;
    }
}
else
{
    $resultado = "algun parametro no fue pasado";
}

echo $resultado;