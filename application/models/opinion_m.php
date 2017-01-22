<?php
	class Opinion_m extends CI_model {

		// Para comprobar si la aportación existe
		function get_opinion_Id($id) {
			$this->db->select('id');
			$this->db->where('id', $id);

			return $this->db->get("Opinion")->result();
		}
	}
?>
