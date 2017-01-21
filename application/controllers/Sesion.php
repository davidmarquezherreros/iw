<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Sesion extends CI_Controller {

     function __construct() {
        parent::__construct();
        //loading libraries
        $this->load->library('session');
        $this->load->helper('form');

        // loading models
        $this->load->model("usuario_m", '', TRUE);

     }
      public function index() {
         //loading view
         // Si el usuario ya se ha logueado, que entre al index
         if($this->session->userdata('usuarioLogueado')) {
           echo "<script>  alert('Usuario logueado: " . $this->session->userdata('usuarioLogueado') . "');
                   window.location.href = '/iw/index.php/home/';
                </script>"
           ;
         }
         else{
           $this->load->view('login');
         }

      }

      public function logout() {
         //removing session data
         $this->session->unset_userdata('usuarioLogueado');
         $this->session->unset_userdata('admin');
         $this->load->view('login');
      }

      public function login(){
        // Si el usuario ya se ha logueado, que entre al index
        if($this->session->userdata('usuarioLogueado')) {
          echo "<script>  alert('Usuario logueado: " . $this->session->userdata('usuarioLogueado') . "');
                  window.location.href = '/iw/index.php/home/';
               </script>"
          ;
        }
        else{
          if (count($_POST)>0) //Solo se ejecutará si se han enviado datos por el formulario
          {
              // echo $_POST['username'];
              $username = $this->input->post('username');
              $password = $this->input->post('password');
              $usuario = $this->usuario_m->login($username, $password);

              if(count($usuario)==1){ // El usuario puede acceder a la web
                //echo $usuario[0]->Username;
                //echo $usuario[0]->Password;
                $this->session->set_userdata('usuarioLogueado', $usuario[0]->Username);
                $this->session->set_flashdata('login', 'Bienvenid@ ' . $usuario[0]->Username . '!');
                if($usuario[0]->Admin == true){
                  $this->session->set_userdata('admin', $usuario[0]->Admin);
                }
                echo "<script>
                        window.location.href = '/iw/index.php/home/';
                     </script>"
                ;

              }
              else{ // El usuario no puede acceder a la web
                echo "<script>  alert('Credenciales incorrectas intentelo de nuevo');
                        window.location.href = '/iw/index.php/sesion/login';
                     </script>";
              }
          }
          else{
              $this->index();
          }
        }
      }
   }
?>
