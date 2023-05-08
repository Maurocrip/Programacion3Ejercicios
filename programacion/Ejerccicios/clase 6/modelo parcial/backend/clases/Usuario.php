<?php

require_once("accesoABase.php");

class Usuario
{
    private static string $_path = "./archivos/usuarios.json";
    public int $_id;
    public string $_nombre;
    public string $_correo;
    public string $_clave;
    public int $_id_perfil;
    public int $_perfil;
    
    function __construct(string $correo, string $nombre, string $clave, int $id = -1, int $id_perfil = -1, int $perfil = -1)
    {
        $this->_nombre = $nombre;
        $this->_correo = $correo;
        $this->_clave = $clave;
        $this->_id = $id;
        $this->_id_perfil = $id_perfil;
        $this->_perfil = $perfil;
    }

    function ToJSON() : string
    {
        $objeto = new stdClass();
        
        $objeto->nombre = $this->_nombre;
        $objeto->correo = $this->_correo;
        $objeto->clave = $this->_clave;
        
        return json_encode($objeto);
    }

    function GuardarEnArchivo() : string
    {
        $retorno = false;
        $archivo = fopen(Usuario :: $_path,"a");
       
        if($archivo != false)
        {
            if(fwrite($archivo, $this->ToJSON()."\r\n") != false)
            {
                $retorno = true;
                $mensaje = "escritura exitosa";
            }
            else
            {
                $mensaje = "No se pudo escribir en el archivo";
            }
            fclose($archivo);
        }
        else
        {
            $mensaje = "No se pudo abrir el archivo";
        }

        $objeto = new stdClass();
        
        $objeto->bool = $retorno;
        $objeto->mensaje = $mensaje;

        return json_encode($objeto);
    }

    static function TraerTodosJSON() : array
    {
        $array = array();
        $ar = fopen(Usuario :: $_path, "r");

        while(!feof($ar))
        {
            $linea = fgets($ar);
            $linea = trim($linea);
            if($linea != "")
            {
                $objeto = json_decode($linea);
                array_push($array, new Usuario($objeto->correo,$objeto->nombre,$objeto->clave));
            }
        }

        fclose($ar);
        return  $array;
    }   

    function Agregar() : bool
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("INSERT INTO usuarios (id, correo, clave, nombre, id_perfil)"
                                                    . "VALUES(:id, :correo, :clave, :nombre, :id_perfil)");
        
        $consulta->bindValue(':id', $this->_id, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $this->_correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->_clave, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->_nombre, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->_id_perfil, PDO::PARAM_INT);

        $consulta->execute();  
        
        return true;
    }

    public static function TraerTodos()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios");        
        
        $consulta->execute();
        
        //$consulta->setFetchMode(PDO::FETCH_OBJ);                                                

        return $consulta->fetchAll(PDO::FETCH_OBJ) ; 
    }

    public static function TraerUno(string $correo, string $clave)
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios WHERE correo = $correo AND clave = $clave");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_OBJ);                                                

        return $consulta; 
    }
////////////////////////////////////////////////////////////////////////////////////////
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