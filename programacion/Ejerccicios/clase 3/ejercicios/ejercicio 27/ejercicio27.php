<?php
/*Modificar el ejercicio anterior para que el contenido del archivo se copie de manera invertida,
es decir, si el archivo origen posee ‘Hola mundo’ en el archivo destino quede ‘odnum aloH’.*/

if(isset($_FILES["hola"]))
{
    $copiar = "";
    $ar = fopen($_FILES["hola"]["tmp_name"], "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);

        $copiar .= strrev($linea);  //unico cambio
        
    }
    fclose($ar); 
    $path = "./misArchivos/". date('Y_m_d_H_i_s');

    file_put_contents($path, $copiar);
}
else
{
    echo "no existe el archivo";
}