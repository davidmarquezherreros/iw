<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

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
		 $this->load->model("Direcciones_m", '', TRUE);
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
		$this->cuenta();
	}
	public function cuenta(){
		$data['datos']=$this->usuario_m->get_all_username($this->session->userdata('usuarioLogueado'));
		$this->load->view('perfil',$data);
	}
	public function direcciones(){
		$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
		$data['datos']="direcciones";
		$data['direcciones']=$this->Direcciones_m->get_all_user($usuario);
		$this->load->view('perfil',$data);
	}

	public function modificar(){
		$this->load->view('modificarperfil');
	}
	public function modificado(){
		if(count($_POST)==0){
			$data['mensaje']="Ha habido un fallo al intentar modificar el perfil, el evento POST tenia 0 argumentos.";
			$this->load->view('error',$data);
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$telefono = $this->input->post('telefono');
			if($password != ""){
				$this->usuario_m->update_usuario_password($username,$password,$email,$telefono);
			}
			else{
				$this->usuario_m->update_usuario($username,$email,$telefono);
			}
			redirect("perfil");
		}
	}
	public function modificar_direccion(){
		$id = $_GET['id'];
		if(is_numeric($id)==false){
			$data['mensaje']="El id pasado como parametro no es valido";
			$this->load->view('error',$data);
		}
		else{
			if($id==-1){ // Crear direccion
				$data['operacion']="crear";
				$this->load->view('modificardireccion',$data);
			}
			else{ // Modificar
				$direccion = $this->Direcciones_m->get_all_id($id);
				if(count($direccion)>0){
					$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
					if($direccion[0]->FK_Usuario != $usuario){ // Comprobamos que la direccion le pertenece
						$data['mensaje']="Esta direccion no te pertenece!";
						$this->load->view('error',$data);
					}else{
						$data['operacion']="modificar";
						$data['datos']=$direccion;
						$this->load->view('modificardireccion',$data);
					}
				}
				else{
					$data['mensaje']="Esta direccion no te existe!";
					$this->load->view('error',$data);
				}

			}
		}
	}
	public function borrar_direccion(){
		$id = $_GET['id'];
		if(is_numeric($id)==false){
			$data['mensaje']="El id pasado como parametro no es valido";
			$this->load->view('error',$data);
		}
		else{
			$this->Direcciones_m->delete_id($id);
			$this->direcciones();
		}
	}

	public function modificado_direccion(){
		$id = $_POST['id'];
		if(count($_POST)==0){
			$data['mensaje']="Ha habido un error en la solicitud el evento POST envio 0 argumentos";
			$this->load->view('error',$data);
		}
		else{
			$pais = $this->input->post('pais');
			$ciudad = $this->input->post('ciudad');
			$comunidad = $this->input->post('comunidad');
			$direccionaux = $this->input->post('direccion');
			$telefono = $this->input->post('telefono');
			$postal = $this->input->post('postal');
			if($id==-1){ // Crear direccion
				$FK_Usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
				$this->Direcciones_m->insert_direccion_usuario($pais, $ciudad, $comunidad, $direccionaux, $telefono, $postal, $FK_Usuario);
				$this->direcciones();
			}
			else{ // Modificar
				$direccion = $this->Direcciones_m->get_all_id($id);
				if(count($direccion)>0){
					$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
					if($direccion[0]->FK_Usuario != $usuario){ // Comprobamos que la direccion le pertenece
						$data['mensaje']="Esta direccion no te pertenece!";
						$this->load->view('error',$data);
					}else{
						$this->Direcciones_m->update_direccion_usuario($id,$pais, $ciudad, $comunidad, $direccionaux, $telefono, $postal);
						$this->direcciones();
					}
				}
				else{
					$data['mensaje']="Esta direccion no te existe!";
					$this->load->view('error',$data);
				}
			}
		}
	}

}
?>
