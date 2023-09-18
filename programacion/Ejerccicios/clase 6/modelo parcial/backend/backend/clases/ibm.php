<?php
interface IBM
{
    function Modificar(int $id) : bool;

    static function Eliminar(int $id) : bool;
}