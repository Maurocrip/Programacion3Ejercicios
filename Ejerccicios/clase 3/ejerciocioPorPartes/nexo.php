<?php
/*Enviar (por POST) a la página nexo.php:
*-accion => 'agregar'
*-nombre => 'su nombre'
*-apellido => 'su apellido'
*-legajo => 'su legajo'

Recuperar los valores enviados y agregarlos al archivo ./archivos/alumnos.txt
El formato que deberá tener cada registro es el siguiente:
legajo - apellido - nombre

Indicar si se pudo o no guardar al alumno*/

/*function agregar(string $apellido, string $nombre, int $legajo) : int|null
{
    $retorno = null;
    $archivo = fopen("./archivos/alumnos.txt","w");
    
    $retorno = fwrite($archivo, "$legajo - $apellido - $nombre");

    fclose($archivo);
    return $retorno;
}

$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
$apellido = isset($_POST["apellido"]) ? (string) $_POST["apellido"] : "";


if(agregar($nombre,$apellido,$legajo) !== null)
{
    echo "archivo escrito";
}*/

//---------------------------------------------------------------------------------------------------------------

/*Enviar (por GET) a la página nexo.php:
*-accion => 'listar'

Recuperar el valor enviado y mostrar el contenido completo del archivo ./archivos/alumnos.txt
Cada registro se mostrará (un registro por fila):
legajo - apellido - nombre*/

/*$funcion = isset($_GET["accion"]) ? (string) $_GET["accion"] : "";

function mostrar()
{
    $ar = fopen("./archivos/alumnos.txt", "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);

        echo $linea;		
    }
}

if($funcion === "listar")
{
    mostrar();
}
else
{
    echo "no hay nd";
}*/ 

//---------------------------------------------------------------------------------------------------------------

/*Enviar (por POST) a la página nexo.php:
*-accion => 'verificar'
*-legajo => 'su legajo'

Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la existencia de un registro que coincida con el legajo recuperado.
Si se encuentra, mostrar:
'El alumno con legajo 'xxx' se encuentra en el listado'
Si no se encuentra, mostrar el siguiente mensaje:
'El alumno con legajo 'xxx' no se encuentra en el listado'
Siendo 'xxx' el valor del legajo enviado por POST.
*/

/*$accion = isset($_POST["accion"]) ? (string) $_POST["accion"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;


function encontrar(int $legajo)
{
    $retorno = 'El alumno con legajo '. $legajo .' no se encuentra en el listado';
    $ar = fopen("./archivos/alumnos.txt", "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);

        $array_linea = explode(" - ", $linea);
        
        if($array_linea[0] === (string) $legajo)
        {
            $retorno =  'El alumno con legajo '. $legajo . ' se encuentra en el listado';
            break;
        }
    }
    return $retorno;
}

if($accion == "verificar")
{
    echo encontrar($legajo);
}*/

//---------------------------------------------------------------------------------------------------------------
/*Enviar (por POST) a la página nexo.php:
*-accion => 'modificar'
*-nombre => 'un nombre'
*-apellido => 'un apellido'
*-legajo => 'un legajo'

Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la existencia de un registro que coincida con el legajo recuperado.
Si se encuentra, reemplazar el apellido y el nombre del archivo, por los valores recuperados por POST.
Mostrar un mensaje que diga:
'El alumno con legajo 'xxx' se ha modificado'
Si no se encuentra, mostrar el siguiente mensaje:
'El alumno con legajo 'xxx' no se encuentra en el listado'
Siendo 'xxx' el valor del legajo enviado por POST.
*/

/*$nombre = isset($_POST["nombre"]) ? (string) $_POST["nombre"] : "";
$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;
$apellido = isset($_POST["apellido"]) ? (string) $_POST["apellido"] : "";


function modficar(int $legajo, string $nombre, string $apellido)
{
    $elementos = array();
    $retorno = "El alumno con legajo '$legajo' no se encuentra en el listado";
    $flag = false;

    $ar = fopen("./archivos/alumnos.txt", "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);
        $array_linea = explode("-", $linea);

        $array_linea[0] = trim($array_linea[0]);

        if($array_linea[0] != ""){

            $clave_legajo = trim($array_linea[0]);
            $clave_nombre = trim($array_linea[1]);
            $clave_apellido = trim($array_linea[2]);

            if ($clave_legajo == $legajo) 
            {                
                array_push($elementos, "{$legajo}-{$nombre}-{$apellido}\r\n");
                $retorno = "El alumno con legajo '$legajo' se ha modificado";
                $flag = true;
            }
            else{

                array_push($elementos, "{$clave_legajo}-{$clave_nombre}-{$clave_apellido}\r\n");
            }
        }
    }
    fclose($ar);

    if($flag)
    {
        $ar = fopen("./archivos/alumnos.txt", "w");

        $cant = 0;
        
        foreach($elementos AS $item)
        {
            $cant = fwrite($ar, $item);
        }

        if($cant >! 0)
        {
            $retorno = "Hubo un problema en la reescritura del archivo";			
        }

        fclose($ar);
    }
    
    return $retorno;
}

echo modficar($legajo, $nombre, $apellido);*/


//---------------------------------------------------------------------------------------------------------------
/*Enviar (por POST) a la página nexo.php:
*-accion => 'borrar'
*-legajo => 'un legajo'

Recuperar los valores enviados y buscar en el archivo ./archivos/alumnos.txt la existencia de un registro que coincida con el legajo recuperado.
Si se encuentra, borrar el archivo.
Mostrar un mensaje que diga:
'El alumno con legajo 'xxx' se ha borrado'
Si no se encuentra, mostrar el siguiente mensaje:
'El alumno con legajo 'xxx' no se encuentra en el listado'
Siendo 'xxx' el valor del legajo enviado por POST.*/

$legajo = isset($_POST["legajo"]) ? (int) $_POST["legajo"] : 0;


function borrar(int $legajo)
{
    $elementos = array();
    $retorno = "El alumno con legajo '$legajo' no se encuentra en el listado";
    $flag = false;

    $ar = fopen("./archivos/alumnos.txt", "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);
        $array_linea = explode("-", $linea);

        $array_linea[0] = trim($array_linea[0]);

        if($array_linea[0] != ""){

            $clave_legajo = trim($array_linea[0]);
            $clave_nombre = trim($array_linea[1]);
            $clave_apellido = trim($array_linea[2]);

            if ($clave_legajo == $legajo) 
            {                                
                $retorno = "El alumno con legajo '$legajo' ha sido borrado";
                $flag = true;
            }
            else
            {
                array_push($elementos, "{$clave_legajo}-{$clave_nombre}-{$clave_apellido}\r\n");
            }
        }
    }
    fclose($ar);

    if($flag)
    {
        $ar = fopen("./archivos/alumnos.txt", "w");

        $cant = 0;
        
        foreach($elementos AS $item)
        {
            $cant = fwrite($ar, $item);
        }

        if($cant >! 0)
        {
            $retorno = "Hubo un problema en la reescritura del archivo";			
        }

        fclose($ar);
    }
    
    return $retorno;
}

echo borrar($legajo);

//---------------------------------------------------------------------------------------------------------------
/*Tomando como punto de partida los ejercicios anteriores, se pide:
Crear la clase Alumno (en un namespace nombrado con su apellido) con los atributos y métodos necesarios para realizar el CRUD sobre el archivo ./archivos/alumnos.txt

Las peticiones realizarlas sobre la página nexo_poo.php*/













