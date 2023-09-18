<?php
require_once("./clases/Usuario.php");
$objetoretorno = new stdClass();
$objetoretorno->exito =false;
$objetoretorno->mensaje="";

$json = isset($_POST["usuario_json"]) ? (string) $_POST["usuario_json"] : "";
if($json != "")
{
    $objeto = json_decode($json);
    $usuario = new Usuario($objeto->correo,$objeto->nombre,$objeto->clave,$objeto->id,$objeto->id_perfil);
    if($usuario->Modificar($objeto->id))
    {
        $objetoretorno->exito =true;
        $objetoretorno->mensaje="El usuario ah sido modificado";
    }
    else
    {
        $objetoretorno->mensaje="El usuario no ah sido modificado";
    }
}
else
{
    $objetoretorno->mensaje="No recibio parametros";
}

var_dump($objetoretorno);