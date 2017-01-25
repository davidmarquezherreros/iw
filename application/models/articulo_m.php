<?php
	class Articulo_m extends CI_model {

		function get_articulos() {
			$this->db->select('id, Nombre, Descripcion, Precio, FK_Seccion');
			$this->db->order_by("id", "asc");
			return $this->db->get("Articulos")->result();
		}

		function get_articulo($id) {
			$query = $this->db->query('SELECT id, Nombre, Descripcion, Precio, FK_Seccion FROM articulos WHERE id='. $id);

			return $query->row();

		}

		function get_articulos_seccion($id) {
			$query = $this->db->query('SELECT articulos.id, articulos.Nombre, articulos.Descripcion, articulos.Precio, articulos.FK_Seccion FROM articulos, seccion WHERE seccion.id=articulos.FK_Seccion AND seccion.id='. $id);

			return $query->result();

		}

		function get_imagen_articulo($id) {
			$query = $this->db->query('SELECT imagen,titulo FROM articulos, imagenes WHERE imagenes.FK_Imagen_Articulo=articulos.id AND articulos.id='. $id);

			return $query->row();

		}

		function get_count_imagenes($id) {
			$where = array('FK_Imagen_Articulo' => $id);
			$this->db->select('imagen');
			$this->db->where($where);
			return $this->db->count_all_results('imagenes');

		}

		function get_all_imagenes($id) {
			$query = $this->db->query('SELECT imagen,titulo FROM articulos, imagenes WHERE imagenes.FK_Imagen_Articulo=articulos.id AND articulos.id='. $id);

			return $query->result();

		}

		function get_seccion_articulo($id) {
			$query = $this->db->query('SELECT seccion.Nombre FROM articulos, seccion WHERE seccion.id=articulos.FK_Seccion AND articulos.id='. $id);

			return $query->row();

		}
	}
?>
