<?php
/*En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.*/
require_once "./ejercicio22.php";

$auto1 = new Auto("ford","rojo",23000);
$auto2 = new Auto("tesla","verde",21000);

$garajeAutos = new Garage("mirazon",24);

echo "Prueba de la funcion mostrar graje:<br>";
echo $garajeAutos->MostrarGarage();

echo"<br>Prueba del equals de garaje, no esta el auto<br>";
if($garajeAutos->Equals($auto1))
{
    echo "El auto esta en el garage<br>";
}
else
{
    echo "El auto no esta en el garage<br>";
}

echo "<br>Prueba del add de garaje<br>";
if($garajeAutos->Add($auto1))
{
    echo "El auto se agrego al garage<br>";
}
else
{
    echo "El auto no se agrego al garage<br>";
}

echo"<br>Prueba del equals de garaje, esta el auto<br>";
if($garajeAutos->Equals($auto1))
{
    echo "El auto esta en el garage<br>";
}
else
{
    echo "El auto no esta en el garage<br>";
}

echo"<br>Prueba del remove<br>";
$garajeAutos->Add($auto2);
$garajeAutos->Remove($auto2);
if($garajeAutos->Equals($auto2))
{
    echo "El auto esta en el garage<br>";
}
else
{
    echo "El auto no esta en el garage<br>";
}