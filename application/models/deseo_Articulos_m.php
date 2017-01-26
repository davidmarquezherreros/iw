<?php
	class deseo_Articulos_m extends CI_model {

		function get_all_id($FK_Lista_desear) { // Devuelve todos los articulos de una lista de deseos
			$this->db->select('*');
			$this->db->where("FK_Lista_Desear", $FK_Lista_desear);
			return $this->db->get("deseo_Articulos")->result(); // Devuelve una lista de ids de articulo.
		}
		function get_item_id($FK_Articulos,$FK_Lista_desear) { // Devuelve todos los articulos de una lista de deseos
			$this->db->select('*');
			$this->db->where("FK_Articulos", $FK_Articulos);
			$this->db->where("FK_Lista_Desear", $FK_Lista_desear);
			return $this->db->get("deseo_Articulos")->result(); // Devuelve una lista de ids de articulo.
		}
		function insertar_articulo($FK_Articulos, $FK_Lista_desear){
			$data = array(
				'FK_Articulos'	=> $FK_Articulos,
				'FK_Lista_desear' => $FK_Lista_desear,
			);

			//Lo insertamos en la BD
			$this->db->insert('deseo_Articulos',$data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		function eliminar_lista_desear($FK_Articulos, $FK_Lista){
			$data = array(
				'FK_Articulos'	=> $FK_Articulos,
				'FK_Lista_Desear'	=> $FK_Lista,
			);

			$this->db->where($data);
			$this->db->delete('deseo_articulos',$data);
			return true;
		}
		function get_lista_deseo_articulos_usuario($FK_Usuario) {
			$query = $this->db->query("SELECT articulos.nombre, articulos.precio, articulos.id FROM deseo_articulos, lista_desear, usuario, articulos WHERE lista_desear.FK_Usuario='$FK_Usuario' AND lista_desear.id=deseo_articulos.FK_Lista_Desear AND usuario.id='$FK_Usuario' AND articulos.id=deseo_articulos.FK_Articulos");

			return $query->result();
		}
	}
?>
