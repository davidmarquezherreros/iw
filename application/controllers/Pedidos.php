<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

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
		 $this->load->model("usuario_m", '', TRUE);
		 $this->load->model("Pedido_m", '', TRUE);
		 $this->load->model("Linea_pedido_m", '', TRUE);
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
		$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
		$data['pedidos']=$this->Pedido_m->get_pedido_fecha_usuario_pedidos("0000-00-00",$usuario);
		$this->load->view('pedidos',$data);
	}

	public function detalles(){
		$numpedido = $_GET['numpedido'];
		if(is_numeric($numpedido)){
			$lineas = $this->Linea_pedido_m->get_all_pedido($numpedido);
			$data['lineas']=$lineas;
			$this->load->view('detallepedido',$data);
		}
		else{
			$data['mensaje']="El numero de pedido pasado por parametro no es valido";
			$this->load->view('error',$data);
		}
	}
}
?>
