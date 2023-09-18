<?php
require_once("./clases/Usuario.php");
$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$correo = isset($_POST["correo"]) ? (string) $_POST["correo"] : "";
$clave = isset($_POST["clave"]) ? (string) $_POST["clave"] : "";
$id_perfil = isset($_POST["id_perfil"]) ? (int) $_POST["id_perfil"] : "";

$objetoretorno = new stdClass();
$objetoretorno->exito =false;
$objetoretorno->mensaje="";

if($nombre != "" && $correo != "" && $clave != "" && $id_perfil != "")
{
    $usuario = new Usuario($correo,$nombre,$clave,99,$id_perfil);
    if($usuario->Agregar())
    {
        $objetoretorno->exito =true;
        $objetoretorno->mensaje="se agrego el usuario";
    }
    else
    {
        $objetoretorno->mensaje="No se pudo agregar el usuario";
    }
}
else
{
    $objetoretorno->mensaje="No se recibio parametros";
}

var_dump($objetoretorno);
