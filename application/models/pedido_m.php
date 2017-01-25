<?php
	class Pedido_m extends CI_model {

		function get_all() {
			$this->db->select('numpedido,fecha,FK_Usuario');
			return $this->db->get("Pedido")->result();
		}

		function get_pedido_fecha_usuario($fecha,$usuario){
			$this->db->select('numpedido,fecha,FK_Usuario');
			$this->db->where('fecha', $fecha);
			$this->db->where('FK_Usuario', $usuario);
			return $this->db->get("Pedido")->result();
		}
		function get_pedido_fecha_usuario_pedidos($fecha,$usuario){
			$this->db->select('numpedido,fecha,FK_Usuario');
			$this->db->where('fecha!=', $fecha);
			$this->db->where('FK_Usuario', $usuario);
			return $this->db->get("Pedido")->result();
		}
		function insert_pedido_usuario($FK_Usuario) {
			$data = array(
				'FK_Usuario'	=> $FK_Usuario
			);

			//Lo insertamos en la BD
			$this->db->insert('Pedido',$data);

			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}

		function update_pedido($id,$fecha){
			$this->db->where('numpedido', $id);
			$this->db->set('fecha',$fecha);
			$this->db->update('Pedido');
			return true;
		}
	}
?>
