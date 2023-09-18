<?php
/*
PARTE 1:
Tomando como punto de partida los ejercicios anteriores (clase04), se pide:
Agregar la base alumno_pdo (ver alumno_pdo.sql)
Tabla: alumnos

id(pk) - legajo - apellido - nombre - foto (el path)


La foto se seguirá guardando en ./fotos y su nombre será:
*- legajo.extension

Agregar los métodos:
agregar_bd
listar_bd --> retorna array de Alumno
obtener_bd --> retorna Alumno
modificar_bd
borrar_bd
redirigir_bd
*/
require_once "./PDO.php";

class alumnoClase5
{
    private static string $_path = "./fotos";
    public string $_apellido;
    public string $_nombre;
    public string $_foto;
    public int $_legajo;
    
    function __construct(string $apellido = "", string $nombre= "", int $legajo= 0, string $foto= "")
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_legajo = $legajo;
        $this->_foto = $foto;
    }


    //---------------------------------MANEJO DE ARCHIVOS---------------------------------------------------------------------------------------------------
    static function agregar(alumnoClase5 $alumno) : int|bool
    {
        $retorno = false;
        if($alumno !=null && alumnoClase5 :: encontrar($alumno->_legajo))
        {          
            $archivo = fopen(alumnoClase5 :: $_path,"a");
        
            $retorno = fwrite($archivo, "$alumno->_legajo-$alumno->_nombre-$alumno->_apellido-$alumno->_foto\n");
    
            fclose($archivo);
        }
       
        return $retorno;
    } 

    static function mostrar() : void
    {
        $ar = fopen(alumnoClase5 :: $_path, "r");

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
        $ar = fopen(alumnoClase5 :: $_path, "r");

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

    static function modficar(alumnoClase5 $estudianteModificado) : string
    {
        $elementos = array();
        $retorno = "El alumno con legajo '$estudianteModificado->_legajo' no se encuentra en el listado";
        $flag = false;
    
        $ar = fopen(alumnoClase5 :: $_path, "r");
    
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
            $ar = fopen(alumnoClase5 :: $_path, "w");
            
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
        $ar = fopen(alumnoClase5 :: $_path, "r");
    
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
            $ar = fopen(alumnoClase5 :: $_path, "w");
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

    static function obtener(int $legajo) : alumnoClase5 | null
    {
        $retorno = null;
        $ar = fopen(alumnoClase5 :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);

            $array_linea = explode("-", $linea);
            
            if($array_linea[0] === (string) $legajo)
            {
                $retorno = new  alumnoClase5($array_linea[2],$array_linea[1],$array_linea[0],$array_linea[3]);
                break;
            }
        }
        fclose($ar);
        return$retorno;
    }


    //---------------------------------MANEJO DE BD---------------------------------------------------------------------------------------------------------
   
    public static function traerTodosLosAlumnos()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM alumnos");        
        
        $consulta->execute();                                           

        //$consulta->fetchAll(PDO::FETCH_OBJ);
        //$consulta->setFetchMode(PDO::FETCH_INTO, new alumnoClase5);
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    static function encontrarAlumnoLegajo(int $legajo)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM alumnos WHERE legajo = $legajo");        
        
        $consulta->execute();
        
        $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objeto; 
    }

    static function encontrarAlumnoId(int $id) 
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM alumnos WHERE id = $id");        
        
        $consulta->execute();
        
        $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);                                           

        return  $objeto; 
    }
    
    public function insertarElAlumno()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("INSERT INTO alumnos ( legajo, apellido, nombre, foto)"
                                                    . "VALUES( :legajo, :apellido, :nombre, :foto)");
        
        $consulta->bindValue(':legajo', $this->_legajo, PDO::PARAM_INT);
        $consulta->bindValue(':apellido', $this->_apellido, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->_nombre, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->_foto, PDO::PARAM_STR);

        $consulta->execute();   
    }
    
    public static function modificarAlumno(int $id, string $nombre, int $legajo, string $apellido, string $foto)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("UPDATE alumnos SET legajo = :legajo, apellido = :apellido, 
                                                        nombre = :nombre, foto = :foto WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':foto', $foto, PDO::PARAM_STR);
        $consulta->bindValue(':legajo', $legajo, PDO::PARAM_INT);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);

        return $consulta->execute();
    }

    public static function eliminarAlumno(int $id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("DELETE FROM alumnos WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        return $consulta->execute();
    }
}