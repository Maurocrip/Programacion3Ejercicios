<?php
/*Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla. */

$operadorArray = array("+","-","/","*");
$op1 = rand(0,100);
$op2 = rand(0,100);
 
$operador = $operadorArray[rand(0,count($operadorArray) - 1)];
echo($op1 . $operador . $op2 . "=" . eval("return $op1  $operador  $op2;"));