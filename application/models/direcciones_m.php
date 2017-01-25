<?php
	class Direcciones_m extends CI_model {

		function get_all_user($FK_Usuario) {
			$this->db->select('*');
			$this->db->where('FK_Usuario', $FK_Usuario);
			return $this->db->get("direcciones")->result();
		}

	}
?>
