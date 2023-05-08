<?php
/*Crear una página web que permita encriptar mensajes y que se guarden en un archivo de texto
y que sólo si se lee el archivo desde la página se podrá acceder a su texto claro, es decir se
desencriptará.*/

require_once "enigma.php";
 
$op = isset($_POST["opcion"]) ? (string) $_POST["opcion"] : null;
$palabra = isset($_POST["palabra"]) ? (string) $_POST["palabra"] : null;


switch($op)
{
    case "codificar":
        Enigma ::encriptar($palabra,"./archivoEncriptado");
    break;

    case "deccodificar":
        echo Enigma :: desEncriptar("./archivoEncriptado");
    break;
}
