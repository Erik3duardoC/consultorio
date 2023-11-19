<?php
/**
 * Login Modelo
 */
class LoginModelo
{
	public $db;
		
	function __construct()
	{
		$this->db = new MySQLdb();
	}
	public function validarCorreo($email)	{
		$sql = "SELECT * FROM admon WHERE correo='".$email."'"; 
		$data = $this->db->query($sql);
		return (count($data) == 0)? false : true;
	}
	public function enviarCorreo($email='') {
		$data = [];
		if ($email == "") {
			return false;
		} else {
			$data = $this-> getUsuarioCorreo($email);
			if (!empty($data)) {
				var_dump($data);
			} else {
				return false;
			}
		}
	}

	public function getUsuarioCorreo($email=''){
		$sql = "SELECT * FROM admon WHERE correo ='".$email."' and baja = 0";
		$data = $this ->db->query($sql);
		return $data;
	}
}	