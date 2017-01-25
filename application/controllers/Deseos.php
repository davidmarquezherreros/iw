<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deseos extends CI_Controller {

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
		 $this->load->model("Lista_desear_m", '', TRUE);
		 $this->load->model("usuario_m", '', TRUE);
		 $this->load->model("deseo_Articulos_m", '', TRUE);
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
		$lista = $this->Lista_desear_m->get_all_id($usuario);
		if(count($lista)==0){
			$this->Lista_desear_m->insertar_lista_desear($usuario);
		}
		else{
			print_r($this->deseo_Articulos_m->get_all_id($lista[0]->id));
		}
	}

	public function anyadir(){
		if(count($_GET)==0){
			$data['mensaje']="Peticion incorrecta.";
			$this->load->view('error',$data);
		}
		else{
			if(is_numeric($_GET["articulo"])==false){
				$data['mensaje']="El id pasado como parametro no es valido.";
				$this->load->view('error',$data);
			}
			else{ // Se puede añadir
				$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
				$FK_Articulos = $_GET["articulo"];
				$FK_Lista_desear = $lista = $this->Lista_desear_m->get_all_id($usuario)[0]->id;
				$item = $this->deseo_Articulos_m->get_item_id($FK_Articulos, $FK_Lista_desear);
				if(count($item)==0){
					$this->deseo_Articulos_m->insertar_articulo($FK_Articulos, $FK_Lista_desear);
				}
				else{
					echo "<script>  alert('Este articulo ya esta en tu lista');
									window.location.href = '/iw/index.php/deseos/';
							 </script>"
					;
				}

			}
		}
	}

	public function eliminar(){
		if(count($_GET)==0){
			$data['mensaje']="Peticion incorrecta.";
			$this->load->view('error',$data);
		}
		else{
			if(is_numeric($_GET["articulo"])==false){
				$data['mensaje']="El id pasado como parametro no es valido.";
				$this->load->view('error',$data);
			}
			else{
				$FK_Articulos = $_GET["articulo"];
				$usuario = $this->usuario_m->get_id_username($this->session->userdata('usuarioLogueado'))[0]->id;
				$FK_Lista_desear = $lista = $this->Lista_desear_m->get_all_id($usuario)[0]->id;
				$item = $this->deseo_Articulos_m->get_item_id($FK_Articulos, $FK_Lista_desear);
				if(count($item)==0){
					echo "<script>  alert('Este articulo ya esta en tu lista');
									window.location.href = '/iw/index.php/deseos/';
							 </script>"
					;
				}
				else{
					$this->Lista_desear_m->eliminar_lista_desear($item[0]->FK_Articulos, $item[0]->FK_Lista_Desear);
					echo "<script>  window.location.href = '/iw/index.php/articulo/verArticulo/" . $FK_Articulos .  "';
				   </script>"
				;
				}

			}
		}
	}
}
?>
