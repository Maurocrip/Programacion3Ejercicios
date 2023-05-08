<?php

sleep(rand(0, 6));

$disponible = rand(0, 1);

if ($disponible == 1) 
{
    echo "El nombre de usuario está disponible.";
} 
else 
{
    $nombres_array = array();
    $ar = fopen("nombresSugeridos.txt", "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);

        array_push($nombres_array,$linea);		
    }
    fclose($ar);
    /*$nombres = file_get_contents("nombresSugeridos.txt");
    $nombres_array = explode("\n", $nombres);*/
    
    echo "El nombre de usuario no está disponible. ¿Te gustaría probar con alguno de estos nombres?";
    echo "<ul>";
    foreach ($nombres_array as $nombre) {
        echo "<li><a href='javascript:void(0)' onclick=\"document.getElementById('username').value='$nombre'\">$nombre</a></li>";
    }
    echo "</ul>";
}
