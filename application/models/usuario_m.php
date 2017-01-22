<?php
	class Usuario_m extends CI_model {

		function get_all() {
		$this->db->select('id, Email, Password, UserName');
		return $this->db->get("usuario")->result();
		}

		function get_usuario_id($id){
			$this->db->select('Username');
			$this->db->where('id', $id);
			return $this->db->get("Usuario")->result();

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
		function login($username, $password){
			$this->db->select('Username, Password, Admin');
			$this->db->where('Username', $username);
			$this->db->where('Password', $password);
			return $this->db->get("Usuario")->result();
		}

		function get_id_username($username){
			$this->db->select('id');
			$this->db->where('Username', $username);
			return $this->db->get("Usuario")->result();
		}
	}
?>
