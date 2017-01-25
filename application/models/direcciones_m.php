<?php
	class Direcciones_m extends CI_model {

		function get_all_user($FK_Usuario) {
			$this->db->select('*');
			$this->db->where('FK_Usuario', $FK_Usuario);
			return $this->db->get("direcciones")->result();
		}
		function get_all_id($id) {
			$this->db->select('*');
			$this->db->where('id', $id);
			return $this->db->get("direcciones")->result();
		}
		function delete_id($id){
			$this->db->where('id', $id);
			$this->db->delete('direcciones');
			return true;
		}
		function insert_direccion_usuario($pais, $ciudad, $comunidad, $direccion, $telefono, $postal, $FK_Usuario) {
			$data = array(
				'Pais'	=> $pais,
				'Ciudad' => $ciudad,
				'ComunidadAutonoma' => $comunidad,
				'Direccion' => $direccion,
				'Telefono' => $telefono,
				'FK_Usuario' => $FK_Usuario,
				'CodigoPostal' => $postal
			);

			//Lo insertamos en la BD
			$this->db->insert('direcciones',$data);

			$insert_id = $this->db->insert_id();
			return  $insert_id;

		}
		function update_direccion_usuario($id,$pais, $ciudad, $comunidad, $direccion, $telefono, $postal){
			$this->db->where('id', $id);
			$this->db->set('Pais',$pais);
			$this->db->set('Ciudad',$ciudad);
			$this->db->set('ComunidadAutonoma',$comunidad);
			$this->db->set('Direccion',$direccion);
			$this->db->set('Telefono',$telefono);
			$this->db->set('CodigoPostal',$postal);
			$this->db->update('direcciones');
			return true;
		}
	}
?>
