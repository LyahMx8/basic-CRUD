<?php

require_once($_SERVER['DOCUMENT_ROOT']."/IngresoRegistro/modelo/persona_model.php");

if(!isset($_POST['action'])){
	$pers = new Persona_Model(0,0,0,0,0,0,0);
	$pers_datos = $pers->getPersonas();
}else{
	if($_POST['action'] == 'registro'){
		$pers = new Persona_Model(0,$_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['email'],$_POST['password'],$_POST['rol']);
		$pers_datos = $pers->postPersona();
	}
	
	else if($_POST['action'] == 'consulta'){
		$pers = new Persona_Model($_POST['pers_id'],0,0,0,0,0,0);
		$pers_datos = $pers->getPersona();
		print_r(json_encode($pers_datos));
		exit;
	}
	
	else if($_POST['action'] == 'editar'){
		$pers = new Persona_Model($_POST['pers_id'],$_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['email'],0,0);
		$pers_datos = $pers->updatePersona();
	}else if($_POST['action'] == 'borrar'){
		$pers = new Persona_Model($_POST['pers_id'],0,0,0,0,0,0);
		$pers_datos = $pers->dropPersona();
		echo $_POST['pers_id'];
		exit;
	}else if($_POST['action'] == 'activar'){
		$pers = new Persona_Model($_POST['pers_id'],0,0,0,0,0,0);
		$pers_datos = $pers->enablePersona();
		echo $_POST['pers_id'];
		exit;
	}
}

require($_SERVER['DOCUMENT_ROOT']."/IngresoRegistro/vista/persona_view.php");