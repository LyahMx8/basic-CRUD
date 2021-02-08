<?php
require_once($_SERVER['DOCUMENT_ROOT']."/IngresoRegistro/modelo/global.php");

class Conexion {
	public static function conectar(){
		$conexion = new mysqli(SERVER,USER,PASSW,DB);
		$conexion->query("SET NAMES 'utf8'");
		return $conexion;
	}
}