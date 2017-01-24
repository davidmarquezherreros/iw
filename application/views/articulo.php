<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('inc/head.php');
 ?>
<main class="container">
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<!-- START SCRIPTS -->
	<script type="text/javascript">
		$(document).ready(function(e) {
			  $("#errorCantidad").hide();
				$("#btnCarrito").click(function(e) {
						var cantidad = $("#input_cantidad").val();
						if (cantidad =="" || cantidad == undefined || cantidad < 1) {
								e.preventDefault();
								$("#errorCantidad").show();
								$("#input_cantidad").addClass("has-error");
						}
				});
		});
	</script>
	<!-- END SCRIPTS -->
	<div id="container">
		<div id="menu">
			<?php
				$this->load->view('inc/menu.php');
			 ?>
		</div>
		<div id="buscador">
		</div>
		<div id="secciones">
			<?php
				$this->load->view('inc/menu_secciones.php');
			 ?>
		</div>
	</div>
	<h1><a href="#"><?=$articulo->Nombre?></a></h1>
	<p>
		<?=$articulo->Descripcion?>
	</p>
	<h3> <?=$articulo->Precio?>€</h3>
	<form action="/iw/index.php/carrito/addcarrito" method ="post">
		<div class="panel panel-default" style="width=50%;">
			<div class="panel-heading">
				Añadir al carrito
			</div>
			<input type="number" id="input_articulo" name="articulo" value="<?=$articulo->id?>" hidden="true">
			<label for="opinion">Cantidad:</label>
			<input type="number" class="form-control" name="cantidad" placeholder="nº de items" autofocus id="input_cantidad"><br>
			<input id="btnCarrito" type="submit" class="btn btn-default" value="Añadir"><br>
		</div>
 </form>
 <div class="alert alert-danger" id="errorCantidad">
	 <strong>Error!</strong> Cantidad introducida incorrecta!
 </div>
	<div class="row">
		<?php
			if(sizeof($opiniones)!=0)
			{
				echo "<legend>Opiniones</legend>";
				foreach($opiniones as $opinion) {
		?>
				<div class="panel panel-default" style="width=100px;">
					<div class="panel-heading">
						<?php
								$usuario = $this->usuario_m->get_usuario_id($opinion->FK_Usuario);
								$html = "<h5>" . $usuario[0]->Username . "</h5>";
								echo $html;
						?>
					</div>
						<div class="panel-body">
							<h5 class="pull-right"><?php echo $opinion->fecha;?></h5>
							<h5> <?=$opinion->mensaje?></h5>
						</div>
				</div>
			<?php } ?>
			<?php
			} else {
		?>
				<h4>No hay opiniones de este articulo</h4>
		<?php
			}
		?>
		<?php
			$url = site_url('articulo/nuevaopinion');
			echo "<a href='".$url."?articulo=".$articulo->id."'><span class=\"glyphicon glyphicon-comment\" aria-hidden=\"true\"></span> Nueva opinion</a>";
		 ?>
	</div>
</main>
<?php
	$this->load->view('inc/pie.php')
 ?>
