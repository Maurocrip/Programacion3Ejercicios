<?php
/*Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca
estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. No tener en
cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla.*/

$ar = fopen("./misArchivos/palabras.txt", "r");

while(!feof($ar))
{
    $linea = fgets($ar);

    $array_linea = explode(" ", $linea);
    
    $contador = 0;
    foreach ($array_linea as $palabra) 
    {
        for ($i=0; $i < strlen($palabra); $i++) 
        { 
            if($palabra[$i]!== "-" && $palabra[$i]!== "\n")
            {
                $contador++;
            }
        }
    }
}
if($contador <= 4)
{
    echo $contador;
}
else
{
    echo "tiene mas de 4 caracteres.";
}
