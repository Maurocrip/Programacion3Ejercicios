<?php
/*Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.*/
$animal = [];
$numero = [];
$lenguaje = [];
$arrayIndexado = [];
$arrayAsociativo = [];

array_push($animal,"Perro", "Gato", "Ratón", "Araña", "Mosca");
array_push($numero,"1986", "1996", "2015", "78", "86");
array_push($lenguaje,"php", "mysql", "html5", "typescript", "ajax");

array_push($arrayIndexado,$animal,$numero,$lenguaje);

$arrayAsociativo["primerArray"] =$animal ;
$arrayAsociativo["segundoArray"] =$numero ;
$arrayAsociativo["tercerArray"] =$lenguaje ;

var_dump($arrayAsociativo);
