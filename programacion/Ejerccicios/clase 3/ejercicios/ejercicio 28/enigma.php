<?php
/*Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar, recibirá un mensaje y a cada número del código ASCII de cada
carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un
archivo de texto (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar
correctamente el archivo encriptado, FALSE, caso contrario.
El método estático Desencriptar, recibirá sólo el path de dónde se leerá el archivo. Realizar el
proceso inverso para restarle a cada número del código ASCII de cada carácter leído 200, para
poder retornar el mensaje y ser mostrado desesncriptado.*/
class Enigma
{
    static function encriptar(string $palabra, string $path) : bool
    {
        $retorno = false;
        if(isset($path))
        {
            $texto = "";
            for ($i=0; $i < strlen($palabra); $i++) 
            { 
                if($i != strlen($palabra)-1)
                {
                    $texto .= strval(ord($palabra[$i]) + 200) . " ";
                }
                else
                {
                    $texto .= strval(ord($palabra[$i]) + 200);
                }
                
            }
            file_put_contents($path, $texto);
            $retorno = true;
        }    
        return $retorno;    
    }
    

    static function desEncriptar(string $path) : string
    {
        $texto = "";
        if(isset($path))
        {
            $palabra = file_get_contents($path);
            $array_palabra = explode(" ",$palabra);
            foreach ($array_palabra as $palabra) 
            {
                $texto .=chr(intval($palabra) - 200);
            }
        }        
        return $texto;    
    }
}