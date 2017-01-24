<?php
	class Linea_pedido_m extends CI_model {

		function get_all() {
			$this->db->select('id,cantidad,importe,FK_Articulo,FK_Pedido');
			return $this->db->get("Linea_pedido")->result();
		}

		function get_all_pedido($FK_Pedido) {
			$this->db->select('id,cantidad,importe,FK_Articulo,FK_Pedido');
			$this->db->where('FK_Pedido', $FK_Pedido);
			return $this->db->get("Linea_pedido")->result();
		}
		function insert_linea_pedido($cantidad,$importe,$FK_Articulo,$FK_Pedido){
			$data = array(
				'cantidad'	=> $cantidad,
				'importe' => $importe,
				'FK_Articulo' => $FK_Articulo,
				'FK_Pedido' => $FK_Pedido
			);

			//Lo insertamos en la BD
			$this->db->insert('Linea_pedido',$data);

			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		function get_linea_pedido($FK_Articulo,$pedido){
			$this->db->select('id,cantidad,importe,FK_Articulo,FK_Pedido');
			$this->db->where('FK_Articulo', $FK_Articulo);
			$this->db->where('FK_Pedido', $pedido);
			return $this->db->get("Linea_pedido")->result();
		}

		function update_linea_pedido($id,$cantidad){
			$this->db->where('id', $id);
			$this->db->set('cantidad',$cantidad);
			$this->db->update('Linea_pedido');
			return true;
		}
		function delete_linea_pedido($id){
			$this->db->where('id', $id);
			$this->db->delete('Linea_pedido');
			return true;
		}
	}
?>
