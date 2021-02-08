<?php

define("SERVER", 'localhost');
define("USER", 'root');
define("PASSW", '');
define("DB", 'ingreso_registro');

define("URL", $_SERVER['DOCUMENT_ROOT'].'/IngresoRegistro');
define("URL_PB", $_SERVER['HTTP_HOST'].'/IngresoRegistro');
define("URL_PBL", '/IngresoRegistro');

require_once(URL."/db/conexion.php");