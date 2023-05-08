<?php
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : null;

$resultado; 
if(isset($usuario))
{          
    sleep(rand(0,7));
    if(rand(0,2))
    {
        $resultado = "el usuario si esta";
    }
    else
    {
        $resultado = "el usuario no esta";
    }
}
else
{
    $resultado = "algun parametro no fue pasado";
}

echo $resultado;