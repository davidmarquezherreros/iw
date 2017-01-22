<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<body>
	<main class="container">
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/shop-homepage.css"); ?>" />
		<div id="container">
			<div id="menu">
				<?php
					$this->load->view('inc/menu.php');
				 ?>
			</div>
		</div>
		<div id="items">
			<p> EN PROCESO</p>
		</div>

	</main>
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
