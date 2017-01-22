<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

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
	 function __construct(){
		 parent::__construct();

		 $this->load->library('session');
		 $this->load->model("Seccion_m", '', TRUE);
		 $this->load->model("Articulo_m", '', TRUE);
		 $sesion = $this->session->userdata('usuarioLogueado');
		 if($sesion==""){
			 echo "<script>  alert('Necesitas inciar sesión!');
							 window.location.href = '/iw/index.php/sesion/';
						</script>"
			 ;
		 }
	 }
	public function index()
	{
		$this->load->view('carrito');
	}
}
?>
