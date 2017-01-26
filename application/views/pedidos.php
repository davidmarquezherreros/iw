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
			<h2>Mis pedidos</h2>
		</div>
		<div id="items">
			<table class="table table-striped" style="width:100%">
				<tr>
					<th>Identificador</th>
					<th>Fecha</th>
					<th>Acciones</th>
				</tr>
			<?php
					foreach($pedidos as $pedido){
						$html = "<tr><td>".$pedido->numpedido."</td><td>".$pedido->fecha."</td>";
						echo $html;
						$detalles = "<td><a href=".site_url('pedidos/detalles')."?numpedido=".$pedido->numpedido."><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span></a></td></tr>";
						echo $detalles;
					}
			 ?>
		 </table>
		</div>

	</main>
</body>
<?php
	$this->load->view('inc/pie.php')
 ?>
