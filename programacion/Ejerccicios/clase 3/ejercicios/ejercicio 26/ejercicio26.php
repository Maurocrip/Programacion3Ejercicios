<?php
/*Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos.*/

if(isset($_FILES["hola"]))
{
    $copiar = "";
    $ar = fopen($_FILES["hola"]["tmp_name"], "r");

    while(!feof($ar))
    {
        $linea = fgets($ar);

        $copiar .= $linea;
    }
    fclose($ar); 
    $path = "./misArchivos/". date('Y_m_d_H_i_s');
    file_put_contents($path, $copiar);
}
else
{
    echo "no existe el archivo";
}