<?php

class Conexion
{

    static public function conectar()
    {

        $server = "db-restadvisor";
        $user = "admin";
        $pass = "M4sT3r4Dm1n";
        $db = "restadvisor";

        $link = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

        $link->exec("set names utf8");

        return $link;
    }
}
