<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/shop-homepage.css"); ?>" />
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
	</div>
  <br />
  <div class="panel panel-danger" style=" width:50%;">
    <div class="panel-heading"><h3>Error!</h3></div>
    <div class="panel-body">
      <h4>
      <?php
              echo $mensaje;
        ?>
      </h4>
    </div>
  </div>
</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
 </html>
