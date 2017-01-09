<?php
	class Seccion_m extends CI_model {

		// Para comprobar si la aportación existe
		function get_seccionId($id) {
			$this->db->select('id');
			$this->db->where('id', $id);

			return $this->db->get("Seccion")->result();
		}

		function get_seccion($id) {
			$this->db->select('Nombre');
			$this->db->where('id', $id);

			return $this->db->get("Seccion")->result();
		}

		function get_secciones() {
			$this->db->select('id, Nombre');
			$this->db->order_by("id", "asc");
			return $this->db->get("Seccion")->result();
		}
	}
?>
