<?php
class Conexion
{
    static public function conectar()
    {
        # code...       

        $link = new PDO("mysql:host=localhost;dbname=proyecto","root","");

        $link -> exec("set names utf8");

        return $link;

    } 
}