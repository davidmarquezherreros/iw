<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Articulo extends CI_Controller {

      //Incluir modelo para controller aquí o en tiempo de construccion si se usa mucho
      function __construct() {
         parent::__construct();
         $this->load->helper('url');
         $this->load->model("usuario_m", '', TRUE);
         $this->load->model("articulo_m", '', TRUE);
          $this->load->model("Seccion_m", '', TRUE);
      }

      //Por defecto, si no hay index error
      public function index()
      {
         $data['articulo']=$this->articulo_m->get_articulo(1);
         $this->load->view('articulo', $data);
      }

      public function verArticulo($id){
         $data['articulo']=$this->articulo_m->get_articulo($id);
         $this->load->view('articulo', $data);
      }

   }
?>