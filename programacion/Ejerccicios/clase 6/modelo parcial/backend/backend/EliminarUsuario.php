<?php
require_once("./clases/Usuario.php");
$objetoretorno = new stdClass();
$objetoretorno->exito =false;
$objetoretorno->mensaje="";

$id = isset($_POST["id"]) ? (int) $_POST["id"] : 0;
if($id != 0)
{
    if(Usuario::Eliminar($id))
    {
        $objetoretorno->exito =true;
        $objetoretorno->mensaje="El usuario ah sido eliminado";
    }
    else
    {
        $objetoretorno->mensaje="El usuario no ah sido eliminado";
    }
}
else
{
    $objetoretorno->mensaje="No recibio parametros";
}

var_dump($objetoretorno);