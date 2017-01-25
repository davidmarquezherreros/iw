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
			echo "redirect pagina de error";
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$telefono = $this->input->post('telefono');
			echo $username;
			echo $password;
			echo $email;
			echo $telefono;
			if($password != ""){
				$this->usuario_m->update_usuario_password($username,$password,$email,$telefono);
			}
			else{
				$this->usuario_m->update_usuario($username,$password,$email,$telefono);
			}
			redirect("perfil");
		}
	}

}
?>
