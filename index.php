<?php
require_once($_SERVER['DOCUMENT_ROOT']."/IngresoRegistro/modelo/global.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="<?php echo URL_PBL; ?>/vista/images/logo.png" rel="shortcut icon">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL_PBL; ?>/vista/css/style.css">
	<title><?php if(isset($_GET["url"])){echo $_GET["url"];}else{echo "Ingreso y registro"; } ?></title>
</head>
<body>
	<?php
	require(URL."/vista/menu.html");
	if(!isset($_GET["url"])){
		if(explode("/",$_SERVER["REQUEST_URI"])[2] !== ''){
			require_once(URL."/vista/404.php");
		}else{
			require_once(URL."/vista/index.php");			
		}
	}else{
		$path = "controlador/".$_GET["url"]."_controller.php";
		if(!file_exists($path) || !$_GET["url"]){
			require(URL."/vista/404.php");
		}else{
			require($path);
		}
	}
	?>
</body>
</html>