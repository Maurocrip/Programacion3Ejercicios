<?php
//En testAuto.php:
require_once "./claseAuto.php";

//-Crear dos objetos “Auto” de la misma marca y distinto color.
$objetoMismaMarca1 = new Auto("pep2","rojo",23000);
$objetoMismaMarca2 = new Auto("pep2","verde",21000);

//-Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$objetoMismaMarcaYColor1 = new Auto("pep2","azul",15000);
$objetoMismaMarcaYColor2 = new Auto("pep2","azul",40000);

//-Crear un objeto “Auto” utilizando la sobrecarga restante.
$objetoRestante = new Auto("caca","violeta",10000, new DateTime('2013-09-20'));

//-Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
$objetoMismaMarcaYColor1->AregarImpuestos(1500);
$objetoMismaMarcaYColor2->AregarImpuestos(1500);
$objetoRestante->AregarImpuestos(1500);

//-Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
echo "precioTotal: " . Auto::Add($objetoMismaMarca1,$objetoMismaMarca2);

//-Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
if($objetoMismaMarca1->Equals($objetoMismaMarca2))
{
    echo "<br>los autos 1 y 2 son iguales<br>";
}
else
{
    echo "<br>los autos 1 y 2 no son iguales<br>";
}

if($objetoMismaMarca1->Equals($objetoRestante))
{
    echo "<br>los autos 1 y 5 son iguales<br>";
}
else
{
    echo "<br>los autos 1 y 5 no son iguales<br>";
}

//-Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)*/
echo "<br>Auto1: <br>";
Auto::MostrarAuto($objetoMismaMarca1);
echo "<br>Auto3: <br>";
Auto::MostrarAuto($objetoMismaMarcaYColor1);
echo "<br>Auto5:<br>";
Auto::MostrarAuto($objetoRestante);












