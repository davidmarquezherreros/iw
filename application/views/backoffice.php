<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
 
<body>
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
		<div id="secciones">
		</div>
		<div id="backoffice" style="min-width=480px; margin: auto; width: 80%;">
			<?php echo $output; ?>
		</div>
	</div>

</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
