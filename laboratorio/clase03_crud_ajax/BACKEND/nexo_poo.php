<?php
require_once "./alumno.php";

use racioppi\alumno;

$nombre = isset($_REQUEST["nombre"]) ? (string) $_REQUEST["nombre"] : "";
$legajo = isset($_REQUEST["legajo"]) ? (int) $_REQUEST["legajo"] : 0;
$apellido = isset($_REQUEST["apellido"]) ? (string) $_REQUEST["apellido"] : "";
$accion = isset($_REQUEST["accion"]) ? (string) $_REQUEST["accion"] : "";

if($nombre !== "" && $legajo !== 0 && $apellido !== "" && ($accion == "agregar" || $accion == "modificar") == true)
{
    $estudiante = new alumno($apellido,$nombre,$legajo);
}

switch(strToLower($accion))
{
    case "agregar":
        if(alumno :: agregar($estudiante))
        {
            echo"alumno agregado";
        }
        else
        {
            echo "fallo en agregar alumno";
        }
        break;
    case "listar":
        alumno :: mostrar();
        break;
    case "modificar":
        echo alumno :: modficar($estudiante);
        break;
    case "borrar":
        echo alumno :: borrar($legajo);
        break;
    case "verificar":
        echo alumno :: encontrar($legajo);
        break;

    default:
        echo "La accion no existe o esta mal escrita";
        break;
}













