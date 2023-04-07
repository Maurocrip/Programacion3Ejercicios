<?php
/*La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto, un
método getter y setter para el atributo _color, un método virtual (ToString) y dos métodos
abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del objeto
que lo invoque (retornar una serie de asteriscos que modele el objeto).
Ejemplo:
* *******
*** *******
***** *******

Utilizar el método ToString para obtener toda la información completa del objeto, y luego dibujarlo
por pantalla.*/

abstract class  FiguraGeometrica
{
    protected string $_color;
    protected float $_perimetro;
    protected float $_superficie;

    function __construct()
    {
       $this -> _color ="rojo"; 
       $this -> _perimetro =0; 
       $this -> _superficie =0; 
    }   

    function setterColor(string $color) : void
    {
        $this -> _color =$color; 
    }

    function getterColor() : string
    {
       return $this -> _color; 
    }

    function ToString() : string
    {
        return "color: " . $this->getterColor() . "  perimetro: " . $this -> _perimetro . 
        "  superficie: " . $this -> _superficie;
    }

    abstract function Dibujar() : string;

    protected abstract function CalcularDatos() : void;
}

class triangulo extends FiguraGeometrica
{    
    private float $_altura;
    private float $_base;

    function __construct(float $altura,float $base)
    {
        parent :: __construct();
        $this -> _base =$base; 
        $this -> _altura =$altura; 
        $this -> CalcularDatos();
    }   

    function Dibujar() : string
    {
        //si contaramos la medida del triangulo, se hace con un for
        echo "  * <br>" . " *** <br>" . " **** <br>" . "****** <br>" ;
        return $this-> getterColor();
    }

    protected function CalcularDatos() : void
    {    
        $this->_superficie = ($this-> _base * $this->_altura)/2;   
        $this->_perimetro = $this-> _base * 3;   
    }

    function ToString() : string
    {
        return parent :: ToString() . "  base: " . $this->_base . "  altura: " . $this -> _altura;
    }
}

class rectangulo extends FiguraGeometrica
{    
    private float $_ladoUno;
    private float $_ladoDos;

    function __construct(float $ladoUno,float $ladoDos)
    {
        parent :: __construct();
        $this -> _ladoUno =$ladoUno; 
        $this -> _ladoDos =$ladoDos; 
        $this -> CalcularDatos();
    }   

    function Dibujar() : string
    {
        //si contaramos la medida del rectangulo, se hace con un for
        echo " **** <br>" . " **** <br>" . " **** <br>" . "**** <br>" ;
        return $this-> getterColor();
    }

    protected function CalcularDatos() : void
    {    
        $this->_superficie = $this-> _ladoDos * $this->_ladoUno;   
        $this->_perimetro = ($this-> _ladoDos *2)+($this->_ladoUno*2);   
    }

    function ToString() : string
    {
        return parent :: ToString() . "  lado uno: " . $this-> _ladoUno . "  lado dos: " . $this -> _ladoDos;
    }
}

$objetoTriangulo = new triangulo(2,3);
$objetoRectangulo= new rectangulo(5,4);

echo "forma del rectangulo: <br>";
$objetoRectangulo->Dibujar();

echo "<br>forma del triangulo: <br>";
$objetoTriangulo->Dibujar();

echo "<br>informacion del rectangulo: <br>";
echo $objetoRectangulo->ToString();

echo "<br>informacion del triangulo: <br>";
echo $objetoTriangulo->ToString();
