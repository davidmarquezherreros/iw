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
		<br />
		<div id="titulo">
			<?php
						echo '<h2> Datos del pedido '.$_GET['numpedido'].'</h2>';
			 ?>
		</div>
		<div id="items">
			<div id="lineas" style="width:70%; float:left;">
			<table class="table table-striped" style="width:100%">
			  <tr>
			    <th>Nombre</th>
			    <th>Cantidad</th>
			    <th>Precio</th>
			  </tr>
			<?php
						foreach($lineas as $linea){
							$nombre = $this->Articulo_m->get_articulo($linea->FK_Articulo);
							$html = "<tr><td>".$nombre->Nombre."</td><td>".$linea->cantidad."</td><td>".$linea->importe."</td></tr>";
							echo $html;
						}
			 ?>
			 </table>
		 </div>
		 <div id="botones" style="marging:30px; width:30%; float:right;">
			 <div class="panel panel-default">
				 <div class="panel-heading"> Subtotal </div>
			  <div class="panel-body">
					<?php
								$importe = 0;
								foreach($lineas as $linea){
									$importe = $importe + ($linea->cantidad * $linea->importe);
								}
								echo "<p>".$importe."<span class=\"glyphicon glyphicon-euro\" aria-hidden=\"true\"></span></p>";
					 ?>
				 </div>
			</div>
		 </div>
		</div>

	</main>
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
