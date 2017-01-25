<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
	 {
	         parent::__construct();
					 /* Standard Libraries */
					 $this->load->helper('url');
					 $this->load->library('session');
					 $this->load->database();
			 	 	/* ------------------ */
			 		$this->load->library('grocery_CRUD');
					$this->load->model('grocery_CRUD_model');
					if($this->session->userdata('admin')==false){
						echo "<script>  alert('No eres administrador!');
										window.location.href = '/iw/index.php/home/';
								 </script>"
						;
					}

	 }

		public function index()
		{
			if($this->session->userdata('admin')==false){
				echo "<script>  alert('No eres administrador!');
								window.location.href = '/iw/index.php/home/';
						 </script>"
				;
			}
			else{
				redirect("backoffice/usuarios");
			}
		}

		public function usuarios(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('usuario');
			$crud->set_subject('Usuario');
			$crud->columns('id','Username','Password','Email','Telefono','admin');
			$crud->change_field_type('Admin', 'true_false');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function articulos(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('articulos');
			$crud->set_subject('Articulo');
			$crud->columns('id','Nombre','Descripcion','Precio','FK_Seccion','FK_Sub_Seccion');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function imagenes(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('imagenes');
			$crud->set_subject('Imagen');
			$crud->columns('id','titulo','imagen','FK_Imagen_Articulo');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function opiniones(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('opinion');
			$crud->set_subject('Opinion');
			$crud->columns('id','mensaje','fecha','FK_Usuario','FK_Articulo');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function secciones(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('seccion');
			$crud->set_subject('Seccion');
			$crud->columns('id','Nombre');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function subsecciones(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('sub_seccion');
			$crud->set_subject('Sub seccion');
			$crud->columns('id','Nombre','FK_Seccion');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function pedidos(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('pedido');
			$crud->set_subject('Pedido');
			$crud->columns('numpedido','fecha','FK_Usuario');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function lineapedidos(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('linea_pedido');
			$crud->set_subject('Linea pedido');
			$crud->columns('id','cantidad','importe','FK_Articulo','FK_Pedido');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}

		public function direcciones(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('direcciones');
			$crud->set_subject('Direccion');
			$crud->columns('id','Pais','Ciudad','Direccion','CodigoPostal','ComunidadAutonoma','Telefono', 'FK_Usuario');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}
		public function articulosusuario(){
			$crud = new grocery_CRUD();
			$crud->set_theme("flexigrid");
			$crud->set_table('articulo_usuario');
			$crud->set_subject('Articulo usuario');
			$output = $crud->render();
			$this->load->view('backoffice', $output);
		}
}
?>
