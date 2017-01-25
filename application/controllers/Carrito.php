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
		$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario);
		if(count($pedido)>0){
			$pedido = $pedido[0]->numpedido;
		}
		if(count($pedido)==0){ // No tiene pedidos sin completar por lo tanto creamos uno
			$pedido= $this->Pedido_m->insert_pedido_usuario($usuario);
		}
		$data['lineas'] = $this->Linea_pedido_m->get_all_pedido($pedido);
		$this->load->view('carrito',$data);
	}

	public function addcarrito(){
		if(count($_POST)==0){
			redirect("home");
		}
		else{
			$articulo = $this->input->post('articulo');
			$cantidad = $this->input->post('cantidad');
			$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
			// Miramos si el usuario tiene ya una cesta activa
			$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario)[0]->numpedido;
			if(count($pedido)==0){ // No tiene pedidos sin completar por lo tanto creamos uno
				$pedido = $this->Pedido_m->insert_pedido_usuario($usuario);
			}
			$importe = $this->Articulo_m->get_articulo($articulo)->Precio;
			$linea=$this->Linea_pedido_m->get_linea_pedido($articulo,$pedido);
			if(count($linea)==0){
				$this->Linea_pedido_m->insert_linea_pedido($cantidad,$importe,$articulo,$pedido);
			}
			else{
				$this->Linea_pedido_m->update_linea_pedido($linea[0]->id,$linea[0]->cantidad+$cantidad);
			}
			redirect("carrito");
		}
	}

	// Acciones del listado del carrito
	// + 1
	public function up(){
		if($_GET['articulo']==""){
			redirect("carrito");
		}
		else{
			$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
			$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario);
			$linea=$this->Linea_pedido_m->get_linea_pedido($_GET['articulo'],$pedido[0]->numpedido);
			$this->Linea_pedido_m->update_linea_pedido($linea[0]->id,$linea[0]->cantidad+1);
			redirect("carrito");
		}
	}
	// - 1
	public function down(){
		if($_GET['articulo']==""){
			redirect("carrito");
		}
		else{
			$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
			$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario);
			$linea=$this->Linea_pedido_m->get_linea_pedido($_GET['articulo'],$pedido[0]->numpedido);
			if($linea[0]->cantidad==1){
				$this->Linea_pedido_m->delete_linea_pedido($linea[0]->id);
			}
			else{
				$this->Linea_pedido_m->update_linea_pedido($linea[0]->id,$linea[0]->cantidad-1);
			}
			redirect("carrito");
		}
	}
	// Borrar articulo
	public function delete(){
		if($_GET['articulo']==""){
			redirect("carrito");
		}
		else{
			$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
			$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario);
			$linea=$this->Linea_pedido_m->get_linea_pedido($_GET['articulo'],$pedido[0]->numpedido);
			$this->Linea_pedido_m->delete_linea_pedido($linea[0]->id);
			redirect("carrito");
		}
	}

	// Boton comprar
	public function comprar(){
		$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
		$pedido = $this->Pedido_m->get_pedido_fecha_usuario("0000-00-00",$usuario);
		$this->Pedido_m->update_pedido($pedido[0]->numpedido,date("Y/m/d"));
	}
}
?>
