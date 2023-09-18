<?php

require_once("accesoABase.php");
require_once("ibm.php");

class Usuario implements IBM
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
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios WHERE correo = :correo AND clave = :clave");        
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
        $consulta->execute();
        
        $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);                                                

        return $objeto; 
    }

    function Modificar(int $id) : bool
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $retorno = false;
        $consulta =$objetoAccesoDato->retornarConsulta("UPDATE usuarios SET correo = :correo, 
                                                        nombre = :nombre, clave = :clave, id_perfil = :id_perfil WHERE id = :id");
        
        if($consulta != false)
        {
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            $consulta->bindValue(':correo', $this->_correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->_clave, PDO::PARAM_STR);
            $consulta->bindValue(':id_perfil', $this->_id_perfil, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $this->_nombre, PDO::PARAM_STR);
            $retorno =true;
            $consulta->execute();
        }
        
        return $retorno;
    }

    static function Eliminar(int $id) : bool
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $retorno = false;
        $consulta =$objetoAccesoDato->retornarConsulta("DELETE FROM usuarios WHERE id = :id");
        
        if($consulta != false)
        {
            $retorno =true;
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }

        return $retorno;
    }
}