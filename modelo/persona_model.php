<?php

require_once($_SERVER['DOCUMENT_ROOT']."/IngresoRegistro/modelo/global.php");
/**
* Clase Persona_Model
* Objetos y métodos para la clase Persona
*/
class Persona_Model{
	private $db;
	private $persona;
	private $pers_id;
	private $pers_nombres;
	private $pers_apellidos;
	private $pers_documento;
	private $pers_email;
	private $pers_password;
	private $rol_id;

	public function __construct($pers_id,$pers_nombres,$pers_apellidos,$pers_documento,$pers_email,$pers_password,$rol_id){
		$this->db = Conexion::conectar();
		$this->persona=array();
		$this->pers_id=$pers_id;
		$this->pers_nombres=$pers_nombres;
		$this->pers_apellidos=$pers_apellidos;
		$this->pers_documento=$pers_documento;
		$this->pers_email=$pers_email;
		$this->pers_password=$pers_password;
		$this->rol_id=$rol_id;
	}

	public function getPersonas(){
		$constulta=$this->db->query("SELECT persona.*, rolusuario.rol_desc FROM persona INNER JOIN rolusuario ON persona.rol_id = rolusuario.rol_id");
		while($filas=$constulta->fetch_assoc()){
			$this->persona[]=$filas;
		}
		return $this->persona;
	}

	public function getPersona(){
		$constulta=$this->db->query("SELECT * FROM persona WHERE pers_id = '$this->pers_id'");
		while($filas=$constulta->fetch_assoc()){
			$this->persona[]=$filas;
		}
		return $this->persona;
	}

	public function postPersona(){
		$constulta=$this->db->query("INSERT INTO persona (pers_id, pers_nombres, pers_apellidos, pers_documento, pers_email, pers_password, rol_id, pers_estado) VALUES (NULL, '$this->pers_nombres', '$this->pers_apellidos', '$this->pers_documento', '$this->pers_email', '$this->pers_password', '$this->rol_id', '1');");
		header('Location: '.URL_PBL.'/?url=persona');
	}

	public function updatePersona(){
		$constulta=$this->db->query("UPDATE persona SET pers_nombres = '$this->pers_nombres', pers_apellidos = '$this->pers_apellidos', pers_documento = '$this->pers_documento', pers_email = '$this->pers_email' WHERE persona.pers_id = '$this->pers_id';");
		header('Location: '.URL_PBL.'/?url=persona');
	}

	public function dropPersona(){
		$constulta=$this->db->query("UPDATE persona SET pers_estado = 0 WHERE persona.pers_id = '$this->pers_id';");
		return $this->pers_id;
	}

	public function enablePersona(){
		$constulta=$this->db->query("UPDATE persona SET pers_estado = 1 WHERE persona.pers_id = '$this->pers_id';");
		return $this->pers_id;
	}
}