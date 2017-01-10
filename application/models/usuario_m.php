<?php
	class Usuario_m extends CI_model {

		function get_all() {
		$this->db->select('id, Email, Password, UserName');
		return $this->db->get("usuario")->result();
		}

		function count_all() {
			return $this->db->count_all("usuario");
		}

		function nueva_cuenta($userName, $email, $password) {
			$data = array(
				'UserName'	=> $userName,
				'Email' => $email,
				'Password' => $password
			);
			
			//Lo insertamos en la BD
			$this->db->insert('usuario',$data);
			
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			
		}
	}
?>
