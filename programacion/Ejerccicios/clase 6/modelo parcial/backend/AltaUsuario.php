<?php
require_once("./clases/Usuario.php");
$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$correo = isset($_POST["correo"]) ? (string) $_POST["correo"] : "";
$clave = isset($_POST["clave"]) ? (string) $_POST["clave"] : "";
$id_perfil = isset($_POST["id_perfil"]) ? (int) $_POST["id_perfil"] : "";

$usuario = new Usuario($correo,$nombre,$clave,-1,$id_perfil);
$usuario->Agregar();