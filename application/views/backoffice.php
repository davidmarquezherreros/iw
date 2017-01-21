<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

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
