<?php
class Bases {

static $mysqli;
static $servidor = 'localhost';
static $usuario = 'bases_user';
static $password = 'bas3s';
static $base_de_datos = 'base_de_datos';

public function __construct()
{
    self::conectar();
}

protected function conectar()
{
self::$mysqli = new mysqli (self::$servidor, self::$usuario, self::$password,self::$base_de_datos);
if(self::$mysqli->connect_error){
die ('Error de conexion (' . self::$mysqli->connect_error . ')' . self::$mysqli->connect_error);
}
}

public function obten_conexion()
{
    return self::$mysqli;
}

}
?>
