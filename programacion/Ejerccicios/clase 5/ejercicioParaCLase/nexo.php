<?php
require_once "./alumno.php";
$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
$id = isset($_POST["id"]) ? (int) $_POST["id"] : 0;
$apellido = isset($_POST["apellido"]) ? (string) $_POST["apellido"] : "";
$accion = isset($_POST["accion"]) ? (string) $_POST["accion"] : "";

switch($accion)
{
    case "agregar":
        $_FILES["foto"]["name"] = $legajo . ".png";
        $alumno = new alumnoClase5($apellido,$nombre,$legajo,$_FILES["foto"]["name"]);
        $foto = "./fotos/". $_FILES["foto"]["name"];
        if(move_uploaded_file($_FILES["foto"]["tmp_name"],$foto))
        {
            echo "se subio la foto";
        }
        else
        {
            echo "no se subio";
        }
        echo $alumno->insertarElAlumno();
    break;

    case "modificar":       
        $_FILES["foto"]["name"] = $legajo . ".png";
        $alumno = alumnoClase5 :: encontrarAlumnoId($id);
        unlink($alumno->foto);
        $foto = "./fotos/". $_FILES["foto"]["name"];
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $foto))
        {
            echo "se subio la foto";
        }
        else
        {
            echo "no se subio";
        }   
        echo alumnoClase5 :: modificarAlumno($id,$nombre,$legajo,$apellido,$_FILES["foto"]["name"]);
    break;
    
    case "eliminar":
        echo alumnoClase5 :: eliminarAlumno($id);
        $alumno = alumnoClase5 :: encontrarAlumnoId($id);
        unlink($alumno->foto);
    break;

    case "mostrarTodos":
        var_dump(alumnoClase5 :: traerTodosLosAlumnos());
    break;

    case "mostrarUno":
        var_dump(alumnoClase5 :: encontrarAlumnoLegajo($legajo));
    break;
}


