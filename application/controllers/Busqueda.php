<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {

	//Incluir modelo para controller aquí o en tiempo de construccion si se usa mucho
	function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model("Busqueda_m", '', TRUE);
		$this->load->model("seccion_m", '', TRUE);
		$this->load->model("articulo_m", '', TRUE);
        $this->load->model("opinion_m", '', TRUE);
	}


	//Por defecto, si no ay index error
	public function index()
	{
		//Obtenemos que se quiere buscar
		$buscado = "";
		if(isset($_GET['search_query'])) {
			$buscado = $_GET['search_query'];
		}

		$data['articulos']=$this->Busqueda_m->get_search_all($buscado);
		$data['cuantosarticulos']=$this->Busqueda_m->count_search_all($buscado);
		// Si paginamos haciendo peticiones por cada pagina
		$data['articulosporpagina']=6;
		$data['cuantosarticulospag']=$this->Busqueda_m->count_search_pag(0, 6);
		$data['secciones'] = $this->seccion_m->get_secciones();
		$this->load->view('busqueda', $data);
	}
}
