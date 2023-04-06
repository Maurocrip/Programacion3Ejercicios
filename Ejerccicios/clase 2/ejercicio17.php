<?php
/*Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La función
validará que la cantidad de caracteres que tiene $palabra no supere a $max y además deberá
determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.*/

function comprobacion(string $palabra, int $max) : int
{
    $retorno =0;
    if(strlen($palabra)<= $max)
    {
        $array = array("Recuperatorio","Parcial","Programacion");
        for($i =0;$i <count($array); $i++)
        {
            if($palabra == $array[$i])
            {
                $retorno =1;
                $i =count($array);
            }
        }
    }
        
    return $retorno;
}

echo "palabra: Recuperatorio - max 3<br>".comprobacion("hola",3). "<br>";
echo "palabra: Recuperatorio - max 100<br>".comprobacion("Recuperatorio",100)."<br>";
echo "palabra: hola - max 6<br>".comprobacion("hola",100);