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
	}
?>
