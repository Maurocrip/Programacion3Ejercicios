<?php
if(isset($_FILES["archivo"]))
{          
    $tipoArchivo = pathinfo($_FILES["archivo"]["full_path"], PATHINFO_EXTENSION);
    $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);
    if($esImagen == false) 
    {
        if($tipoArchivo === "txt") 
        {
            /* $ar = fopen($_FILES["archivo"]["tmp_name"], "r");

            while(!feof($ar))
            {
                $linea = fgets($ar);

                echo $linea;	
                echo "<br>";		
            }
            fclose($ar); */
            $nombres = file_get_contents($_FILES["archivo"]["tmp_name"]);
            echo  $nombres;
        }
        else
        {
            echo "no es un archivo txt";
        }
    }
}
else
{
    echo "el archivo no existe";
}