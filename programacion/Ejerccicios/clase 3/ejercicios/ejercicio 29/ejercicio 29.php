<?php
/* Realizar una página que posea sólo un control <select> (lista de opciones), con seis nombres
de colores como opciones (y su correspondiente código RGB como valor asociado), y un control
<input> (type=”button”) con la leyenda “Cambiar Color”.
La funcionalidad de la aplicación es sencilla, se selecciona un color del combo, se pulsa el botón
y el color de fondo de la página cambia a dicho color. */

$op = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : null;
echo '<body style="background-color:'.$op.';"></body>';