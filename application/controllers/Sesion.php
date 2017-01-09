<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Sesion extends CI_Controller {

      public function index() {
         //loading libraries
         $this->load->library('session');
         $this->load->helper('form');
         $this->load->view('login');
      }

      public function unset_session_data() {
         //loading session library
         $this->load->library('session');

         //removing session data
         $this->session->unset_userdata('name');
         $this->load->view('login');
      }

      public function login(){
        echo "no se como hacer el submit de mierda";
      }

   }
?>
