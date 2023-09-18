<?php
require_once("./clases/Usuario.php");
$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$correo = isset($_POST["correo"]) ? (string) $_POST["correo"] : "";
$clave = isset($_POST["clave"]) ? (string) $_POST["clave"] : "";

if($nombre != "" && $correo != "" && $clave != "")
{
    $usuario = new Usuario($correo,$nombre,$clave);

    echo $usuario->GuardarEnArchivo();
}
else
{
    echo "no se recibio algun parametro";
}