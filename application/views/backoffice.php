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
		<div id="backoffice" style="min-width=480px; margin: auto; width: 90%;">
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
            <li class="active"><a href='<?php echo site_url('backoffice/articulosusuario')?>'>Articulos usuario</a></li>
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
