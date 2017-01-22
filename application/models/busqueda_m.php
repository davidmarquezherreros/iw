<?php

class Busqueda_m extends CI_Model {
	
	//Para ver las consultas SQL: $this->output->enable_profiler(TRUE);
	
	/* Obtenemos todos los videos según la búsqueda */
	function get_search_all($buscado) {
		$this->db->select('id, Nombre, Descripcion, Precio');
		$this->db->from('articulos');
		if($buscado!="") {
			$this->db->like('descripcion', $buscado);
			$this->db->or_like('nombre', $buscado);
		}
		return $this->db->get()->result();
	}
	
	/* Numero de items que aparecen en total */
	function count_search_all($buscado) {
		$this->db->select('id, Nombre, Descripcion, Precio');
		$this->db->from('articulos');
		if($buscado!="") {
			$this->db->like('descripcion', $buscado);
			$this->db->or_like('nombre', $buscado);
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	/* Si paginamos con peticiones por página */
	
	/* Si hacemos paginación con php necesitaríamos este método */
	function get_search_offset_limit($desde, $hasta) {
		$this->db->select('id, Nombre, Descripcion, Precio');
		$this->db->from('articulos');
		$this->db->limit($hasta, $desde);
		return $this->db->get()->result();
	}
	
	/* Numero de items que aparecen en cada pag */
	function count_search_pag($desde, $hasta) {
		$this->db->select('id');
		$this->db->limit($desde, $hasta);		
		$query = $this->db->get('articulos');
		return $query->num_rows();
	}
}