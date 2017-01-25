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

		function eliminar_lista_desear($FK_Articulos, $FK_Lista){
			$data = array(
				'FK_Articulos'	=> $FK_Articulos,
				'FK_Lista_Desear'	=> $FK_Lista,
			);

			$this->db->where($data);
			$this->db->delete('deseo_articulos',$data);
			return true;
		}

		function get_deseo_articulo_usuario($articulo,$FK_Usuario) {
			$query = $this->db->query("SELECT * FROM deseo_articulos, lista_desear, usuario, articulos WHERE deseo_articulos.FK_Articulos='$articulo' AND lista_desear.FK_Usuario='$FK_Usuario' AND lista_desear.id=deseo_articulos.FK_Lista_Desear AND articulos.id='$articulo' AND usuario.id='$FK_Usuario'");

			return $query->row();
		}
	}
?>
