<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Articulo extends CI_Controller {

      //Incluir modelo para controller aquí o en tiempo de construccion si se usa mucho
      function __construct() {
         parent::__construct();
         $this->load->library('session');
         $this->load->helper('url');
         $this->load->model("usuario_m", '', TRUE);
         $this->load->model("articulo_m", '', TRUE);
         $this->load->model("seccion_m", '', TRUE);
      }

      //Por defecto, si no hay index error
      public function index()
      {
         $data['secciones'] = $this->seccion_m->get_secciones();
         $data['articulo']=$this->articulo_m->get_articulo(1);
         $this->load->view('articulo', $data);
      }

      public function verArticulo($id){
         $data['secciones'] = $this->seccion_m->get_secciones();
         $data['articulo']=$this->articulo_m->get_articulo($id);
         $data['vendedor']=$this->usuario_m->get_articulo_usuario($id);
         $this->load->view('articulo', $data);
      }

      public function verArticulosSeccion($id){
         $data['secciones'] = $this->seccion_m->get_secciones();
         $data['articulos']=$this->articulo_m->get_articulos_seccion($id);
         $data['nombreSeccion']=$this->seccion_m->get_seccion($id);
         $this->load->view('seccion', $data);
      }

   }
?>
