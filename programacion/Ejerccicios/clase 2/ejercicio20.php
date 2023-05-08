<?php
/*Codificar las clases Punto y Rectangulo.
La clase Punto ha de tener dos atributos privados con acceso de sólo lectura (sólo con getters),
que serán las coordenadas del punto. Su constructor recibirá las coordenadas del punto.
La clase Rectangulo tiene los atributos privados de tipo Punto _vertice1, _vertice2, _vertice3 y
_vertice4 (que corresponden a los cuatro vértices del rectángulo).
La base de todos los rectángulos de esta clase será siempre horizontal. Por lo tanto, debe tener un
constructor para construir el rectángulo por medio de los vértices 1 y 3.
Los atributos ladoUno, ladoDos, área y perímetro se deberán inicializar una vez construido el
rectángulo.
Desarrollar una aplicación que muestre todos los datos del rectángulo y lo dibuje en la página.*/

class Punto
{
    private int $_x;
    private int $_y;

    function __construct(int $x, int $y)
    {
        $this-> _x =$x;
        $this-> _y =$y;       
    }

    function getX() : int
    {
        return $this->_x;
    }

    function getY() : int
    {
        return $this->_y;
    }
}

class Rectangulo
{
    private Punto $_vertice1;
    private Punto $_vertice2;
    private Punto $_vertice3;
    private Punto $_vertice4;
    public float $_area;
    public float $_perimetro;
    public int $_ladoUno;
    public int $_ladoDos;

    function __construct(Punto $v1, Punto $v3)
    {
        $this-> _vertice1 =$v1;
        $this-> _vertice3 =$v3;  
        $this-> _vertice2 = new Punto($this->_vertice1->getX(),$this->_vertice3->getY());
        $this-> _vertice4 = new Punto($this->_vertice3->getX(),$this->_vertice1->getY());

        $this->_ladoUno = $this->_vertice3->getY()-$this->_vertice1->getY();
        if($this->_ladoUno <0)
        {
            $this->_ladoUno *= -1; 
        }
        $this->_ladoDos = $this->_vertice3->getX()-$this->_vertice1->getX();
        if($this->_ladoDos <0)
        {
            $this->_ladoDos *= -1; 
        }

        $this-> _perimetro = ($this-> _ladoDos *2) + ($this-> _ladoUno *2);
        $this-> _area = $this-> _ladoDos * $this-> _ladoUno;
    }

    function Dibujar() : string
    {
        $rectangulo = "";
        for($i = 0; $i< $this->_ladoUno ; $i++)
        {
            for($j = 0; $j<$this->_ladoDos; $j++)
            {
                $rectangulo .="*";
            }
            $rectangulo .="<br>";
        }        
        return  $rectangulo;
    }
}

$punto_V1 = new Punto(1,4);
$punto_V3 = new Punto(-2, -3);

$rectan = new Rectangulo($punto_V1, $punto_V3);

echo $rectan -> Dibujar() . "<br>";
echo "altura: ". $rectan -> _ladoUno . "<br>";
echo "largo: ". $rectan -> _ladoDos . "<br>";
echo "area: ". $rectan -> _area . "<br>";
echo "perimetro: ". $rectan -> _perimetro . "<br>";
