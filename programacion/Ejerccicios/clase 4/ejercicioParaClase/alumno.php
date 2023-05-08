<?php
/*PARTE 1:
Tomando como punto de partida los ejercicios anteriores (clase03), se pide:
Agregar a la clase Alumno el atributo 'foto' (string) y modificar los métodos necesarios para realizar el CRUD sobre el archivo ./archivos/alumnos_foto.txt, que ahora tendrá el siguiente formato:

legajo - apellido - nombre - foto (el path)

La foto guardarla en ./fotos y su nombre será:
*- legajo.extension
*/
namespace racioppi;

class alumnoClase4
{
    private static string $_path = "./archivos/alumnos_fotos.txt";
    public string $_apellido;
    public string $_nombre;
    public string $_foto;
    public int $_legajo;
    
    function __construct(string $apellido, string $nombre, int $legajo, string $foto)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_legajo = $legajo;
        $this->_foto = $foto;
    }

    static function agregar(alumnoClase4 $alumno) : int|bool
    {
        $retorno = false;
        if($alumno !=null && alumnoClase4 :: encontrar($alumno->_legajo))
        {          
            $archivo = fopen(alumnoClase4 :: $_path,"a");
        
            $retorno = fwrite($archivo, "$alumno->_legajo-$alumno->_nombre-$alumno->_apellido-$alumno->_foto\n");
    
            fclose($archivo);
        }
       
        return $retorno;
    } 

    static function mostrar() : void
    {
        $ar = fopen(alumnoClase4 :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            echo $linea;		
        }
        fclose($ar);
    }   

    static function encontrar(int $legajo) : bool
    {
        $retorno = false;
        $ar = fopen(alumnoClase4 :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            $array_linea = explode("-", $linea);
            
            if($array_linea[0] === (string) $legajo)
            {
                $retorno =  true;
                break;
            }
        }
        fclose($ar);
        return $retorno;
    }

    static function modficar(alumnoClase4 $estudianteModificado) : string
    {
        $elementos = array();
        $retorno = "El alumno con legajo '$estudianteModificado->_legajo' no se encuentra en el listado";
        $flag = false;
    
        $ar = fopen(alumnoClase4 :: $_path, "r");
    
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
                $clave_foto = trim($array_linea[3]);
    
                if ($clave_legajo == $estudianteModificado->_legajo) 
                {                
                    array_push($elementos, "{$estudianteModificado->_legajo}-{$estudianteModificado->_nombre}-{$estudianteModificado->_apellido}-{$estudianteModificado->_foto}\r\n");
                    $retorno = "El alumno con legajo '$estudianteModificado->_legajo' se ha modificado";
                    $flag = true;
                }
                else{
    
                    array_push($elementos, "{$clave_legajo}-{$clave_nombre}-{$clave_apellido}-{$clave_foto}\r\n");
                }
            }
        }
        fclose($ar);
    
        if($flag)
        {
            $ar = fopen(alumnoClase4 :: $_path, "w");
            
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
    
        $ar = fopen(alumnoClase4 :: $_path, "r");
    
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
                $clave_foto = trim($array_linea[3]);
    
                if ($clave_legajo == $legajo) 
                {                                
                    $retorno = "El alumno con legajo '$legajo' ha sido borrado";
                    $flag = true;
                }
                else
                {
                    array_push($elementos, "{$clave_legajo}-{$clave_nombre}-{$clave_apellido}-{$clave_foto}\r\n");
                }
            }
        }
        fclose($ar);
    
        if($flag)
        {
            $ar = fopen(alumnoClase4 :: $_path, "w");
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

    static function obtener(int $legajo) : alumnoClase4 | null
    {
        $retorno = null;
        $ar = fopen(alumnoClase4 :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            $array_linea = explode("-", $linea);
            
            if($array_linea[0] === (string) $legajo)
            {
                $retorno = new  alumnoClase4($array_linea[2],$array_linea[1],$array_linea[0],$array_linea[3]);
                break;
            }
        }
        fclose($ar);
        return$retorno;
    }
}