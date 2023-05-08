<?php
require_once "./alumno.php";
use racioppi\alumnoClase4;

/*PARTE 2:
Probar que el CRUD funcione correctamente en nexo_poo_foto.php
require_once "./alumno.php";*/

/*$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
$apellido = isset($_POST["apellido"]) ? (string) $_POST["apellido"] : "";
$_FILES["foto"]["name"] = $legajo . ".png";
$foto = "./fotos/". $_FILES["foto"]["name"];
if(move_uploaded_file($_FILES["foto"]["tmp_name"],$foto))
{
    echo "se subio la foto";
}
else
{
    echo "no se subio";
}

$alumno = new alumnoClase4($apellido,$nombre,$legajo,$foto);
alumnoClase4::agregar($alumno);*/

/*---------------------------------------------------------------------------------------------------------------------------------------------------
PARTE 2
Agregar, en nexo_poo_foto.php:
1.- el caso "obtener":
retorna un var_dump() del objeto de tipo alumno que coincida con el legajo recibido como parámetro.

NOTA: agregar un método en alumno que reciba como parámetro un legajo y retorne un objeto de tipo Alumno.

2.- el caso "redirigir":
Se invoca al método que verifica la existencia de un alumno por su legajo.
Si se encuentra:
redirigir hacia la página 'principal.php' (crearla en el raíz). 

Si no se encuentra, mostrar el siguiente mensaje:
'El alumno con legajo 'xxx' no se encuentra en el listado'
Siendo 'xxx' el valor del legajo enviado por POST.



Página principal.php:

Documento html completo pero vacío.*/
/*$opcion = isset($_POST["opcion"]) ? (string) $_POST["opcion"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;

switch($opcion)
{
    case "obtener":
        $hola =alumnoClase4::obtener($legajo);
        if($hola == null)
        {
            echo ("soy null");
        }
        else
        {
            var_dump($hola);
        }
    break;

    case "redirigir";
        if(alumnoClase4::encontrar($legajo))
        {
            header("Location: principal.php");
            exit;
        }
        else
        {
            echo "el alumno con legajo " . $legajo . " no se encuentra en el archivo";
        }
    break; 
}*/
/*---------------------------------------------------------------------------------------------------------------------------------------------------
PARTE 3
Modicar el comportamiento del caso "redirigir".
Si el legajo no es encontrado, mostrar un mensaje que indique lo acontecido.
Si se encuentra el legajo, crear variables de sesión que guarden el legajo, el nombre, el apellido y la foto del alumno.
Luego, redirigir hacia principal.php*/
$opcion = isset($_POST["opcion"]) ? (string) $_POST["opcion"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
session_start();
switch($opcion)
{
    case "redirigir";
        if(alumnoClase4::encontrar($legajo))
        {
            $alumno =alumnoClase4::obtener($legajo);
            $_SESSION["nombre"] = $alumno->_nombre;
            $_SESSION["apellido"] = $alumno->_apellido;
            $_SESSION["legajo"] = $legajo;
            $_SESSION["foto"] = $alumno->_foto;

            header("Location: principal.php");
            exit;
        }
        else
        {
            echo "el alumno con legajo " . $legajo . " no se encuentra en el archivo";
            session_destroy();
        }
    break; 
}