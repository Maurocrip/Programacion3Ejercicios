<?php
require_once "./ejercicioparte1.php";
require_once "./ejercicioparte2.php";
//Crear en el directorio raíz, el archivo test.php, el cual deberá:
use Animalitos\Mascota;
use Negocios\Guarderia;

//Crear dos objetos “Mascota” con el mismo nombre y distinto tipo.
$mascota1 = new Mascota("simona","cobaya");
$mascota2 = new Mascota("simona","perra");

//Mostrarlos (uno con el método estático y el otro con el de instancia) 
echo "Muestro mascota 1 por metodo estatico:<br>";
echo Mascota::mostrar($mascota1);

echo "<br>Muestro mascota 2 por metodo de instancia:<br>";
echo $mascota2->toString();

//Compararlos.
echo "<br>comparo mascota 1 con mascota 2:<br>";
if($mascota1->equals($mascota2))
{
    echo "son iguales:<br>";
}
else
{
    echo "no son iguales<br>";
}

//Crear dos objetos “Mascota” con el mismo nombre, mismo tipo y distintas edades.
$mascota3 = new Mascota("simona","cobaya",12);
$mascota4 = new Mascota("simona","cobaya",34);

//Mostrarlos (uno con el método estático y el otro con el de instancia) 
echo "<br>Muestro mascota  3 por metodo estatico:<br>";
echo Mascota::mostrar($mascota3);

echo "<br>Muestro mascota 4 por metodo de instancia:<br>";
echo $mascota4->toString();

//Compararlos.
echo "<br>comparo mascota 3 con mascota 4:<br>";
if($mascota3->equals($mascota4))
{
    echo "son iguales:<br>";
}
else
{
    echo "no son iguales<br>";
}

//Comparar la primera “Mascota” con la tercera.
echo "<br>comparo mascota 1 con mascota 3:<br>";
if($mascota1->equals($mascota3))
{
    echo "son iguales:<br>";
}
else
{
    echo "no son iguales<br>";
}


/*Agregar en el archivo test.php:

Crear una guardería con nombre 'La guardería de Pancho' y:
Intentar agregar todas las mascotas.
Mostrar el contenido de la guardería.*/
$guarderiaPrueba = new Guarderia("La guardería de Pancho");

$guarderiaPrueba->add($mascota1);
$guarderiaPrueba->add($mascota2);
$guarderiaPrueba->add($mascota3);
$guarderiaPrueba->add($mascota4);

echo "<br>MUESTRO LAS MASCOTAS DE GUARDERIA<br>";
echo $guarderiaPrueba->toString();




