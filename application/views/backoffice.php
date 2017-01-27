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
<head>
  <meta charset="utf-8">
  <title>ebay</title>
  <link rel="icon" href="<?php echo base_url("assets/favicon.ico"); ?>" type="image/gif">
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
</head>
<body class="container">
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
    <div id="titulo" style="min-width=480px; margin: auto; width: 90%;">
      <h2>Panel de administracion</h2>
    </div>
		<div id="backoffice" style="min-width=480px; margin: auto; width: 100%;">
      <nav class="navbar navbar-default">
          <ul class="nav navbar-nav">
            <li class="active"><a href='<?php echo site_url('backoffice/Usuarios')?>'>Usuarios</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/direcciones')?>'>Direcciones</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/secciones')?>'>Secciones</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/subsecciones')?>'>Sub secciones</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/pedidos')?>'>Pedidos</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/Opiniones')?>'>Opiniones</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/lineapedidos')?>'>Linea pedido</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/articulos')?>'>Articulos</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/imagenes')?>'>Imagenes</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/lista_desear')?>'>Lista deseos</a></li>
            <li class="active"><a href='<?php echo site_url('backoffice/deseo_articulos')?>'>Deseo Articulos</a></li>
          </ul>
      </nav>
			<?php echo $output; ?>
		</div>
	</div>
  <br />
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
