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
        if (count($_POST)>0) //Solo se ejecutará si se han enviado datos por el formulario
        {
            // echo $_POST['username'];
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if(true){ // El usuario puede acceder a la web

            }
            else{ // El usuario no puede acceder a la web
              $this->index();
            }
        }
        else{
            $this->index();
        }
      }
   }
?>
