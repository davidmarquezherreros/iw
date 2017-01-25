<?php
	class Lista_desear_m extends CI_model {

		function get_all_id($FK_Usuario) { // Devuelve la lista
			$this->db->select('*');
			$this->db->where("FK_Usuario", $FK_Usuario);
			return $this->db->get("lista_desear")->result();
		}
		function insertar_lista_desear($FK_Usuario){
			$data = array(
				'FK_Usuario'	=> $FK_Usuario,
			);

			//Lo insertamos en la BD
			$this->db->insert('lista_desear',$data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
	}
?>
