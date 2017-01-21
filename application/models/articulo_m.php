<?php
	class Articulo_m extends CI_model {

		function get_articulos() {
			$this->db->select('id, Nombre, Descripcion, Precio');
			$this->db->order_by("id", "asc");
			return $this->db->get("Articulos")->result();
		}

		function get_articulo($id) {
			$query = $this->db->query('SELECT id, Nombre, Descripcion, Precio FROM articulos WHERE id='. $id);

			return $query->row();
			
		}
	}
?>