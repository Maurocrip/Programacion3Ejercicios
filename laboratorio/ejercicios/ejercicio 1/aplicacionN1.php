<?php
$numero = isset($_REQUEST["numero"]) ? (int) $_REQUEST["numero"] : 0;
$diferencia = 0;
for ($i=0; $i <= $numero ; $i++) 
{   
    if(!($i%2 === 0))
    {
        $diferencia ++;
    }
}
echo $diferencia;