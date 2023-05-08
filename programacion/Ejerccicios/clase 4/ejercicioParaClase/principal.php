<?php
/*
En principal.php, agregar un algoritmo que verifique la sesión del usuario, si es válido, mostrará:
en un <h1> el legajo del alumno y
en un <h2> el nombre y apellido del alumno y
en un <img> la foto del alumno.
y en un <table>, el listado completo del archivo ./archivos/alumnos_foto.txt

Si no es válido, redirigir hacia nexo_poo_foto.php.*/
session_start();
use racioppi\alumnoClase4;
require_once "./alumno.php";

echo session_status();

if (session_status() === PHP_SESSION_ACTIVE)
{  
    echo "<h1>" .$_SESSION["legajo"] ."</h1>\n";
    echo "<h2>" .$_SESSION["nombre"] ."</h2>\n";
    echo "<h2>" .$_SESSION["apellido"] ."</h2>\n";
    echo "<img src='" . $_SESSION["foto"] . "' alt='Imagen'>";
    echo "<table border='1'>" . alumnoClase4 :: mostrar()."</table>";
} 
else 
{
    echo "no funciono";
}
session_destroy();