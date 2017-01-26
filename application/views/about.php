<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
	</div>
	<section class="team">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="col-lg-12">
          <h6 class="description">EQUIPO FORMADO POR</h6>
          <div class="row pt-md">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="<?php echo base_url("assets/perfil/oscar.jpeg");?>" class="img-circle" width="100px" height="100px">
              </div>
              <h2>Oscar Perez Puerta</h2>
              <h3>Desarrollador</h3>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
              <div class="img-box">
                <img src="<?php echo base_url("assets/perfil/david.jpeg");?>" class="img-circle" width="100px" height="100px">
              </div>
              <h2>David Marquez Herreros</h2>
              <h3>Desarrollador</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
