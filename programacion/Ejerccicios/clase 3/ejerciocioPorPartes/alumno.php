<?php

namespace racioppi;

class alumno
{
    private static string $_path = "./archivos/alumnos.txt";
    public string $_apellido;
    public string $_nombre;
    public int $_legajo;
    
    function __construct(string $apellido, string $nombre, int $legajo)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_legajo = $legajo;
    }

    static function agregar(alumno $alumno) : int|bool
    {
        $retorno = false;
        if($alumno !=null)
        {          
            $archivo = fopen(alumno :: $_path,"a");
        
            $retorno = fwrite($archivo, "$alumno->_legajo-$alumno->_nombre-$alumno->_apellido\n");
    
            fclose($archivo);
        }
       
        return $retorno;
    } 

    static function mostrar() : void
    {
        $ar = fopen(alumno :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            echo $linea;		
        }
    }   

    static function encontrar(int $legajo) : string
    {
        $retorno = 'El alumno con legajo '. $legajo .' no se encuentra en el listado';
        $ar = fopen(alumno :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            $array_linea = explode("-", $linea);
            
            if($array_linea[0] === (string) $legajo)
            {
                $retorno =  'El alumno con legajo '. $legajo . ' se encuentra en el listado';
                break;
            }
        }
        return $retorno;
    }

    static function modficar(alumno $estudianteModificado) : string
    {
        $elementos = array();
        $retorno = "El alumno con legajo '$estudianteModificado->_legajo' no se encuentra en el listado";
        $flag = false;
    
        $ar = fopen(alumno :: $_path, "r");
    
        while(!feof($ar))
        {
            $linea = fgets($ar);
            $array_linea = explode("-", $linea);
    
            $array_linea[0] = trim($array_linea[0]);
    
            if($array_linea[0] != "")
            {
                $clave_legajo = trim($array_linea[0]);
                $clave_nombre = trim($array_linea[1]);
                $clave_apellido = trim($array_linea[2]);
    
                if ($clave_legajo == $estudianteModificado->_legajo) 
                {                
                    array_push($elementos, "{$estudianteModificado->_legajo}-{$estudianteModificado->_nombre}-{$estudianteModificado->_apellido}\r\n");
                    $retorno = "El alumno con legajo '$estudianteModificado->_legajo' se ha modificado";
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
            $ar = fopen(alumno :: $_path, "w");
            
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

    static function borrar(int $legajo) : string
    {
        $elementos = array();
        $retorno = "El alumno con legajo '$legajo' no se encuentra en el listado";
        $flag = false;
    
        $ar = fopen(alumno :: $_path, "r");
    
        while(!feof($ar))
        {
            $linea = fgets($ar);
            $array_linea = explode("-", $linea);
    
            $array_linea[0] = trim($array_linea[0]);
    
            if($array_linea[0] != "")
            {
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
            $ar = fopen(alumno :: $_path, "w");
            $cant=0;
            foreach($elementos AS $item)
            {
                $cant = fwrite($ar, $item);
            }
    
            if($cant === false)
            {
                $retorno = "Hubo un problema en la reescritura del archivo";			
            }
    
            fclose($ar);
        }
        
        return $retorno;
    }
}