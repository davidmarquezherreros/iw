<?php
	class Opinion_m extends CI_model {

		function get_opinion_Id($id) {
			$this->db->select('id');
			$this->db->where('id', $id);

			return $this->db->get("Opinion")->result();
		}

		function get_articulo_opiniones($id){
			$query = $this->db->query('SELECT mensaje, fecha, FK_Usuario FROM Opinion WHERE FK_Articulo='. $id);
			return $query->result();
		}

		function insert_opinion_articulo($articulo, $username, $mensaje, $fecha){
			$data = array(
				'mensaje'	=> $mensaje,
				'fecha' => $fecha,
				'FK_Articulo' => $articulo,
				'FK_Usuario' => $username,
			);

			//Lo insertamos en la BD
			$this->db->insert('Opinion',$data);

			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
	}
?>
